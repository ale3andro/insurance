<!-- file /app/views/odiki_companies/index.ctp -->
<?php echo $this->element("header", array( "activeTab" => 4 )); ?>
<div class="post">
	<div class="post_title"><h2>Συνεργαζόμενες Εταιρίες Οδικής Ασφάλειας</h2></div>
	<div class="post_body">
		<p>Συνεργαζόμαστε με τις παρακάτω εταιρίες:</p>
		<?php
			$i=0;
			echo "<ul>";
			foreach ($theFirms as $firm)
				echo "<li>" . $html->link($firm['OdikiCompany']['description'], 
							"/vehicles/getFromOdikiCompanyId/" . $firm['OdikiCompany']['id']) . " - " . 
							$html->link("Προβολή Στοιχείων Εταιρίας", 
							"/odikiCompanies/view/" . $firm['OdikiCompany']['id']) ."</li>";
			echo "</ul>";
			echo $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "<br />";
			echo $paginator->numbers();
			
			echo "<br /><br /><p>" . $html->link("Προσθήκη Εταιρίας Οδικής Ασφάλειας", "/odikiCompanies/add") . "</p>";
		?>		
	</div>
</div>
