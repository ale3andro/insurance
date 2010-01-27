<!-- file /app/views/insurance_contracts/view.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Προβολή Ασφαλιστικού Συμβολαίου " . $vehicle['Vehicle']['plate'];
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		
		<?php
			echo "<p>Ονοματεπώνυμο: " . $vehicle['Vehicle']['first_name'] . " " . $vehicle['Vehicle']['last_name'] . "</p>";
			echo "<p>Όνομα Πατέρα: " . $vehicle['Vehicle']['father_name'] . "</p>";
			echo "<p>Αριθμός Πινακίδας: " . $vehicle['Vehicle']['plate'] . "</p>";
			
			echo "<p>Διάρκεια Ασφάλισης: από " . $insuranceContract['InsuranceContract']['from'] . " έως " . 
							$insuranceContract['InsuranceContract']['to'] . "</p>";
			echo "<p>Ποσό ασφαλίστρων: " . $insuranceContract['InsuranceContract']['amount'] . " &euro;</p>";
			echo "<p>Ασφαλιστική Εταιρία: " . $insuranceCompany['InsuranceCompany']['description'] . "</p>";	
			echo "<p>" . $html->link("Διόρθωση στοιχείων", "/insuranceContracts/edit/" . $vehicle['Vehicle']['insurance_contract_id']) . "</p>";
			
			echo "<p><a href=\"" .  $html->webroot . "/insuranceContracts/delete/" . $vehicle['Vehicle']['insurance_contract_id'] . "\" 
								onclick=\"return confirm('Είστε σίγουρος ότι θέλετε να διαγράψετε αυτό το συμβόλαιο;');\">Διαγραφή Συμβολαίου</a>";
			if ($insuranceContract['InsuranceContract']['is_paid'] == 0)
				echo "<p>Είναι απλήρωτο! " . $html->link("Άμεση Πληρωμή", "/insuranceContracts/pay/" . 
								$insuranceContract['InsuranceContract']['id']) . "</p>";
			else
				echo "<p>Είναι πληρωμένο! " . $html->link("Αναίρεση Πληρωμής", "/insuranceContracts/unpay/" . 
								$insuranceContract['InsuranceContract']['id']) . "</p>";
		?>		
	</div>
</div>
