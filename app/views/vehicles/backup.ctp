<!-- File: /app/views/contracts/backup.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
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
