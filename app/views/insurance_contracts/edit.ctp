<!-- File: /app/views/insurance_contracts/edit.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) );
	$title = "Διόρθωση Στοιχείων Συμβολαίου (" . $vehicle['Vehicle']['plate'] . ")";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title">
		<h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			echo $form->create('InsuranceContract', array('action' => 'edit'));
			
			echo "<h3>Συμβόλαιο Ασφάλειας</h3>";
			echo $form->input('from', array('label' => 'Έναρξη Ασφάλειας:'));
			echo $form->input('to', array('label' => 'Λήξη Ασφάλειας:'));
			echo $form->input('amount', array('label' => 'Ποσό Ασφάλιστρων:'));
			echo "Ασφαλιστική Εταιρία:" . $insuranceCompaniesSelect;
			echo $form->input('contract_number', array('label' => 'Αριθμός Συμβολαίου:'));
			echo $form->end('Διόρθωση');
			echo "<br />* Για υποδιαστολή στο πεδίο Ποσό Ασφαλίστρων χρησιμοποιήστε τελεία (.)";
		?>		
	</div>
</div>
