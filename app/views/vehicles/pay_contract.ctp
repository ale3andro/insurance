<!-- File: /app/views/contracts/pay_contract.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 1) ); 
?>
<div class="post">
	<div class="post_title"><h2>Πληρωμή Συμβολαίου <?php echo $contract['Contract']['plate']; ?></h2></div>
	<div class="post_body">
		<?php
			echo "<p>Το συμβόλαιο του " . $contract['Contract']['firstName'] . " " . $contract['Contract']['lastName'] . " για το όχημα " . 
						$contract['Contract']['plate'] . " πληρώθηκε επιτυχώς</p>";
			echo "<p>Επιστροφή σε ". $html->link("όλα τα συμβόλαια", "/contracts") . " ή στα " . $html->link("απλήρωτα συμβόλαια", "/contracts/notPaid") . "</p>";
		?>		
	</div>
</div>
