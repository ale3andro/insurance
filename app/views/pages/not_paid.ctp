<?php $this->set("title", "Απλήρωτα Συμβόλαια"); ?>
<?php echo $this->element("header", array( "activeTab" => 2) ); ?>
<div class="post">
	<div class="post_title"><h2>Απλήρωτα Συμβόλαια</h2></div>
	<div class="post_body">
		<p>Απλήρωτα Συμβόλαια:</p>
		<ul>
			<li><?php echo $html->link("Ασφάλειας","/insuranceContracts/isPaid/no"); ?></li>
			<li><?php echo $html->link("Οδικής Βοήθειας","/odikiContracts/isPaid/no"); ?></li>
		</ul>
	</div>
</div>
