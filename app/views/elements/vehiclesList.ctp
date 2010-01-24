<?php
	foreach ($vehicles as $vehicle)
	{
		$plate = (($vehicle['Vehicle']['plate']!="")?$vehicle['Vehicle']['plate']:"Μ/Δ Πινακίδα");
		echo "<p>" . $vehicle['Vehicle']['last_name'] . " " . 
				$vehicle['Vehicle']['first_name']  . 
				(($vehicle['Vehicle']['father_name']!="")?(" (" . $vehicle['Vehicle']['father_name'] . ")"):"") . 
				" - " . $html->link($plate, "/vehicles/view/" . $vehicle['Vehicle']['id']);
		echo (($vehicle['Vehicle']['insurance_contract_id']>0)?
					" (" . $html->link("Ασφάλεια", "/insuranceContracts/view/" . $vehicle['Vehicle']['insurance_contract_id']) . ")":"");
		echo (($vehicle['Vehicle']['odiki_contract_id']>0)?
					" - (" . $html->link("Οδική Βοήθεια", "/odikiContracts/view/" . $vehicle['Vehicle']['odiki_contract_id']). ")":"");
		echo "</p>";
	}
?>
