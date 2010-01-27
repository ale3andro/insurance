<!-- File: /app/views/vehicles/search.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 5, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 5) ); 
?>
<div class="post">
	<div class="post_title"><h2><?php echo ((isset($vehicles))?"Αποτελέσματα Αναζήτησης":"Αναζήτηση"); ?></h2></div>
	<div class="post_body">
		<?php
			if (!isset($vehicles))
			{
				echo $form->create('Vehicle', array('action' => 'search'));
				echo $form->input('first_name', array('label' => 'Όνομα:'));
				echo $form->input('last_name', array('label' => 'Επώνυμο:'));
				echo $form->input('father_name', array('label' => 'Όνομα Πατέρα:'));
				echo $form->input('plate', array('label' => 'Αριθμός Πινακίδας:'));
				echo $form->end('Αναζήτηση');
			}
			else
			{
				if ($vehicles!=null)
				{
					echo  $this->element("vehiclesList", array("vehicles" => $vehicles));					
					echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
					echo $paginator->numbers();
					echo "<br />" . $paginator->counter(array('format' => 'Σύνολο Αποτελεσμάτων: %count%'));
				}
				else
					echo "Δεν βρέθηκαν οχήματα με βάσει τα κριτήρια σας";
				
				echo "<br />" . $html->link("Νέα Αναζήτηση", "/vehicles/search");					
			}
		?>		
	</div>
</div>
