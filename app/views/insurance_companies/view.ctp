<!-- file /app/views/insurance_companies/view.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 1) ); 
?>
<?php $this->set("title", $company['InsuranceCompany']['description']); ?>
<div class="post">
	<div class="post_title"><h2><?php echo $company['InsuranceCompany']['description']; ?></h2></div>
	<div class="post_body">
		
		<?php
			echo "<p>Τηλέφωνο: " . $company['InsuranceCompany']['telephone'] . "</p>";
			echo "<br />" . $html->link("Διόρθωση στοιχείων εταιρίας", "/InsuranceCompanies/edit/" .  $company['InsuranceCompany']['id']);
			echo "<br />" . $html->link("Στατιστικά Συμβολαίων", "/InsuranceContracts/statistics/" . $company['InsuranceCompany']['id']);
			echo "<br />" . $html->link("Όλα τα συμβόλαια", "/vehicles/getFromInsuranceCompanyId/" .  $company['InsuranceCompany']['id']);
		?>		
	</div>
</div>
