<!-- file /app/views/odiki_contracts/is_paid.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 2, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 2) ); 
		
	$this->set("title", (($status=="no")?"Απλήρωτα Συμβόλαια Οδικής Βοήθειας":"Πληρωμένα Συμβόλαια Οδικής Βοήθειας")); 
?>
<div class="post">
	<div class="post_title"><h2><?php echo (($status=="no")?"Απλήρωτα Συμβόλαια Οδικής Βοήθειας":"Πληρωμένα Συμβόλαια Οδικής Βοήθειας"); ?></h2></div>
	<div class="post_body">
		
		<?php
			if ($vehicles == null)
				echo "Όλα τα συμβόλαια είναι " . (($status=="no")?"πληρωμένα":"απλήρωτα");
			else
			{
				echo  $this->element("vehiclesList", array("vehicles" => $vehicles));					
				$paginator->options(array('url' => $this->passedArgs));
				echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
				echo $paginator->numbers();
			}
		?>		
	</div>
</div>
