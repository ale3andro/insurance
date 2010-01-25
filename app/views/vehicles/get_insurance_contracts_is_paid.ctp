<!-- file /app/views/vehicles/get_insurance_contracts_is_paid.ctp -->
<?php 
	echo $this->element("header", array( "activeTab" => 2 ));
	$title = (($status=="no")?"Απλήρωτα Ασφαλιστικά Συμβόλαια":"Πληρωμένα Ασφαλιστικά Συμβόλαια");
	$this->set("title", $title); 
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			if ($vehicles == null)
				echo "Όλα τα συμβόλαια είναι " . (($status=="no")?"πληρωμένα":"απλήρωτα");
			{
				echo  $this->element("vehiclesList", array("vehicles" => $vehicles));					
				$paginator->options(array('url' => $this->passedArgs));
				echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
				echo $paginator->numbers();
			}
		?>		
	</div>
</div>
