<!-- file /app/views/vehicles/without_odiki.ctp -->
<?php 
	echo $this->element("header", array( "activeTab" => 1) ); 
	$title = "Οχήματα χωρίς Οδική Βοήθεια";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			if (count($vehicles)!=0)
			{
				echo $this->element("vehiclesList", array("vehicles" => $vehicles));					
				echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
				echo $paginator->numbers();
				echo "<br />" . $paginator->counter(array('format' => 'Σύνολο Αποτελεσμάτων: %count%'));
			}
			else
				echo "Δεν υπάρχουν οχήματα χωρίς οδική βοήθεια";
		?>		
	</div>
</div>
