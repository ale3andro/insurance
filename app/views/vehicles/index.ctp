<!-- file /app/views/vehicles/index.ctp -->
<?php echo $this->element("header", array( "activeTab" => 1) ); ?>
<div class="post">
	<div class="post_title"><h2>Όλα τα Οχήματα</h2></div>
	<div class="post_body">
		<?php
			if (count($theVehicles!=0))
			{
				echo $this->element("vehiclesList", array("vehicles" => $theVehicles));					
				echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
				echo $paginator->numbers();
				echo "<br />" . $paginator->counter(array('format' => 'Σύνολο Αποτελεσμάτων: %count%'));
			}
			else
				echo "Δεν υπάρχουν καταχωρημένα οχήματα!!";
		?>		
	</div>
</div>
