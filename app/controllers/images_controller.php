<?php
	class ImagesController extends AppController
	{
		var $name="Images";
		function delete($id, $vehicleId)
		{
			if ( (!isset($vehicleId)) || (!isset($vehicleId)) )
				$this->cakeError('error404');
			
			$image = $this->Image->findById($id);
			if ($image==null)
				$this->cakeError('error404');
		
			unlink($image['Image']['url']);				
			$this->Image->del($id);
			
			$this->flash('Η επισύναψη διαγράφηκε επιτυχώς...', "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
		}
		
		function getFromVehicle($vehicleId)
		{
			if (!isset($vehicleId))
				$this->cakeError('error404');
			
			$images = $this->Image->find('all', array('conditions' => array('Image.Vehicle_id' => $vehicleId)));
			
			return $images;
		}
		
		function add($vehicleId)
		{
			if (!isset($vehicleId))
				$this->cakeError('error404');
			
			$vehicle = $this->requestAction("/vehicles/get/" . $vehicleId);
			if ($vehicle==null)
					$this->cakeError('error404');
			
			if (!empty($this->data)) 
			{
				$pos = strrpos($this->data['Image']['file']['name'], ".");
				if ($pos==false)
					$this->flash('Δεν είναι δυνατόν να επισυνάψετε αρχείο χωρίς επέκταση...', "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
				else
				{
					$extension = substr($this->data['Image']['file']['name'], $pos);
				
					$this->data['Image']['vehicle_id'] = $vehicleId;
					$plateEN = $this->makeEnglish($vehicle['Vehicle']['plate']);
				
					$newFullUrl = "pics/" . $plateEN . "_" . mktime() . "_" . $extension;
					// CHECK IF_FILE_EXISTS
					if (move_uploaded_file($this->data['Image']['file']['tmp_name'], $newFullUrl))
					{
						$this->data['Image']['url'] = $newFullUrl;
						if ($this->Image->save($this->data)) 
							$this->flash('Η επισύναψη έχει αποθηκευτεί...', "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
						else
							$this->flash('Πρόβλημα κατά την επισύναψη... Επικοινωνήστε με την τεχνική υποστήριξη (images/add Κωδ01)...', "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
					}
					else
						$this->flash('Πρόβλημα κατά την επισύναψη... Επικοινωνήστε με την τεχνική υποστήριξη (images/add Κωδ02)...', "/vehicles/view/" . $vehicleId, FLASH_TIMEOUT);
				}
			}
			else
			{
				$this->set('vehicleId', $vehicleId);
				$this->set('plate', $vehicle['Vehicle']['plate']);
			}
		}
	}
?>
