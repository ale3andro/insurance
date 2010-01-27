<!-- file /app/views/vehicles/get_odiki_contracts_due.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Συμβόλαια Οδικής Βοήθειας που λήγουν σε " . $numDays . " μέρες";
	$this->set("title", $title);
?>

<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			if ($theVehicles!=null)
			{
				echo $this->element("vehiclesList", array("vehicles" => $theVehicles));					
				echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
				echo $paginator->numbers();
				echo "<br />" . $paginator->counter(array('format' => 'Σύνολο Αποτελεσμάτων: %count%'));
			}
			else
				echo "Δεν βρέθηκαν συμβόλαια";
		?>		
	</div>
</div>
