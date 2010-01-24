<!-- File: /app/views/contracts/θνpay_contract.ctp -->	
<?php echo $this->element("header", array( "activeTab" => 1) ); ?>
<div class="post">
	<div class="post_title"><h2>Αναίρεση Πληρωμής Συμβολαίου <?php echo $contract['Contract']['plate']; ?></h2></div>
	<div class="post_body">
		<?php
			echo "<p>Η αναιρεσή πληρωμής του συμβολαίου του " . $contract['Contract']['firstName'] . " " . $contract['Contract']['lastName'] . " για το όχημα " . 
						$contract['Contract']['plate'] . " ολοκληρώθηκε επιτυχώς</p>";
			echo "<p>Επιστροφή σε ". $html->link("όλα τα συμβόλαια", "/contracts") . " ή στα " . $html->link("απλήρωτα συμβόλαια", "/contracts/notPaid") . "</p>";
		?>		
	</div>
</div>
