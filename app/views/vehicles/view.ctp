<!-- File: /app/views/vehicles/view.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Προβολή λεπτομερειών οχήματος " . $vehicle['Vehicle']['plate'];
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			echo "<p>Ονοματεπώνυμο: " . $vehicle['Vehicle']['first_name'] . " " . $vehicle['Vehicle']['last_name'] . "</p>";
			echo "<p>Όνομα Πατέρα: " . $vehicle['Vehicle']['father_name'] . "</p>";
			echo "<p>Αριθμός Πινακίδας: " . $vehicle['Vehicle']['plate'] . "</p>";
			if ($images!=null)
			{
				echo "<p>Επισυναπτόμενα αρχεία:</p><ol>";
				foreach ($images as $image)
					echo "<li>" . $html->link($image['Image']['description'], "/" . $image['Image']['url'] .".png",
								array('target' => '_blank')) . "</li>";
				echo "</ol>";
			}
			echo "<p>" . $html->link("Διόρθωση στοιχείων οχήματος", "/vehicles/edit/" . $vehicle['Vehicle']['id']) . "</p>";
			echo "<p><a href=\"" .  $html->webroot . "vehicles/delete/" . $vehicle['Vehicle']['id'] . "\" 
								onclick=\"return confirm('Είστε σίγουρος ότι θέλετε να διαγράψετε τα στοιχεία και τις ασφάλειες αυτού του οχήματος;');\">Διαγραφή Οχήματος και Ασφαλειών του</a>";
						
			echo "<h3>Συμβόλαιο Ασφάλειας</h3>";
			if ($vehicle['Vehicle']['insurance_contract_id']==0)
			{
				echo "<p>Δεν υπάρχει συμβόλαιο...</p>";
				echo "<p>" . $html->link("Προσθήκη Συμβολαίου Ασφάλειας", "/insuranceContracts/add/" . $vehicle['Vehicle']['id']) . "</p>";
			}
			else
			{
				echo "<p>Διάρκεια Ασφάλισης: από " . $insuranceContract['InsuranceContract']['from'] . " έως " . 
							$insuranceContract['InsuranceContract']['to'] . "</p>";
				echo "<p>Ποσό ασφαλίστρων: " . $insuranceContract['InsuranceContract']['amount'] . " &euro;</p>";
				echo "<p>Ασφαλιστική Εταιρία: " . $insuranceCompany['InsuranceCompany']['description'] . "</p>";	
				echo "<p>" . $html->link("Διόρθωση στοιχείων", "/insuranceContracts/edit/" . $vehicle['Vehicle']['insurance_contract_id']) . "</p>";
				echo "<p><a href=\"" .  $html->webroot . "insuranceContracts/delete/" . $vehicle['Vehicle']['insurance_contract_id'] . "\" 
								onclick=\"return confirm('Είστε σίγουρος ότι θέλετε να διαγράψετε αυτό το συμβόλαιο;');\">Διαγραφή Συμβολαίου</a>";
				if ($insuranceContract['InsuranceContract']['is_paid'] == 0)
					echo "<p>Είναι απλήρωτο! " . $html->link("Άμεση Πληρωμή", "/insuranceContracts/pay/" . 
								$insuranceContract['InsuranceContract']['id']) . "</p>";
				else
					echo "<p>Είναι πληρωμένο! " . $html->link("Αναίρεση Πληρωμής", "/insuranceContracts/unpay/" . 
								$insuranceContract['InsuranceContract']['id']) . "</p>";
			}
			
			echo "<h3>Συμβόλαιο Οδικής Βοήθειας</h3>";
			if ($vehicle['Vehicle']['odiki_contract_id']==0)
			{
				echo "<p>Δεν υπάρχει συμβόλαιο...</p>";
				echo "<p>" . $html->link("Προσθήκη Συμβολαίου Οδικής Βοήθειας", "/odikiContracts/add/" . $vehicle['Vehicle']['id']) . "</p>";
			}
			else
			{
				echo "<p>Διάρκεια Ασφάλισης: από " . $odikiContract['OdikiContract']['from'] . " έως " . 
							$odikiContract['OdikiContract']['to'] . "</p>";
				echo "<p>Ποσό ασφαλίστρων: " . $odikiContract['OdikiContract']['amount'] . " &euro;</p>";
				echo "<p>Ασφαλιστική Εταιρία: " . $odikiCompany['OdikiCompany']['description'] . "</p>";	
				echo "<p>" . $html->link("Διόρθωση στοιχείων", "/odikiContracts/edit/" . $vehicle['Vehicle']['odiki_contract_id']) . "</p>";
				echo "<p><a href=\"" .  $html->webroot . "odikiContracts/delete/" . $vehicle['Vehicle']['odiki_contract_id'] . "\" 
								onclick=\"return confirm('Είστε σίγουρος ότι θέλετε να διαγράψετε αυτό το συμβόλαιο;');\">Διαγραφή Συμβολαίου</a>";
				if ($odikiContract['OdikiContract']['is_paid'] == 0)
					echo "<p>Είναι απλήρωτο! " . $html->link("Άμεση Πληρωμή", "/odikiContracts/pay/" . 
								$odikiContract['OdikiContract']['id']) . "</p>";
				else
					echo "<p>Είναι πληρωμένο! " . $html->link("Αναίρεση Πληρωμής", "/odikiContracts/unpay/" . 
								$odikiContract['OdikiContract']['id']) . "</p>";
			
			} 
			
			
		?>	
			
	</div>
</div>
