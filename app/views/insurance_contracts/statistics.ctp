<!-- file /app/views/insurance_contracts/totals.ctp -->
<?php echo $this->element("header", array( "activeTab" => -1) ); ?>
<div class="post">
	<div class="post_title"><h2>Στατιστικά Συμβολαίων Ασφάλειας</h2></div>
	<div class="post_body">
		<?php
			echo "<table>";
			echo "<tr><td></td><td>Συμβόλαια Ασφάλειας</td><td>Ποσά</td></tr>";
			echo "<tr><td>Απλήρωτα</td><td>" . $unpaidContracts . "</td><td>" . $unpaidSum . " &euro;</td></tr>";
			echo "<tr><td>Πληρωμένα</td><td>" . $paidContracts . "</td><td>" . $paidSum . " &euro;</td></tr>";
			echo "<tr><td>Σύνολα</td><td>" . ($paidContracts+$unpaidContracts) . "</td><td>" . ($paidSum+$unpaidSum) . " &euro;</td></tr>";
			echo "</table>";
		?>		
	</div>
</div>
