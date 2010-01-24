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
			foreach ($contracts as $contract)
				$contractIds[] = $contract['InsuranceContract']['id'];
			
			$conditions['Vehicle.insurance_contract_id'] = $contractIds;
			if ($insuranceCompanyId!=-1)
				$company = $this->requestAction("insuranceCompanies/get/" . $insuranceCompanyId);
			else
				$company = null;
			$this->set("theVehicles", $this->paginate('Vehicle', $conditions));
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
			foreach ($contracts as $contract)
				$contractIds[] = $contract['OdikiContract']['id'];
			
			$conditions['Vehicle.odiki_contract_id'] = $contractIds;
			if ($odikiCompanyId!=-1)
				$company = $this->requestAction("odikiCompanies/get/" . $odikiCompanyId);
			else
				$company = null;
			$this->set("theVehicles", $this->paginate('Vehicle', $conditions));
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
			$allContracts = $this->Contract->find('all');
			$allCompanies = $this->requestAction("/companies/");
			
			$fileName = "backup" . date('o-m-d') . ".sql";
			
			$text = 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
						CREATE DATABASE `insurance` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
						USE `insurance`;

					CREATE TABLE IF NOT EXISTS `companies` (`id` int(11) NOT NULL auto_increment, `description` varchar(80) NOT NULL, 
						`telephone` varchar(10) NOT NULL, PRIMARY KEY  (`id`) ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;';
			
			$text .= 'INSERT INTO `companies` (`id`, `description`, `telephone`) VALUES ';
			
			$i=0;
			foreach ($allCompanies as $company)
			{
				$i++;
				$text .= '(' . $company['Company']['id'] . ', "' . $company['Company']['description'] . '", "' . 
								$company['Company']['telephone'] . '")' . (( $i==count($allCompanies) )?';':', ');
			}
			
			$text .= 'CREATE TABLE IF NOT EXISTS `contracts` (`id` int(11) NOT NULL auto_increment, `firstName` varchar(40) NOT NULL, `lastName` varchar(40) NOT NULL,
							`fatherName` varchar(50) NOT NULL, `plate` varchar(7) NOT NULL, `from` date NOT NULL, `to` date NOT NULL, `amount` float NOT NULL,
							`companyId` int(11) NOT NULL, `isPaid` int(11) NOT NULL, PRIMARY KEY  (`id`) ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC 
							AUTO_INCREMENT=10 ;';
			$text .= 'INSERT INTO `contracts` (`id`, `firstName`, `lastName`, `fatherName`, `plate`, `from`, `to`, `amount`, `companyId`, `isPaid`) VALUES ';
			
			$i=0;
			foreach($allContracts as $contract)
			{
				$i++;
				$text .= '(' . $contract['Contract']['id'] . ', "' . $contract['Contract']['firstName'] . '", "' . 
								$contract['Contract']['lastName'] . '", "' . $contract['Contract']['fatherName'] . '", "' .
								$contract['Contract']['plate'] . '", "' . $contract['Contract']['from'] . '", "' .
								$contract['Contract']['to'] . '", ' . $contract['Contract']['amount'] . ', ' . 
								$contract['Contract']['companyId'] . ', ' . $contract['Contract']['isPaid'] . ')' . 
								(( $i==count($allContracts) )?';':', ');
			}			
			
			header('Content-type: application/txt');
			header('Content-Disposition: attachment; filename="' . $fileName . '"');
			echo $text;
			exit();
			//$this->set("title", "Backup Βάσης Δεδομένων Εφαρμογής");			
			
		}
	}
?>
