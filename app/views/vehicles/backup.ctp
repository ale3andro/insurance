<!-- File: /app/views/contracts/backup.ctp -->	
<?php 
	echo $this->element("header", array( "activeTab" => -1) ); 
	$title = "Δημιουργία αντιγράφου ασφαλείας ΒΔ Εφαρμογής";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			echo "Το backup ολοκληρώθηκε επιτυχώς";
		?>		
	</div>
</div>
