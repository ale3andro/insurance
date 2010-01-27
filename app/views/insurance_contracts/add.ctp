<!-- File: /app/views/insurance_contracts/add.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
?>
<div class="post">
	<div class="post_title"><h2>Προσθήκη Συμβολαίου Ασφάλειας</h2></div>
	<div class="post_body">
		<?php
			echo $form->create('InsuranceContract', array('url' => 'add/' . $vehicleId));
			echo $form->input('from', array('label' => 'Έναρξη Ασφάλειας:'));
			echo $form->input('to', array('label' => 'Λήξη Ασφάλειας:'));
			echo $form->input('amount', array('label' => 'Ποσό Ασφάλιστρων:'));
			echo "Ασφαλιστική Εταιρία:" . $insuranceCompaniesSelect;
			echo $form->end('Προσθήκη');
			echo "<br />* Για υποδιαστολή στο πεδίο Ποσό Ασφαλίστρων χρησιμοποιήστε τελεία (.)";
		?>		
	</div>
</div>
