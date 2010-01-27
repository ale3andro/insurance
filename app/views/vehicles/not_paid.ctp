<!-- file /app/views/contracts/not_paid.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 2, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 2) ); 
?>
<div class="post">
	<div class="post_title"><h2>Απλήρωτα Ασφαλιστικά Συμβόλαια</h2></div>
	<div class="post_body">
		<?php
			echo  $this->element("contractsList", array("contracts" => $theContracts));			
			echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
			echo $paginator->numbers();
		?>		
	</div>
</div>
