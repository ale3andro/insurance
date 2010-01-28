<?php
	class OdikiContractsController extends AppController
	{
		var $name="odiki_contracts";
		var $paginate = array( 'limit' => 10, 'order' => array('OdikiContract.from' => 'asc'));
		
		function get($id) /* ok */
		{
			if (isset($this->params['requested']))
				return $this->OdikiContract->findById($id);
			else
				$this->cakeError('error404');
		}
		
		function due($numDays=7) /* ok */
		{
			if (isset($this->params['requested']))
			{
				$today = date('Y-m-d');
				$due  = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+$numDays, date("Y")));
				return $this->OdikiContract->find('all', array('conditions' => array('to >' => $today, 'to <' => $due))); 
			}
			else
				$this->cakeError('error404');
		}
		
		function byCompany($companyId=-1) /* ok */
		{
			if ($companyId!=-1)
				return $this->OdikiContract->find("all", array('conditions' => array('company_id' => $companyId)));
			else
				return $this->OdikiContract->find("all");
		}		
		
		
		/* fixed */
		function view($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			$vehicle = $this->requestAction("/vehicles/getFromOdikiId/" . $id);
			$odikiContract = $this->OdikiContract->findById($id);
			if ($odikiContract==null)
				$this->cakeError('error404');
			$this->set("vehicle",$vehicle);
			$this->set("odikiContract", $odikiContract);
			$this->set("odikiCompany", $this->requestAction("/odikiCompanies/get/" . 
						$odikiContract['OdikiContract']['company_id']));
		}
		
		/* fixed */
		function add($vehicleId) /* ok */
		{
			if (!isset($vehicleId))
				$this->cakeError('error404');
			if (!empty($this->data)) 
			{
				if ($this->OdikiContract->save($this->data)) 
				{
					$this->requestAction("/vehicles/setOdikiContractId/" . $vehicleId . "/" . $this->OdikiContract->id);					
					$this->Session->setFlash('Το συμβόλαιο έχει αποθηκευτεί...');
					$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicleId));
				}
			}
			else
			{
				$vehicle = $this->requestAction("/vehicles/get/" . $vehicleId);
				if (($vehicle==null) || ($vehicle['Vehicle']['odiki_contract_id']!=0))
					$this->cakeError('error404');
				$this->set('vehicleId', $vehicleId);
				$this->set('odikiCompaniesSelect', $this->requestAction("/odikiCompanies/createSelect/"));
			}
		}
		
		/* fixed */
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$this->OdikiContract->id = $id;
			
			if (empty($this->data))
			{
				$this->data = $this->OdikiContract->read();
				if ($this->data==null)
					$this->cakeError('error404');
				$this->set('odikiCompaniesSelect', 
						$this->requestAction("/odikiCompanies/createSelect/" . $this->data['OdikiContract']['company_id']));
			}
			else
			{
				$this->OdikiContract->save($this->data);
				$this->Session->setFlash('Το συμβόλαιο έχει ενημερωθεί...');
				$this->redirect(array('action' => 'view', $id));
			}
		}
		/* fixed */
		function pay($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$this->data = $this->OdikiContract->findById($id);
			$this->data['OdikiContract']['is_paid'] = 1;
			$this->OdikiContract->save($this->data);
			$this->pageTitle = "Πληρωμή Συμβολαίου";
			$this->Session->setFlash('Το συμβόλαιο έχει πληρωθεί...');
			$this->redirect(array('action' => 'view', $id));
		}
		/* fixed */
		function unpay($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$this->data = $this->OdikiContract->findById($id);
			$this->data['OdikiContract']['is_paid'] = 0;
			$this->OdikiContract->save($this->data);
			$this->pageTitle = "Πληρωμή Συμβολαίου";
			$this->Session->setFlash('Η αναίρεση πληρωμής ολοκληρώθηκε...');
			$this->redirect(array('action' => 'view', $id));
		}
	
		function delete($id) /* ok */
		{
			if (isset($this->params['requested']))
				$this->OdikiContract->del($id);
			else
			{
				$vehicle = $this->requestAction("/vehicles/getFromOdikiId/" . $id);
				$this->requestAction("vehicles/setOdikiContractId/" . $vehicle['Vehicle']['id'] . "/0");
				$this->OdikiContract->del($id);
				$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicle['Vehicle']['id']));
			}
		}
		function isPaid($status="no") /* ok */
		{
			if (isset($this->params['requested']))
			{
				if ($status=="no")
					$conditions = array('OdikiContract.is_paid' => '0');
				else
					$conditions = array('OdikiContract.is_paid' => '1');
			
				return $this->OdikiContract->find('all', array('conditions' => $conditions));
			}
			else
				$this->cakeError('error404');
		}
		function statistics($companyId=-1) /* ok */
		{			
			if ($companyId!=-1)
			{
				if ($this->requestAction("/odikiCompanies/get/" . $companyId)==null)
					$this->cakeError('error404');
			}		
				
			if ($companyId!=-1)
				$contracts = $this->OdikiContract->find('all', array('conditions' => array('OdikiContract.company_id =' => $companyId)));
			else
				$contracts = $this->OdikiContract->find('all');
			
			$paidContracts = 0; $paidSum = 0;
			$unpaidContracts = 0; $unpaidSum = 0;
			foreach ($contracts as $contract)
			{
				if ($contract['OdikiContract']['is_paid'] != 0)
				{
					$paidContracts++;
					$paidSum += $contract['OdikiContract']['amount'];
				}
				else
				{
					$unpaidContracts++;
					$unpaidSum += $contract['OdikiContract']['amount'];
				}
			}
			$this->set("paidContracts", $paidContracts);
			$this->set("paidSum", $paidSum);
			$this->set("unpaidContracts", $unpaidContracts);
			$this->set("unpaidSum", $unpaidSum);
			$company=null;
			if ($companyId!=-1)
				$company = $this->requestAction("/odikiCompanies/get/" . $companyId);
			$this->set("company", $company);			
		}
	}
?>
