<?php
	class OdikiCompaniesController extends AppController
	{
		var $name="odiki_companies";
		var $paginate = array( 'limit' => 10, 'order' => array('OdikiCompany.description' => 'asc'));
		
		function index() /* ok */
		{
			if (isset($this->params['requested']))
				return $this->OdikiCompany->find("all");
			
			$this->pageTitle = "Συνεργαζόμενες Εταιρίες Οδικής Ασφάλειας";				
			$this->set("theFirms", $this->paginate());	
		}
		
		function get($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			if (isset($this->params['requested']))
				return $this->OdikiCompany->findById($id);			
			else
				$this->cakeError('error404');
		}
		
		function add() /* ok */
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
		
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$this->OdikiCompany->id = $id;
			
			if (empty($this->data))
			{
				$this->pageTitle = "Διόρθωση Στοιχείων Εταιρίας Οδικής Βοήθειας";
				$this->data = $this->OdikiCompany->read();
				if ($this->data==null)
					$this->cakeError('error404');
			}
			else
			{
				$this->OdikiCompany->save($this->data);
				$this->Session->setFlash('Τα στοιχεία της Εταιρίας Οδικής Βοήθειας έχουν ενημερωθεί...');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		function view($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$company = $this->OdikiCompany->findById($id);
			if ($company==null)
				$this->cakeError('error404');
				
			$this->set('company', $company);
		}
		function createSelect($selectedId=-1) /* ok */
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
			else
				$this->cakeError('error404');
		}		
	}
?>
