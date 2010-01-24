<!-- file /app/views/insurance_contracts/totals.ctp -->
<?php 
	echo $this->element("header", array( "activeTab" => -1) ); 
	$title = "Στατιστικά Συμβολαίων Ασφάλειας" . (($company!=null)?" (" . ($company['InsuranceCompany']['description'] . ")"):"");
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><?php echo $title; ?><h2></h2></div>
	<div class="post_body">
		<?php
			if ($unpaidContracts+$paidContracts==0)
			echo "Δεν υπάρχουν καταχωρημένα συμβόλαια";
			else
			{
				echo "<table>";
				echo "<tr><td></td><td>Συμβόλαια Ασφάλειας</td><td>Ποσά</td></tr>";
				echo "<tr><td>Απλήρωτα</td><td>" . $unpaidContracts . "</td><td>" . $unpaidSum . " &euro;</td></tr>";
				echo "<tr><td>Πληρωμένα</td><td>" . $paidContracts . "</td><td>" . $paidSum . " &euro;</td></tr>";
				echo "<tr><td>Σύνολα</td><td>" . ($paidContracts+$unpaidContracts) . "</td><td>" . ($paidSum+$unpaidSum) . " &euro;</td></tr>";
				echo "</table>";
				echo "<br />" . $html->link("Προβολή Συμβολαίων", "/vehicles/getFromInsuranceCompanyId/" . $company['InsuranceCompany']['id']);
			}
		?>		
	</div>
</div>
