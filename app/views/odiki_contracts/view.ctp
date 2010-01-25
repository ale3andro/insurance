<!-- file /app/views/odiki_contracts/view.ctp -->
<?php 
	echo $this->element("header", array( "activeTab" => -1 )); 
	$title = "Προβολή Συμβολαίου Οδικής Βοήθειας " . $vehicle['Vehicle']['plate'];
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		
		<?php
			echo "<p>Ονοματεπώνυμο: " . $vehicle['Vehicle']['first_name'] . "</p>";
			echo "<p>Όνομα Πατέρα: " . $vehicle['Vehicle']['father_name'] . "</p>";
			echo "<p>Αριθμός Πινακίδας: " . $vehicle['Vehicle']['plate'] . "</p>";
			
			echo "<p>Διάρκεια Ασφάλισης: από " . $odikiContract['OdikiContract']['from'] . " έως " . 
							$odikiContract['OdikiContract']['to'] . "</p>";
			echo "<p>Ποσό ασφαλίστρων: " . $odikiContract['OdikiContract']['amount'] . " &euro;</p>";
			echo "<p>Ασφαλιστική Εταιρία: " . $odikiCompany['OdikiCompany']['description'] . "</p>";	
			echo "<p>" . $html->link("Διόρθωση στοιχείων", "/odikiContracts/edit/" . $vehicle['Vehicle']['odiki_contract_id']) . "</p>";
			
			echo "<p><a href=\"" .  $html->webroot . "/odikiContracts/delete/" . $vehicle['Vehicle']['odiki_contract_id'] . "\" 
								onclick=\"return confirm('Είστε σίγουρος ότι θέλετε να διαγράψετε αυτό το συμβόλαιο;');\">Διαγραφή Συμβολαίου</a>";
			if ($odikiContract['OdikiContract']['is_paid'] == 0)
				echo "<p>Είναι απλήρωτο! " . $html->link("Άμεση Πληρωμή", "/odikiContracts/pay/" . 
								$odikiContract['OdikiContract']['id']) . "</p>";
			else
				echo "<p>Είναι πληρωμένο! " . $html->link("Αναίρεση Πληρωμής", "/odikiContracts/unpay/" . 
								$odikiContract['OdikiContract']['id']) . "</p>";
		?>		
	</div>
</div>
