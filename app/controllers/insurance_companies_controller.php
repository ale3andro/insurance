<?php
	class InsuranceCompaniesController extends AppController
	{
		var $name="insurance_companies";
		var $paginate = array( 'limit' => 10, 'order' => array('InsuranceCompany.description' => 'asc'));
		function index() /* ok */
		{
			if (isset($this->params['requested']))
				return $this->InsuranceCompany->find("all");
			
			$this->pageTitle = "Συνεργαζόμενες Ασφαλιστικές Εταιρίες";				
			$this->set("theCompanies", $this->paginate());	
		}
		
		function get($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			if (isset($this->params['requested']))
				return $this->InsuranceCompany->findById($id);
			else
				$this->cakeError('error404');
		}
		
		function add() /* ok */
		{
			if (!empty($this->data)) 
			{
				if ($this->InsuranceCompany->save($this->data)) 
					$this->flash('Η ασφαλιστική εταιρία έχει αποθηκευτεί...', '/insuranceCompanies', FLASH_TIMEOUT);
			}
			else
				$this->pageTitle = "Προσθήκη Ασφαλιστικής Εταιρίας";
		}
		
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$this->InsuranceCompany->id = $id;
			
			if (empty($this->data))
			{
				$this->pageTitle = "Διόρθωση Στοιχείων Ασφαλιστικής Εταιρίας";
				$this->data = $this->InsuranceCompany->read();
				if ($this->data==null)
					$this->cakeError('error404');
			}
			else
			{
				$this->InsuranceCompany->save($this->data);
				$this->flash('Τα στοιχεία της Ασφαλιστικής Εταιρίας έχουν ενημερωθεί...', '/insuranceCompanies/view/' . $id, FLASH_TIMEOUT);
			}
		}
		
		function view($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			$company = $this->InsuranceCompany->findById($id);
			
			if ($company==null)
				$this->cakeError('error404');
			
			$this->set('company', $company);
		}
		function createSelect($selectedId=-1) /* ok */
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
			else
				$this->cakeError('error404');		
		}		
	}
?>
