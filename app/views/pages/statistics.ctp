<?php $this->set("title", "Στατιστικά Συμβολαίων"); ?>
<?php echo $this->element("header", array( "activeTab" => -1) ); ?>
<div class="post">
	<div class="post_title"><h2>Στατιστικά Πληρωμής Συμβολαίων</h2></div>
	<div class="post_body">
		<p>Στατιστικά Συμβολαίων:</p>
		<ul>
			<li><?php echo $html->link("Οχημάτων","/vehicles/statistics"); ?></li>
			<li><?php echo $html->link("Ασφάλειας","/insuranceContracts/statistics"); ?></li>
			<li><?php echo $html->link("Οδικής Βοήθειας","/odikiContracts/statistics"); ?></li>
		</ul>
	</div>
</div>
