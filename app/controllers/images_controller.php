<?php
	class ImagesController extends AppController
	{
		var $name="Images";
		function index() /* ok */
		{
			echo "ok";
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
				{
					$this->Session->setFlash('Δεν είναι δυνατόν να επισυνάψετε αρχείο χωρίς επέκταση');
					$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicleId));
				}
				$extension = substr($this->data['Image']['file']['name'], $pos);
				
				$this->data['Image']['vehicle_id'] = $vehicleId;
				$plateEN = $this->makeEnglish($vehicle['Vehicle']['plate']);
				
				$imgs = $this->requestAction("/images/getFromVehicle/" . $vehicleId);
				
				$newFullUrl = "pics/" . $plateEN . "_" . (($imgs==null)?"0":count($imgs)) . "_" . $extension;
				// CHECK IF_FILE_EXISTS
				if (move_uploaded_file($this->data['Image']['file']['tmp_name'], $newFullUrl))
				{
					$this->data['Image']['url'] = $newFullUrl;
					if ($this->Image->save($this->data)) 
					{
						$this->Session->setFlash('Η επισύναψη έχει αποθηκευτεί...');
						$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicleId));
					}
				}
				else
				{
					$this->Session->setFlash('Πρόβλημα κατά την επισύναψη... Επικοινωνήστε με την τεχνική υποστήριξη.');
					$this->redirect(array('controller' => 'vehicles', 'action' => 'view', $vehicleId));
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
