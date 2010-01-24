<?php
	class VehiclesController extends AppController
	{
		var $name="Vehicles";
		var $paginate = array( 'limit' => 10, 'order' => array('Vehicle.last_name' => 'asc', 'Vehicle.first_name' => 'asc', 
								'Vehicle.father_name' => 'asc', 'Vehicle.plate' => 'asc'));
		/* fixed */
		function index()
		{
			$this->pageTitle = "Όλα τα Οχήματα";
			$this->set("theVehicles", $this->paginate());	
		}
		
		function get($id)
		{
			if (isset($this->params['requested']))
				return $this->Vehicle->findById($id);			
		}
		/* fixed */
		function getFromInsuranceId($insuranceId)
		{
			return $this->Vehicle->find("first", array( 'conditions' => array('Vehicle.insurance_contract_id =' => $insuranceId)));
		}
		function getFromInsuranceCompanyId($insuranceCompanyId=-1)
		{
			$contracts = $this->requestAction("/insuranceContracts/byCompany/" . $insuranceCompanyId);	
			if (count($contracts)!=0)
			{
				foreach ($contracts as $contract)
					$contractIds[] = $contract['InsuranceContract']['id'];
			
				$conditions['Vehicle.insurance_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles=null;
				
			if ($insuranceCompanyId!=-1)
				$company = $this->requestAction("insuranceCompanies/get/" . $insuranceCompanyId);
			else
				$company = null;
			$this->set("theVehicles", $vehicles);
			$this->set("company", $company);
		}
		function getInsuranceContractsDue($numDays)
		{
			$contracts = $this->requestAction("/insuranceContracts/due/" . $numDays);
			if (count($contracts) != 0)
			{
				foreach ($contracts as $contract)
					$contractIds[] = $contract['InsuranceContract']['id'];
			
				$conditions['Vehicle.insurance_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles = null;
			
			$this->set("theVehicles", $vehicles);
			$this->set("numDays", $numDays);
		}
		
		
		/* fixed */
		function getFromOdikiId($odikiId)
		{
			return $this->Vehicle->find("first", array( 'conditions' => array('Vehicle.odiki_contract_id =' => $odikiId)));
		}
		function getFromOdikiCompanyId($odikiCompanyId=-1)
		{
			$contracts = $this->requestAction("/odikiContracts/byCompany/" . $odikiCompanyId);	
			if (count($contracts)!=0)
			{
				foreach ($contracts as $contract)
					$contractIds[] = $contract['OdikiContract']['id'];
			
				$conditions['Vehicle.odiki_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles=null;
				if ($odikiCompanyId!=-1)
					$company = $this->requestAction("odikiCompanies/get/" . $odikiCompanyId);
				else
					$company = null;
			$this->set("theVehicles", $vehicles);
			$this->set("company", $company);		
		}
		function getOdikiContractsDue($numDays)
		{
			$contracts = $this->requestAction("/odikiContracts/due/" . $numDays);
			if (count($contracts) != 0)
			{
				foreach ($contracts as $contract)
					$contractIds[] = $contract['OdikiContract']['id'];
			
				$conditions['Vehicle.odiki_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles = null;
			
			$this->set("theVehicles", $vehicles);
			$this->set("numDays", $numDays);
		}
		
		function delete($id)
		{
			$vehicle = $this->Vehicle->findById($id);
			
			if ($vehicle['Vehicle']['insurance_contract_id'] != 0)
				$this->requestAction("/insuranceContracts/delete/" . $vehicle['Vehicle']['insurance_contract_id']);
			if ($vehicle['Vehicle']['odiki_contract_id'] != 0)
				$this->requestAction("/odikiContracts/delete/" . $vehicle['Vehicle']['odiki_contract_id']);
			
			$this->Vehicle->del($id);
			$this->redirect(array('action' => 'index'));
		}
		
		/* fixed */
		function search()
		{
			$this->set("title", "Αναζήτηση");
			if (!empty($this->data))
			{
				if ($this->data['Vehicle']['first_name'] != "")
					$conditions['Vehicle.first_name LIKE'] = $this->data['Vehicle']['first_name'] . "%";
				if ($this->data['Vehicle']['last_name'] != "")
					$conditions['Vehicle.last_name LIKE'] = $this->data['Vehicle']['last_name'] . "%";
				if ($this->data['Vehicle']['fatherName'] != "")
					$conditions['Vehicle.father_name LIKE'] = $this->data['Vehicle']['father_name'] . "%";
				if ($this->data['Vehicle']['plate'] != "")
					$conditions['Vehicle.plate LIKE'] = $this->data['Vehicle']['plate'] . "%";
				$this->set("vehicles", $this->paginate('Vehicle', $conditions));
			}
			
		}
		/* fixed */
		function edit($id)
		{
			$this->pageTitle = "Διόρθωση Στοιχείων Οχήματος";
			$this->Contract->id = $id;
			
			if (empty($this->data))
			{
				$this->data = $this->Vehicle->read();	
			}
			else
			{
				$this->Vehicle->save($this->data);
				$this->Session->setFlash('Τα στοιχεία του οχήματος έχουν ενημερωθεί ενημερωθεί...');
				$this->redirect(array('action' => 'view', $id));
			}
		}
		
		function add()
		{
			$this->pageTitle = "Προσθήκη Οχήματος";
			
			if (!empty($this->data)) 
			{
				if ($this->Vehicle->save($this->data)) 
				{
					$this->Session->setFlash('Το όχημα έχει αποθηκευτεί...');
					$this->redirect(array('action' => 'view',  $this->Vehicle->id));
				}
			}
		}
		
		function setOdikiContractId($vehicleId, $odikiContractId)
		{
			$this->data = $this->Vehicle->findById($vehicleId);
			$this->data['Vehicle']['odiki_contract_id'] = $odikiContractId;
			$this->Vehicle->save($this->data);
			
		}
		
		function setInsuranceContractId($vehicleId, $insuranceContractId)
		{
			$this->data = $this->Vehicle->findById($vehicleId);
			$this->data['Vehicle']['insurance_contract_id'] = $insuranceContractId;
			$this->Vehicle->save($this->data);
			
		}
		
		/* fixed */
		function view($id)
		{
			$this->pageTitle = "Προβολή Λεπτομερειών οχήματος";
			$vehicle = $this->Vehicle->findById($id);
			$insuranceContract = $this->requestAction("/insuranceContracts/get/" . 
						$vehicle['Vehicle']['insurance_contract_id']);
			$odikiContract = $this->requestAction("/odikiContracts/get/" . 
						$vehicle['Vehicle']['odiki_contract_id']);
			
			$this->set("vehicle", $vehicle);
			$this->set("insuranceContract", $insuranceContract);
			if ($insuranceContract!=null)
				$this->set("insuranceCompany", $this->requestAction("/insuranceCompanies/get/" . 
							$insuranceContract['InsuranceContract']['company_id']));
			
			$this->set("odikiContract", $odikiContract);
			if ($odikiContract!=null)
				$this->set("odikiCompany", $this->requestAction("/odikiCompanies/get/" . 
							$odikiContract['OdikiContract']['company_id']));
		}		
		
		function backup()
		{
			//TODO	
			
		}
		function statistics()
		{
			$vehicles = $this->Vehicle->find("all");
			$num=0; 
			$numInsured=0; 
			$numOdiki=0;
			foreach ($vehicles as $vehicle)
			{
				$num++;
				if ($vehicle['Vehicle']['insurance_contract_id']!=0)
					$numInsured++;
				if ($vehicle['Vehicle']['odiki_contract_id']!=0)
					$numOdiki++;
			}
			$this->set('num', $num);
			$this->set('numInsured', $numInsured);
			$this->set('numOdiki', $numOdiki);
		}
	}
?>
