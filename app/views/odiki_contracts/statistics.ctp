<!-- file /app/views/odiki_contracts/totals.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 

	$title = "Στατιστικά Συμβολαίων Οδικής Βοήθειας" . (($company!=null)?(" (" . $company['OdikiCompany']['description'] . ")"):"");
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			if ($unpaidContracts+$paidContracts==0)
			echo "Δεν υπάρχουν καταχωρημένα συμβόλαια";
			else
			{
				echo "<table>";
				echo "<tr><td></td><td>Συμβόλαια Οδικής Βοήθειας</td><td>Ποσά</td></tr>";
				echo "<tr><td>Απλήρωτα</td><td>" . $unpaidContracts . "</td><td>" . $unpaidSum . " &euro;</td></tr>";
				echo "<tr><td>Πληρωμένα</td><td>" . $paidContracts . "</td><td>" . $paidSum . " &euro;</td></tr>";
				echo "<tr><td>Σύνολα</td><td>" . ($paidContracts+$unpaidContracts) . "</td><td>" . ($paidSum+$unpaidSum) . " &euro;</td></tr>";
				echo "</table>";
				echo "<br />" . $html->link("Προβολή Συμβολαίων", "/vehicles/getFromOdikiCompanyId/" . $company['OdikiCompany']['id']);
			}
		?>		
	</div>
</div>
