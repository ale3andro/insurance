<?php
	class InsuranceContractsController extends AppController
	{
		var $name="insurance_contracts";
		var $paginate = array( 'limit' => 10, 'order' => array('InsuranceContract.from' => 'asc'));
		
		function get($id) /* ok */
		{
			if (isset($this->params['requested']))
				return $this->InsuranceContract->findById($id);
			else
				$this->cakeError('error404');		
		}
		
		function due($numDays=7) /* ok */
		{
			if (isset($this->params['requested']))
			{
				$today = date('Y-m-d');
				$due  = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+$numDays, date("Y")));
				return $this->InsuranceContract->find('all', array('conditions' => array('to >' => $today, 'to <' => $due))); 
			}
			else
				$this->cakeError('error404');				
		}
		
		function byCompany($companyId=-1) /* ok */
		{
			if ($companyId!=-1)
				return $this->InsuranceContract->find("all", array('conditions' => array('company_id' => $companyId)));
			else
				return $this->InsuranceContract->find("all");
		}		
		
		/* fixed */
		function view($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			$vehicle = $this->requestAction("/vehicles/getFromInsuranceId/" . $id);
			$insuranceContract = $this->InsuranceContract->findById($id);
			if ($insuranceContract==null)
				$this->cakeError('error404');
			$this->set("vehicle",$vehicle);
			$this->set("insuranceContract", $insuranceContract);
			$this->set("insuranceCompany", $this->requestAction("/insuranceCompanies/get/" . 
						$insuranceContract['InsuranceContract']['company_id']));
		}
		
		/* fixed */
		function add($vehicleId) /* ok */
		{
			if (!isset($vehicleId))
				$this->cakeError('error404');
			if (!empty($this->data)) 
			{
				if ($this->InsuranceContract->save($this->data)) 
				{
					$this->requestAction("/vehicles/setInsuranceContractId/" . $vehicleId . "/" . $this->InsuranceContract->id);					
					$this->Session->setFlash('Το συμβάλαιο έχει αποθηκευτεί...');
					$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicleId));
				}
			}
			else
			{
				$vehicle = $this->requestAction("/vehicles/get/" . $vehicleId);
				if (($vehicle==null) || ($vehicle['Vehicle']['insurance_contract_id']!=0))
					$this->cakeError('error404');
				$this->set('vehicleId', $vehicleId);
				$this->set('insuranceCompaniesSelect', $this->requestAction("/insuranceCompanies/createSelect/"));
			}
		}
		
		/* fixed */
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			$this->InsuranceContract->id = $id;
			
			if (empty($this->data))
			{
				$this->data = $this->InsuranceContract->read();
				if ($this->data==null)
					$this->cakeError('error404');
				$this->set('insuranceCompaniesSelect', 
						$this->requestAction("/insuranceCompanies/createSelect/" . $this->data['InsuranceContract']['company_id']));
			}
			else
			{
				$this->InsuranceContract->save($this->data);
				$this->Session->setFlash('Το συμβόλαιο έχει ενημερωθεί...');
				$this->redirect(array('action' => 'view', $id));
			}
		}
		/* fixed */
		function pay($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			
			$this->data = $this->InsuranceContract->findById($id);
			$this->data['InsuranceContract']['is_paid'] = 1;
			$this->InsuranceContract->save($this->data);
			$this->pageTitle = "Πληρωμή Συμβολαίου";
			$this->Session->setFlash('Το συμβόλαιο έχει πληρωθεί...');
			$this->redirect(array('action' => 'view', $id));
		}
		/* fixed */
		function unpay($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$this->data = $this->InsuranceContract->findById($id);
			$this->data['InsuranceContract']['is_paid'] = 0;
			$this->InsuranceContract->save($this->data);
			$this->pageTitle = "Πληρωμή Συμβολαίου";
			$this->Session->setFlash('Η αναίρεση πληρωμής ολοκληρώθηκε...');
			$this->redirect(array('action' => 'view', $id));
		}
		
		function delete($id) /* ok */
		{
			if (isset($this->params['requested']))
				$this->InsuranceContract->del($id);
			else
			{
				$vehicle = $this->requestAction("/vehicles/getFromInsuranceId/" . $id);
				$this->requestAction("vehicles/setInsuranceContractId/" . $vehicle['Vehicle']['id'] . "/0");
				$this->InsuranceContract->del($id);
				$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicle['Vehicle']['id']));			
			}
		}
		function isPaid($status="no") /* ok */
		{
			if (isset($this->params['requested']))
			{
				if ($status=="no")
					$conditions = array('InsuranceContract.is_paid' => '0');
				else
					$conditions = array('InsuranceContract.is_paid' => '1');
	
				return $this->InsuranceContract->find('all', array('conditions' => $conditions));
			}
			else
				$this->cakeError('error404');
		}
		function statistics($companyId=-1) /* ok */
		{
			if ($companyId!=-1)
			{
				if ($this->requestAction("/insuranceCompanies/get/" . $companyId)==null)
					$this->cakeError('error404');
			}	
			
			if ($companyId!=-1)
				$contracts = $this->InsuranceContract->find('all', array('conditions' => array('InsuranceContract.company_id =' => $companyId)));
			else
				$contracts = $this->InsuranceContract->find('all');
				
			$paidContracts = 0; $paidSum = 0;
			$unpaidContracts = 0; $unpaidSum = 0;
			foreach ($contracts as $contract)
			{
				if ($contract['InsuranceContract']['is_paid'] != 0)
				{
					$paidContracts++;
					$paidSum += $contract['InsuranceContract']['amount'];
				}
				else
				{
					$unpaidContracts++;
					$unpaidSum += $contract['InsuranceContract']['amount'];
				}
			}
			$this->set("paidContracts", $paidContracts);
			$this->set("paidSum", $paidSum);
			$this->set("unpaidContracts", $unpaidContracts);
			$this->set("unpaidSum", $unpaidSum);	
			$company=null;
			if ($companyId!=-1)
				$company = $this->requestAction("/insuranceCompanies/get/" . $companyId);
			$this->set("company", $company);
		}		
	}
?>
