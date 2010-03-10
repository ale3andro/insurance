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
					$this->flash("Το συμβόλαιο έχει αποθηκευτεί...", "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
				}
			}
			else
			{
				$vehicle = $this->requestAction("/vehicles/get/" . $vehicleId);
				if (($vehicle==null) || ($vehicle['Vehicle']['odiki_contract_id']!=0))
					$this->cakeError('error404');
				$this->set('vehicleId', $vehicleId);
				$this->set('odikiCompaniesSelect', $this->requestAction("/odikiCompanies/createSelect/"));
				$this->set('vehicle', $vehicle);
			}
		}
		
		/* fixed */
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			
			$this->InsuranceContract->id = $id;
			$vehicle = $this->requestAction("/vehicles/getFromOdikiId/" . $id);
				
			$this->OdikiContract->id = $id;
			
			if (empty($this->data))
			{
				$this->data = $this->OdikiContract->read();
				if ($this->data==null)
					$this->cakeError('error404');
				$this->set('odikiCompaniesSelect', 
						$this->requestAction("/odikiCompanies/createSelect/" . $this->data['OdikiContract']['company_id']));
				$this->set('vehicle', $vehicle);
			}
			else
			{
				$this->OdikiContract->save($this->data);
				$this->flash('Το συμβόλαιο έχει ενημερωθεί...', "/odikiContracts/view/" . $id, FLASH_TIMEOUT);
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
			$this->flash("Το συμβόλαιο έχει πληρωθεί...", "/odikiContracts/view/" . $id, FLASH_TIMEOUT);
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
			$this->flash('Η αναίρεση πληρωμής ολοκληρώθηκε...', "/odikiContracts/view/" . $id, FLASH_TIMEOUT);
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
				$this->flash('Το συμβόλαιο διαγράφηκε επιτυχώς...', "/vehicles/view/" . $vehicle['Vehicle']['id'], FLASH_TIMEOUT);
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
			if (isset($this->params['requested']))
				return $paidContracts+$unpaidContracts;
				
			$this->set("paidContracts", $paidContracts);
			$this->set("paidSum", $paidSum);
			$this->set("unpaidContracts", $unpaidContracts);
			$this->set("unpaidSum", $unpaidSum);
			$company=null;
			if ($companyId!=-1)
				$company = $this->requestAction("/odikiCompanies/get/" . $companyId);
			$this->set("company", $company);			
		}
		
		function renew($id, $numMonths)
		{
			if ( (!isset($id)) || (!isset($numMonths)) )
				$this->cakeError('error404');
			
			$this->data = $this->OdikiContract->findById($id);
			if ($this->data['OdikiContract']['is_paid']==0)
				$this->flash('Δεν είναι δυνατή η ανανέωση ενός απλήρωτου συμβολαίου...', "/odikiContracts/view/" . $id, FLASH_TIMEOUT);
			else
			{
				$startDate = $this->data['OdikiContract']['to'];
				$d = explode('-', $this->data['OdikiContract']['to']);
				$endYear = $d[0];
				$endMonth = $d[1]+$numMonths;
				if ($endMonth>12)
				{
					$endYear +=floor($endMonth / 12);
					$endMonth = ($endMonth % 12);
				}
				$due  = $endYear . '-' . (($endMonth<10)?('0' . $endMonth):($endMonth)) . '-' . $d[2];
				
				//echo $startDate . "<br />" . $due . "<br />";
								
				$this->data['OdikiContract']['is_paid'] = 0;
				$this->data['OdikiContract']['from'] = $startDate;
				$this->data['OdikiContract']['to'] = $due;
				
				$this->OdikiContract->save($this->data);
				$this->flash('Το συμβόλαιο έχει ανανεωθεί...', "/odikiContracts/view/" . $id, FLASH_TIMEOUT);
			}
		}
	}
?>
