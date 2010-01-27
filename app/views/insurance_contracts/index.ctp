<!-- file /app/views/insurance_contracts/index.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 1) ); 

	$this->set("title", "Όλα τα Συμβόλαια Ασφάλειας"); 
?>
<div class="post">
	<div class="post_title"><h2>Όλα τα Συμβόλαια Ασφάλειας</h2></div>
	<div class="post_body">
		
		<?php
			echo "ok";
		?>		
	</div>
</div>
