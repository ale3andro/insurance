<!-- File: /app/views/odiki_contracts/add.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
	
	$title = "Προσθήκη Συμβολαίου Οδικής Βοήθειας (" . $vehicle['Vehicle']['plate'] . ")";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			echo $form->create('OdikiContract', array('url' => 'add/' . $vehicleId));
			echo $form->input('from', array('label' => 'Έναρξη Ασφάλειας:'));
			echo $form->input('to', array('label' => 'Λήξη Ασφάλειας:'));
			echo $form->input('amount', array('label' => 'Ποσό Ασφάλιστρων:'));
			echo "Ασφαλιστική Εταιρία:" . $odikiCompaniesSelect;
			echo $form->input('contract_number', array('label' => 'Αριθμός συμβολαίου:'));
			echo $form->end('Προσθήκη');
			echo "<br />* Για υποδιαστολή στο πεδίο Ποσό Ασφαλίστρων χρησιμοποιήστε τελεία (.)";
		?>		
	</div>
</div>
