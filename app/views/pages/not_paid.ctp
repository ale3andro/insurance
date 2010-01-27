<?php 
	$this->set("title", "Απλήρωτα Συμβόλαια"); 

	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 2, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 2) );  
?>
<div class="post">
	<div class="post_title"><h2>Απλήρωτα Συμβόλαια</h2></div>
	<div class="post_body">
		<p>Απλήρωτα Συμβόλαια:</p>
		<ul>
			<li><?php echo $html->link("Ασφάλειας","/vehicles/getInsuranceContractsIsPaid/no"); ?></li>
			<li><?php echo $html->link("Οδικής Βοήθειας","/vehicles/getOdikiContractsIsPaid/no"); ?></li>
		</ul>
	</div>
</div>
