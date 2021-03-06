<?php
	class VehiclesController extends AppController
	{
		var $name="Vehicles";
		var $paginate = array( 'limit' => 10, 'order' => array('Vehicle.last_name' => 'asc', 'Vehicle.first_name' => 'asc', 
								'Vehicle.father_name' => 'asc', 'Vehicle.plate' => 'asc'));
		
		function beforeFilter()
		{
			if (ENABLE_USERS==0)
				$this->Auth->allow();
		}
		
		/* fixed */
		function index() /* ok */
		{
			$this->pageTitle = "Όλα τα Οχήματα";
			$this->set("theVehicles", $this->paginate());	
		}
		
		function get($id) /* ok */
		{
			if (isset($this->params['requested']))
				return $this->Vehicle->findById($id);
			else
				$this->cakeError('error404');
		}
		
		function getFromInsuranceId($insuranceId) /* ok */
		{
			if (isset($this->params['requested']))
				return $this->Vehicle->find("first", array( 'conditions' => array('Vehicle.insurance_contract_id =' => $insuranceId)));
			else
				$this->cakeError('error404');
		}
		function getFromInsuranceCompanyId($insuranceCompanyId=-1) /* ok */ 
		{
			if (($insuranceCompanyId!=-1) && ($this->requestAction("/insuranceCompanies/get/" . $insuranceCompanyId)==null) )
				$this->cakeError('error404');
			
			$contracts = $this->requestAction("/insuranceContracts/byCompany/" . $insuranceCompanyId);	
			if (count($contracts)!=0)
			{
				foreach ($contracts as $contract)
					$contractIds[] = $contract['InsuranceContract']['id'];
			
				$conditions['Vehicle.insurance_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles=null;
				
			if ($insuranceCompanyId!=-1)
				$company = $this->requestAction("insuranceCompanies/get/" . $insuranceCompanyId);
			else
				$company = null;
			$this->set("theVehicles", $vehicles);
			$this->set("company", $company);
		}
		function getInsuranceContractsIsPaid($status="no") /* ok */
		{
			$contracts = $this->requestAction("InsuranceContracts/isPaid/" . $status);
			if (count($contracts) != 0)
			{			
				foreach ($contracts as $contract)
					$contractIds[] = $contract['InsuranceContract']['id'];
				$conditions['Vehicle.insurance_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles = null;
				
			$this->set('status', $status);
			$this->set('contracts', $contracts);
			$this->set('vehicles', $vehicles);
		}
		function getInsuranceContractsDue($numDays=7) /* ok */
		{
			if ($numDays<1)
				$this->cakeError('error404');
				
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
		
		function getFromOdikiId($odikiId) /* ok */
		{
			if (isset($this->params['requested']))
				return $this->Vehicle->find("first", array( 'conditions' => array('Vehicle.odiki_contract_id =' => $odikiId)));
			else
				$this->cakeError('error404');
		}
		
		function getFromOdikiCompanyId($odikiCompanyId=-1) /* ok */
		{
			if ( ($odikiCompanyId!=-1) && ($this->requestAction("/odikiCompanies/get/" . $odikiCompanyId)==null) )
				$this->cakeError('error404');
				
			$contracts = $this->requestAction("/odikiContracts/byCompany/" . $odikiCompanyId);	
			if (count($contracts)!=0)
			{
				foreach ($contracts as $contract)
					$contractIds[] = $contract['OdikiContract']['id'];
			
				$conditions['Vehicle.odiki_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles=null;
				if ($odikiCompanyId!=-1)
					$company = $this->requestAction("odikiCompanies/get/" . $odikiCompanyId);
				else
					$company = null;
			$this->set("theVehicles", $vehicles);
			$this->set("company", $company);		
		}
		function getOdikiContractsIsPaid($status="no") /* ok */
		{
			$contracts = $this->requestAction("OdikiContracts/isPaid/" . $status);
			if (count($contracts) != 0)
			{			
				foreach ($contracts as $contract)
					$contractIds[] = $contract['OdikiContract']['id'];
				$conditions['Vehicle.odiki_contract_id'] = $contractIds;
				$vehicles = $this->paginate('Vehicle', $conditions);
			}
			else
				$vehicles = null;
				
			$this->set('status', $status);
			$this->set('contracts', $contracts);
			$this->set('vehicles', $vehicles);
		}
		function getOdikiContractsDue($numDays=7) /* ok */
		{
			if ($numDays<1)
				$this->cakeError('error404');
			
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
		
		function delete($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			$vehicle = $this->Vehicle->findById($id);
			if ($vehicle==null)
				$this->cakeError('error404');
			
			if ($vehicle['Vehicle']['insurance_contract_id'] != 0)
				$this->requestAction("/insuranceContracts/delete/" . $vehicle['Vehicle']['insurance_contract_id']);
			if ($vehicle['Vehicle']['odiki_contract_id'] != 0)
				$this->requestAction("/odikiContracts/delete/" . $vehicle['Vehicle']['odiki_contract_id']);
			
			$this->Vehicle->del($id);
			$this->redirect(array('action' => 'index'));
		}
		
		function uniquePlate($plate)
		{
			if (isset($this->params['requested']))
			{
				if (!isset($plate))
					$this->cakeError('error404');
				
				$res = $this->Vehicle->find('first', array('conditions' => array('Vehicle.plate' => $plate)));
				return $res;
			}
			else
				$this->cakeError('error404');			
		}
		
		/* fixed */
		function search() /* ok */
		{
			$this->set("title", "Αναζήτηση");
			if (!empty($this->data))
			{
				if ($this->data['Vehicle']['first_name'] != "")
					$conditions['Vehicle.first_name LIKE'] = "%" . $this->data['Vehicle']['first_name'] . "%";
				if ($this->data['Vehicle']['last_name'] != "")
					$conditions['Vehicle.last_name LIKE'] = "%" . $this->data['Vehicle']['last_name'] . "%";
				if ($this->data['Vehicle']['father_name'] != "")
					$conditions['Vehicle.father_name LIKE'] = "%" . $this->data['Vehicle']['father_name'] . "%";
				if ($this->data['Vehicle']['plate'] != "")
					$conditions['Vehicle.plate LIKE'] = "%" . $this->data['Vehicle']['plate'] . "%";
				$this->set("vehicles", $this->paginate('Vehicle', $conditions));
			}
		}
		/* fixed */
		function edit($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
			if ($this->Vehicle->findById($id)==null)
				$this->cakeError('error404');
			
			$this->pageTitle = "Διόρθωση Στοιχείων Οχήματος";
			$this->Contract->id = $id;
			
			if (empty($this->data))
			{
				$this->data = $this->Vehicle->read();	
			}
			else
			{				
				$this->Vehicle->save($this->data);
				$this->flash("Τα στοιχεία του οχήματος έχουν ενημερωθεί ενημερωθεί...", "/vehicles/view/" . $id, FLASH_TIMEOUT);
			}
		}
		
		function add() /* ok */
		{
			$this->pageTitle = "Προσθήκη Οχήματος";
			
			if (!empty($this->data)) 
			{
				if ( ($this->data['Vehicle']['plate']=="") || ($this->data['Vehicle']['last_name']=="") )
					$this->flash("Θα πρέπει να καταχωρηθεί τουλάχιστον το Επώνυμο και ο Αριθμός Πινακίδας", "/vehicles/add", FLASH_TIMEOUT);
				else
				{
					$thePlate = $this->requestAction('vehicles/uniquePlate/' . $this->data['Vehicle']['plate']);
					if (!$thePlate)
					{
						if ($this->Vehicle->save($this->data)) 
							$this->flash("Το όχημα έχει αποθηκευτεί...", "/vehicles/view/" . $this->Vehicle->id, FLASH_TIMEOUT);
						else
							$this->flash("Αδυναμία αποθήκευσης οχήματος. Επικοινωνήστε με την τεχνική υποστήριξη (vehicles/add Κωδ 01)...", "/vehicles", FLASH_TIMEOUT);
					}
					else
						$this->flash("Το όχημα με αριθμό πινακίδας " . $this->data['Vehicle']['plate'] . 
										" είναι ήδη αποθηκευμένο στην εφαρμογή", "/vehicles/view/"
										. $thePlate['Vehicle']['id'], FLASH_TIMEOUT);
				}	
			}
		}
		
		function setOdikiContractId($vehicleId, $odikiContractId) /* ok */
		{
			if (isset($this->params['requested']))
			{
				$this->data = $this->Vehicle->findById($vehicleId);
				if ($this->data==null)
					$this->cakeError('error404');
				$this->data['Vehicle']['odiki_contract_id'] = $odikiContractId;
				$this->Vehicle->save($this->data);
			}
			else
				$this->cakeError('error404');			
		}
		
		function setInsuranceContractId($vehicleId, $insuranceContractId) /* ok */
		{
			if (isset($this->params['requested']))
			{
				$this->data = $this->Vehicle->findById($vehicleId);
				if ($this->data==null)
					$this->cakeError('error404');
				$this->data['Vehicle']['insurance_contract_id'] = $insuranceContractId;
				$this->Vehicle->save($this->data);
			}
			else
				$this->cakeError('error404');
		}
		
		/* fixed */
		function view($id) /* ok */
		{
			if (!isset($id))
				$this->cakeError('error404');
				
			$vehicle = $this->Vehicle->findById($id);
			if ($vehicle==null)
				$this->cakeError('error404');
			
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
							
			$this->set("images", $this->requestAction("/images/getFromVehicle/" . $id));
		}		
		
		function backup()
		{
			function backup_tables($host,$user,$pass,$name,$tables = '*')
			{	
				$link = mysql_connect($host,$user,$pass);
				mysql_query("set names utf8");
				mysql_select_db($name,$link);
	
				//get all of the tables
				if($tables == '*')
				{
					$tables = array();
					$result = mysql_query('SHOW TABLES');
					while($row = mysql_fetch_row($result))
						$tables[] = $row[0];
						
				}
				else
				{
					$tables = is_array($tables) ? $tables : explode(',',$tables);
				}
	
				//cycle through
				foreach($tables as $table)
				{
					$result = mysql_query('SELECT * FROM '.$table);
					$num_fields = mysql_num_fields($result);
					
					$return.= 'DROP TABLE IF EXISTS '.$table.';';
					$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
					$return.= "\n\n".$row2[1].";\n\n";
			
					for ($i = 0; $i < $num_fields; $i++) 
					{
						while($row = mysql_fetch_row($result))
						{
							$return.= 'INSERT INTO '.$table.' VALUES(';
							for($j=0; $j<$num_fields; $j++) 
							{
								$row[$j] = addslashes($row[$j]);
								$row[$j] = ereg_replace("\n","\\n",$row[$j]);
								if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
								if ($j<($num_fields-1)) { $return.= ','; }
							}
							$return.= ");\n";
						}
					}
					$return.="\n\n\n";
				}
	
				//save file
				$newFileName = 'db-backup_' . date('Y-m-d') . '_' .  mktime() . '_.sql';
				$handle = fopen(SAVE_DIRECTORY . $newFileName, 'w+');
				fwrite($handle,$return);
				fclose($handle);
				
				if (extension_loaded("zip"))
				{
					$zip = new ZipArchive();
					$zip->open(SAVE_DIRECTORY . $newFileName . ".zip", ZIPARCHIVE::OVERWRITE);
					$zip->addFile(SAVE_DIRECTORY . $newFileName, $newFileName);
					$zip->close();
					unlink(SAVE_DIRECTORY . $newFileName);
					return SAVE_DIRECTORY . $newFileName . ".zip";
				}
				else
					return SAVE_DIRECTORY . $newFileName;
			}
			$this->set("filename", backup_tables('localhost','root','root','insurance'));
		}
		
		/*
		 * 	Ελέγχει τον πίνακα vehicles της βάσης για συμβόλαιο ασφάλειας και οδικής που δεν έχουν
		 * 	αντίκρυσμα στους αντίστοιχους πίνακες συμβολαίων αλλά και για διπλότυπα.
		 */
		function checkTable()
		{
			$vehicles = $this->Vehicle->find("all");
			
			$insContrIds = null; 
				$uniqueInsContrIds = null; // Μοναδικό και έγκυρα 
				$duplicInsContrIds = null; // Διπλά ids μέσα στον πίνακα των οχημάτων
				$voidInsContrIds = null;	// Μοναδικά αλλά χωρίς αντίκρυσμα στον πίνακα συμβολαίων
			
			$odiContrIds = null; 
				$uniqueOdiContrIds = null; 
				$duplicOdiContrIds = null;
				$voidOdiContrIds = null;
				
			foreach ($vehicles as $vehicle)
			{
				if ($vehicle['Vehicle']['insurance_contract_id'] != 0)
				{
					$insContrIds[] = $vehicle['Vehicle']['insurance_contract_id'];
								
					if (!in_array($vehicle['Vehicle']['insurance_contract_id'], $uniqueInsContrIds))
					{
						// Είναι μοναδικό το id αλλά υπάρχει στον αντίστοιχο πίνακα;
						$insContract = $this->requestAction("/insuranceContracts/get/" . 
													$vehicle['Vehicle']['insurance_contract_id']);
						if ($insContract==null)
							$voidInsContrIds[] = $vehicle['Vehicle']['insurance_contract_id'];
						else
							$uniqueInsContrIds[] = $vehicle['Vehicle']['insurance_contract_id'];
					}
					else
						$duplicInsContrIds[] = $vehicle['Vehicle']['insurance_contract_id'];
				}
				
				if ($vehicle['Vehicle']['odiki_contract_id'] !=0 )
				{
					$odiContrIds[] = $vehicle['Vehicle']['odiki_contract_id'];
				
					if (!in_array($vehicle['Vehicle']['odiki_contract_id'], $uniqueOdiContrIds))
					{
						$odiContract = $this->requestAction("/odikiContracts/get/" . 
													$vehicle['Vehicle']['odiki_contract_id']);
						if ($odiContract==null)
							$voidOdiContrIds[] = $vehicle['Vehicle']['odiki_contract_id'];
						else
							$uniqueOdiContrIds[] = $vehicle['Vehicle']['odiki_contract_id'];
					}
					else
						$duplicOdiContrIds[] = $vehicle['Vehicle']['odiki_contract_id'];				
				}
				
			}
			$this->set('vehicles', $vehicles);
			
			$this->set('insContrIds', $insContrIds);
			$this->set('uniqueInsContrIds',	$uniqueInsContrIds);
			$this->set('duplicInsContrIds', $duplicInsContrIds);
			$this->set('voidInsContrIds', $voidInsContrIds);
			
			$this->set('odiContrIds', $odiContrIds);
			$this->set('uniqueOdiContrIds',	$uniqueOdiContrIds);
			$this->set('duplicOdiContrIds', $duplicOdiContrIds);
			$this->set('voidOdiContrIds', $voidOdiContrIds);
		}
		
		function statistics() /* ok */
		{
			$vehicles = $this->Vehicle->find("all");
			$num=0; 
			$numInsured=0; 
			$numOdiki=0;
			foreach ($vehicles as $vehicle)
			{
				$num++;
				if ($vehicle['Vehicle']['insurance_contract_id']!=0)
					$numInsured++;
				if ($vehicle['Vehicle']['odiki_contract_id']!=0)
					$numOdiki++;
			}
			
			$insuranceContractsFromDB = $this->requestAction("/insuranceContracts/statistics");
			$odikiContractsFromDB = $this->requestAction("/odikiContracts/statistics");
			
			$this->set('insuranceContractsFromDB', $insuranceContractsFromDB);
			$this->set('odikiContractsFromDB', $odikiContractsFromDB);
			$this->set('num', $num);
			$this->set('numInsured', $numInsured);
			$this->set('numOdiki', $numOdiki);
		}
		
		function withoutInsurance()
		{
			$conditions['Vehicle.insurance_contract_id'] = "0";
			$this->set("vehicles", $this->paginate('Vehicle', $conditions));
		}
		
		function withoutOdiki()
		{
			$conditions['Vehicle.odiki_contract_id'] = "0";
			$this->set("vehicles", $this->paginate('Vehicle', $conditions));
		}
	}
?>
