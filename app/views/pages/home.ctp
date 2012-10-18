<?php 
	$this->set("title", "Διαχείριση Ασφαλιστικών Συμβολαίων - Γ. Μάνθου");

	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 0, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 0) ); 
?>
<div class="post">
	<div class="post_title"><h2>Αρχική Σελίδα</h2></div>
	<div class="post_body">
		<p><?php
				echo "<h1>" . Configure::read("COMPANY_TITLE") . "</h1>";
				echo Configure::read("PUNCH_LINE");
			?>		
		</p>
	</div>
</div>
