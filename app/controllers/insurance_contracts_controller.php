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
				$dateCheck = $this->checkDates($this->data['InsuranceContract']['from'], 
								$this->data['InsuranceContract']['to']);
				
				switch ($dateCheck)
				{
					case 0:
						$this->data['InsuranceContract']['amount'] = str_replace(',','.', 
									$this->data['InsuranceContract']['amount']);
						if ($this->InsuranceContract->save($this->data)) 
						{		
							$this->requestAction("/vehicles/setInsuranceContractId/" . $vehicleId . "/" . $this->InsuranceContract->id);					
							$this->flash('Το συμβόλαιο έχει αποθηκευτεί...', "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
						}
						break;	
					case -1: 
						$this->flash("Παρακαλώ εισάγετε έγκυρη ημερομηνία...", "/insuranceContracts/add/" . $vehicleId, FLASH_TIMEOUT);
						break;
					case -2:
						$this->flash("Η ημερομηνία λήξης του συμβολαίου δεν μπορεί να είναι προγενέστερη
									της ημερομηνίας έναρξης..", "/insuranceContracts/add/" . $vehicleId, FLASH_TIMEOUT);
						break;	
				}	
			}
			else
			{
				$vehicle = $this->requestAction("/vehicles/get/" . $vehicleId);
				if (($vehicle==null) || ($vehicle['Vehicle']['insurance_contract_id']!=0))
					$this->cakeError('error404');
				$this->set('vehicleId', $vehicleId);
				$this->set('insuranceCompaniesSelect', $this->requestAction("/insuranceCompanies/createSelect/"));
				$this->set('vehicle', $vehicle);
			}
		}
		
		/* fixed */
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			$this->InsuranceContract->id = $id;
			$vehicle = $this->requestAction("/vehicles/getFromInsuranceId/" . $id);
			if ($vehicle==null)
				$this->cakeError('error404');
			
			if (empty($this->data))
			{
				$this->data = $this->InsuranceContract->read();
				if ($this->data==null)
					$this->cakeError('error404');
				$this->set('insuranceCompaniesSelect', 
						$this->requestAction("/insuranceCompanies/createSelect/" . $this->data['InsuranceContract']['company_id']));
				$this->set('vehicle', $vehicle);
			}
			else
			{
				$dateCheck = $this->checkDates($this->data['InsuranceContract']['from'], 
								$this->data['InsuranceContract']['to']);
				
				switch ($dateCheck)
				{
					case 0:
						$this->data['InsuranceContract']['amount'] = str_replace(',','.', 
									$this->data['InsuranceContract']['amount']);
						if ($this->InsuranceContract->save($this->data)) 
						{		
							$this->requestAction("/vehicles/setInsuranceContractId/" . $id . "/" . $this->InsuranceContract->id);					
							$this->flash('Το συμβόλαιο έχει ενημερωθεί...', "/vehicles/view/" . $id, FLASH_TIMEOUT);
						}
						break;	
					case -1: 
						$this->flash("Παρακαλώ εισάγετε έγκυρη ημερομηνία...", "/insuranceContracts/edit/" . $id, FLASH_TIMEOUT);
						break;
					case -2:
						$this->flash("Η ημερομηνία λήξης του συμβολαίου δεν μπορεί να είναι προγενέστερη
									της ημερομηνίας έναρξης..", "/insuranceContracts/edit/" . $id, FLASH_TIMEOUT);
						break;	
				}	
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
			$this->flash('Το συμβόλαιο έχει πληρωθεί...', "/insuranceContracts/view/" . $id, FLASH_TIMEOUT);
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
			$this->flash('Η αναίρεση πληρωμής ολοκληρώθηκε...', "/insuranceContracts/view/" . $id, FLASH_TIMEOUT);
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
				$this->flash('Το συμβόλαιο διαγράφηκε επιτυχώς...', "/vehicles/view/" . $vehicle['Vehicle']['id'], FLASH_TIMEOUT);		
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
			
			if (isset($this->params['requested']))
				return $paidContracts+$unpaidContracts;
			
			$this->set("paidContracts", $paidContracts);
			$this->set("paidSum", $paidSum);
			$this->set("unpaidContracts", $unpaidContracts);
			$this->set("unpaidSum", $unpaidSum);	
			$company=null;
			if ($companyId!=-1)
				$company = $this->requestAction("/insuranceCompanies/get/" . $companyId);
			$this->set("company", $company);
		}	
		
		function renew($id, $numMonths)
		{
			if ( (!isset($id)) || (!isset($numMonths)) )
				$this->cakeError('error404');
			
			$this->data = $this->InsuranceContract->findById($id);
			if ($this->data['InsuranceContract']['is_paid']==0)
				$this->flash('Δεν είναι δυνατή η ανανέωση ενός απλήρωτου συμβολαίου...', "/insuranceContracts/view/" . $id, FLASH_TIMEOUT);
			else
			{
				$startDate = $this->data['InsuranceContract']['to'];
				$d = explode('-', $this->data['InsuranceContract']['to']);
				$endYear = $d[0];
				$endMonth = $d[1]+$numMonths;
				if ($endMonth>12)
				{
					$endYear +=floor($endMonth / 12);
					$endMonth = ($endMonth % 12);
				}
								
				$checkDue['year'] = (int)$endYear;
				$checkDue['month'] = (int)(($endMonth<10)?('0' . $endMonth):($endMonth));
				$checkDue['day'] = (int)$d[2];
				
				if (!checkdate($checkDue))
					$checkDue = $this->fixDate($checkDue);
				
				$due  = $checkDue['year'] . '-' . $checkDue['month'] . '-' . $checkDue['day'];
											
				$this->data['InsuranceContract']['is_paid'] = 0;
				$this->data['InsuranceContract']['from'] = $startDate;
				$this->data['InsuranceContract']['to'] = $due;
				
				$this->InsuranceContract->save($this->data);
				$this->flash('Το συμβόλαιο έχει ανανεωθεί...', "/insuranceContracts/view/" . $id, FLASH_TIMEOUT);
			}
		}
		
		function getAll()
		{
			$contracts = $this->InsuranceContract->find('all');
			foreach ($contracts as $contract)
				$theContracts[] = $contract;
				
			return $theContracts;			
		}
	}
?>
