<?php
	class OdikiCompaniesController extends AppController
	{
		var $name="odiki_companies";
		var $paginate = array( 'limit' => 10, 'order' => array('OdikiCompany.description' => 'asc'));
		
		function index()
		{
			if (isset($this->params['requested']))
				return $this->OdikiCompany->find("all");
			
			$this->pageTitle = "Συνεργαζόμενες Εταιρίες Οδικής Ασφάλειας";				
			$this->set("theFirms", $this->paginate());	
		}
		
		function get($id)
		{
			if (isset($this->params['requested']))
				return $this->OdikiCompany->findById($id);			
		}
		
		function add()
		{
			if (!empty($this->data)) 
			{
				if ($this->OdikiCompany->save($this->data)) 
				{
					$this->Session->setFlash('Η εταιρία οδικής έχει αποθηκευτεί...');
					$this->redirect(array('action' => 'index'));
				}
			}
			else
				$this->pageTitle = "Προσθήκη Εταιρίας Οδικής Βοήθειας";
		}
		
		function edit($id)
		{
			$this->OdikiCompany->id = $id;
			
			if (empty($this->data))
			{
				$this->pageTitle = "Διόρθωση Στοιχείων Εταιρίας Οδικής Βοήθειας";
				$this->data = $this->OdikiCompany->read();
			}
			else
			{
				$this->OdikiCompany->save($this->data);
				$this->Session->setFlash('Τα στοιχεία της Εταιρίας Οδικής Βοήθειας έχουν ενημερωθεί...');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		function view($id)
		{
			$company = $this->OdikiCompany->findById($id);
			$this->set('title', $company['OdikiCompany']['description']);
			$this->set('company', $company);
			$contracts = $this->requestAction("/odikiContracts/byCompany/" . $id);
			if (count($contracts) != 0)
			{
				$i=0;
				foreach ($contracts as $contract)
					$vehicles[$i++] = $this->requestAction("/vehicles/getFromOdikiId/" . $contract['OdikiContract']['id']);
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
				$allFirms = $this->OdikiCompany->find("all");
				$retVal="<select name=\"data[OdikiContract][company_id]\" id=\"OdikiCompanyId\">";
				foreach ($allFirms as $firm)
					$retVal .= "<option value=\"" . $firm['OdikiCompany']['id'] . "\"" . 
					(($selectedId==$firm['OdikiCompany']['id'])?" selected=\"selected\"":"") . 
					">" . $firm['OdikiCompany']['description'] . "</option>";
				$retVal .= "</select>";
				return $retVal;
			}
		}		
	}
?>
