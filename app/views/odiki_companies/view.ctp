<!-- file /app/views/odiki_companies/view.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
?>
<?php $this->set("title", $company['OdikiCompany']['description']); ?>
<div class="post">
	<div class="post_title"><h2><?php echo $company['OdikiCompany']['description']; ?></h2></div>
	<div class="post_body">
		
		<?php
			echo "<p>Τηλέφωνο: " . $company['OdikiCompany']['telephone'] . "</p>";
			echo "<br />" . $html->link("Διόρθωση στοιχείων εταιρίας", "/OdikiCompanies/edit/" . $company['OdikiCompany']['id']);
			echo "<br />" . $html->link("Στατιστικά Συμβολαίων", "/OdikiContracts/statistics/". $company['OdikiCompany']['id']);
			echo "<br />" . $html->link("Όλα τα συμβόλαια", "/Vehicles/getFromOdikiCompanyId/" . $company['OdikiCompany']['id']);
		?>		
	</div>
</div>
