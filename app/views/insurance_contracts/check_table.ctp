<!-- file /app/views/insurance_contracts/check_table.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Έλεγχος πίνακα Ασφαλιστικών Συμβολαίων";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		
		<?php
			if (count($voidContracts)!=0)
			{
				echo "Συμβόλαια χωρίς αντίκρυσμα στον πίνακα οχημάτων<ul>";
				foreach ($voidContracts as $contract)
					echo "<li>Το συμβόλαιο ασφάλειας με id: " . $contract . 
									" είναι χωρίς αντίκρυσμα στον πίνακα των οχημάτων</li>";
				
				foreach ($voidContracts as $contract)
					echo $contract . ", ";
			}
			else
				echo "Δεν βρέθηκαν συμβόλαια ασφάλειας χωρίς αντίκρυσμα στον πίνακα οχημάτων";
		?>		
	</div>
</div>
