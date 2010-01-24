<!-- file /app/views/insurance_companies/index.ctp -->
<?php echo $this->element("header", array( "activeTab" => 4 )); ?>
<div class="post">
	<div class="post_title"><h2>Συνεργαζόμενες Ασφαλιστικές Εταιρίες</h2></div>
	<div class="post_body">
		<p>Συνεργαζόμαστε με τις παρακάτω εταιρίες:</p>
		<?php
			if (count($theCompanies)!=0)
			{
				echo "<ul>";
				foreach ($theCompanies as $company)
					echo "<li>" .$company['InsuranceCompany']['description'] . ": " . $html->link("Συμβόλαια", 
							"/vehicles/getFromInsuranceCompanyId/" . $company['InsuranceCompany']['id']) . " - " . 
							$html->link("Προβολή Στοιχείων Εταιρίας", 
							"/insuranceCompanies/view/" . $company['InsuranceCompany']['id']) ."</li>";
				echo "</ul>";
			
				echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
				echo $paginator->numbers();
			}
			else
				echo "Δεν υπάρχουν καταχωρημένες εταιρίες Ασφάλειας";
			
			echo "<br /><br /><p>" . $html->link("Προσθήκη Ασφαλιστικής Εταιρίας", "/insuranceCompanies/add") . "</p>";
		?>		
	</div>
</div>
