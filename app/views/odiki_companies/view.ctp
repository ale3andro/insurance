<!-- file /app/views/odiki_companies/view.ctp -->
<?php echo $this->element("header", array( "activeTab" => -1) ); ?>
<?php $this->set("title", "Συμβόλαια οδικής βοήθειας " . $company['OdikiCompany']['description']); ?>
<div class="post">
	<div class="post_title"><h2><?php echo $company['OdikiCompany']['description']; ?></h2></div>
	<div class="post_body">
		
		<?php
			echo "<p>Τηλέφωνο: " . $company['OdikiCompany']['telephone'] . "</p>";
			echo "<p>" . $html->link("Διόρθωση στοιχείων εταιρίας", "/OdikiCompanies/edit/" . $company['OdikiCompany']['id']) . "</p>";
			
			echo "<br /><br /><h2>Στατιστικά Συμβολαίων</h2>";
			//echo $this->element("tableStatistics", array ("contracts" => $contracts) );	
			echo "TODO";
			
			echo "<br /><br /><h2>Συμβόλαια</h2>";
			if ($vehicles!=null)
				echo $this->element("vehiclesList", array("vehicles" => $vehicles));
			else
				echo "Δεν υπάρχουν συμβόλαια με αυτή την εταιρία";
				
		?>		
	</div>
</div>
