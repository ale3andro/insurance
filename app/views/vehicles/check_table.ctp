<!-- file /app/views/statistics/check_table.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Έλεγχος πίνακα οχημάτων ΔΒ ";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><?php echo $title; ?><h2></h2></div>
	<div class="post_body">
		<?php
			echo "<h2>ΣΥΜΒΟΛΑΙΑ ΑΣΦΑΛΕΙΑΣ</h2>";			
			echo "Αριθμός Ασφαλιστικών Συμβολαίων: " . count($insContrIds) . "<br />";
			echo "Αριθμός Έγκυρων Συμβολαίων: " . count($uniqueInsContrIds) . "<br />";
			if (count($duplicInsContrIds)!=0)
			{
				echo "Διπλά συμβόλαια:<br /><ul>";
				foreach ($duplicInsContrIds as $duplicate)
					echo "<li>Το ασφαλιστικό συμβόλαιο με id: " . $duplicate . " είναι διπλότυπο</li>";
				echo "</ul>";
			}
			else
				echo "Δεν υπάρχει διπλότυπα συμβόλαια";
				
			echo "<br />";
			if (count($voidInsContrIds)!=0)
			{
				echo "Συμβόλαια χωρίς αντίκρυσμα:<br /><ul>";
				foreach ($voidInsContrIds as $void)
					echo "<li>Το ασφαλιστικό συμβόλαιο με id: " . $void . " είναι χωρίς αντίκρυσμα</li>";
				echo "</ul>";			
			}
			else
				echo "Δεν υπάρχουν ids συμβολαίων χωρίς αντίκρυσμα";
			
			
			echo "<h2>ΣΥΜΒΟΛΑΙΑ ΟΔΙΚΗΣ ΒΟΗΘΕΙΑΣ</h2>";			
			echo "Αριθμός Συμβολαίων Οδικής: " . count($odiContrIds) . "<br />";
			echo "Αριθμός Έγκυρων Συμβολαίων: " . count($uniqueOdiContrIds) . "<br />";
			if (count($duplicOdiContrIds)!=0)
			{
				echo "Διπλά συμβόλαια:<br /><ul>";
				foreach ($duplicOdiContrIds as $duplicate)
					echo "<li>Το συμβόλαιο οδικής με id: " . $duplicate . " είναι διπλότυπο</li>";
				echo "</ul>";
			}
			else
				echo "Δεν υπάρχει διπλότυπα συμβόλαια";
				
			echo "<br />";
			if (count($voidOdiContrIds)!=0)
			{
				echo "Συμβόλαια χωρίς αντίκρυσμα:<br /><ul>";
				foreach ($voidOdiContrIds as $void)
					echo "<li>Το συμβόλαιο οδικής με id: " . $void . " είναι χωρίς αντίκρυσμα</li>";
				echo "</ul>";			
			}
			else
				echo "Δεν υπάρχουν ids συμβολαίων χωρίς αντίκρυσμα";
			
			echo "<br /><br />";
			
			echo $html->link("Έλεγχος πίνακα ασφαλιστικών συμβολαίων", "/insuranceContracts/checkTable");
			echo "<br />";
			echo $html->link("Έλεγχος πίνακα συμβολαίων οδικής βοήθειας", "/odikiContracts/checkTable");
		?>		
	</div>
</div>
