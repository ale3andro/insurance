<?php
	class OdikiContractsController extends AppController
	{
		var $name="odiki_contracts";
		var $paginate = array( 'limit' => 10, 'order' => array('OdikiContract.from' => 'asc'));
		
		function index()
		{
			$contracts = $this->OdikiContract->find('all');	
		}
		function get($id)
		{
			if (isset($this->params['requested']))
				return $this->OdikiContract->findById($id);			
		}
		
		function due($numDays)
		{
			$today = date('Y-m-d');
			$due  = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d")+$numDays, date("Y")));
			return $this->OdikiContract->find('all', array('conditions' => array('to >' => $today, 'to <' => $due))); 
		}
		
		function byCompany($companyId=-1)
		{
			if ($companyId!=-1)
				return $this->OdikiContract->find("all", array('conditions' => array('company_id' => $companyId)));
			else
				return $this->OdikiContract->find("all");
		}		
		
		
		/* fixed */
		function view($id)
		{
			$vehicle = $this->requestAction("/vehicles/getFromOdikiId/" . $id);
			$this->set("vehicle",$vehicle);
			$odikiContract = $this->OdikiContract->findById($id);
			$this->set("odikiContract", $odikiContract);
			$this->set("odikiCompany", $this->requestAction("/odikiCompanies/get/" . 
						$odikiContract['OdikiContract']['company_id']));
		}
		
		/* fixed */
		function add($vehicleId)
		{
			if (!empty($this->data)) 
			{
				if ($this->OdikiContract->save($this->data)) 
				{
					$this->requestAction("/vehicles/setOdikiContractId/" . $vehicleId . "/" . $this->OdikiContract->id);					
					$this->Session->setFlash('Το συμβάλαιο έχει αποθηκευτεί...');
					$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicleId));
				}
			}
			else
			{
				$this->set('vehicleId', $vehicleId);
				$this->set('odikiCompaniesSelect', $this->requestAction("/odikiCompanies/createSelect/"));
			}
		}
		
		/* fixed */
		function edit($id)
		{
			$this->OdikiContract->id = $id;
			
			if (empty($this->data))
			{
				$this->data = $this->OdikiContract->read();
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
		function pay($id)
		{
			$this->data = $this->OdikiContract->findById($id);
			$this->data['OdikiContract']['is_paid'] = 1;
			$this->OdikiContract->save($this->data);
			$this->pageTitle = "Πληρωμή Συμβολαίου";
			$this->Session->setFlash('Το συμβόλαιο έχει πληρωθεί...');
			$this->redirect(array('action' => 'view', $id));
		}
		/* fixed */
		function unpay($id)
		{
			$this->data = $this->OdikiContract->findById($id);
			$this->data['OdikiContract']['is_paid'] = 0;
			$this->OdikiContract->save($this->data);
			$this->pageTitle = "Πληρωμή Συμβολαίου";
			$this->Session->setFlash('Η αναίρεση πληρωμής ολοκληρώθηκε...');
			$this->redirect(array('action' => 'view', $id));
		}
	
		function delete($id)
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
		function isPaid($status)
		{
			if (!in_array($status, array("yes","no")))
				die("The input is not valid");
			if ($status=="no")
				$conditions = array('OdikiContract.is_paid' => '0');
			else
				$conditions = array('OdikiContract.is_paid' => '1');
			$contracts = $this->paginate('OdikiContract', $conditions);
			if (count($contracts) != 0)
			{
				$i=0;
				foreach ($contracts as $contract)
					$vehicles[$i++] = $this->requestAction("/vehicles/getFromOdikiId/" . $contract['OdikiContract']['id']);
			}
			else
				$vehicles = null;
			
			$this->set('status', $status);
			$this->set('contracts', $contracts);
			$this->set('vehicles', $vehicles);
		}
		
		function statistics()
		{
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
		}
	}
?>
