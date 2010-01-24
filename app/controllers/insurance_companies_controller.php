<?php
	class InsuranceCompaniesController extends AppController
	{
		var $name="insurance_companies";
		var $paginate = array( 'limit' => 10, 'order' => array('InsuranceCompany.description' => 'asc'));
		function index()
		{
			if (isset($this->params['requested']))
				return $this->InsuranceCompany->find("all");
			
			$this->pageTitle = "Συνεργαζόμενες Ασφαλιστικές Εταιρίες";				
			$this->set("theCompanies", $this->paginate());	
		}
		
		function get($id)
		{
			if (isset($this->params['requested']))
				return $this->InsuranceCompany->findById($id);			
		}
		
		function add()
		{
			if (!empty($this->data)) 
			{
				if ($this->InsuranceCompany->save($this->data)) 
				{
					$this->Session->setFlash('Η ασφαλιστική εταιρία έχει αποθηκευτεί...');
					$this->redirect(array('action' => 'index'));
				}
			}
			else
				$this->pageTitle = "Προσθήκη Ασφαλιστικής Εταιρίας";
		}
		
		function edit($id)
		{
			$this->InsuranceCompany->id = $id;
			
			if (empty($this->data))
			{
				$this->pageTitle = "Διόρθωση Στοιχείων Ασφαλιστικής Εταιρίας";
				$this->data = $this->InsuranceCompany->read();
			}
			else
			{
				$this->InsuranceCompany->save($this->data);
				$this->Session->setFlash('Τα στοιχεία της Ασφαλιστικής Εταιρίας έχουν ενημερωθεί...');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		function view($id)
		{
			$company = $this->InsuranceCompany->findById($id);
			$this->set('title', $company['InsuranceCompany']['description']);
			$this->set('company', $company);
			$contracts = $this->requestAction("/insuranceContracts/byCompany/" . $id);
			
			if (count($contracts) != 0)
			{
				foreach ($contracts as $contract)
					$vehicles[] = $this->requestAction("/vehicles/getFromInsuranceId/" . $contract['InsuranceContract']['id']);
				
				function cmp($a, $b)
				{
					if ($a['Vehicle']['last_name']>$b['Vehicle']['last_name'])
						return 1;
					else if ($a['Vehicle']['last_name']<$b['Vehicle']['last_name'])
						return -1;
					else if ($a['Vehicle']['last_name']==$b['Vehicle']['last_name'])
					{
						if ($a['Vehicle']['first_name']>$b['Vehicle']['first_name'])
							return 1;
						else
							return -1;
					}
				}
				uasort($vehicles, "cmp");
			}
			else
				$vehicles = null;
			
			$this->set('vehicles', $vehicles);
			$this->set('contracts', $contracts);
		}
		function createSelect($selectedId=-1)
		{
			
			if (isset($this->params['requested']))
			{
				$allCompanies = $this->InsuranceCompany->find("all");
				$retVal="<select name=\"data[InsuranceContract][company_id]\" id=\"InsuranceCompanyId\">";
				foreach ($allCompanies as $company)
					$retVal .= "<option value=\"" . $company['InsuranceCompany']['id'] . "\"" . 
					(($selectedId==$company['InsuranceCompany']['id'])?" selected=\"selected\"":"") . 
					">" . $company['InsuranceCompany']['description'] . "</option>";
				$retVal .= "</select>";
				return $retVal;
			}			
		}		
	}
?>
