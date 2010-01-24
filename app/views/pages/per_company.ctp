<?php $this->set("title", "Διαχείριση Ασφαλιστικών Συμβολαίων - Γ. Μάνθου"); ?>
<?php 
	echo $this->element("header", array( "activeTab" => 4) ); 
	$title = "Συνεργαζόμενες Εταιρίες";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<p>Καλώς ορίσατε στην εφαρμογή διαχείρισης Ασφαλειών του Λογιστικού-Ασφαλιστικού Γραφείου Γ. Μάνθου </p>
		<ul>
			<li><?php echo $html->link("Εταιρίες Ασφαλειών","/insuranceCompanies"); ?></li>
			<li><?php echo $html->link("Εταιρίες Οδικής Βοήθειας","/odikiCompanies"); ?></li>
		</ul>
	</div>
</div>
