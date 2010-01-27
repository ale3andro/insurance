<!-- file /app/views/statistics/totals.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Στατιστικά Οχημάτων";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><?php echo $title; ?><h2></h2></div>
	<div class="post_body">
		<?php
			if ($num==0)
				echo "Δεν υπάρχουν καταχωρημένα οχήματα";
			else
			{
				echo "<table>";
				echo "<tr><td></td><td>Οχήματα</td></tr>";
				echo "<tr><td>Με ασφάλεια</td><td>" . $numInsured . "</td></tr>";
				echo "<tr><td>" . $html->link("Χωρίς ασφάλεια", "/vehicles/withoutInsurance") . "</td><td>" . ($num-$numInsured) . "</td></tr>";
				echo "<tr><td>Με οδική βοήθεια</td><td>" . $numOdiki . "</td></tr>";
				echo "<tr><td>" . $html->link("Χωρίς οδική βοήθεια", "/vehicles/withoutOdiki") . "</td><td>" . ($num-$numOdiki) . "</td></tr>";
				echo "<tr><td>Σύνολο Οχημάτων</td><td>" . $num . "</td></tr>";
				echo "</table>";
				//echo "<br />" . $html->link("Προβολή Συμβολαίων", "/vehicles/getFromInsuranceCompanyId/" . $company['InsuranceCompany']['id']);
			}
		?>		
	</div>
</div>
