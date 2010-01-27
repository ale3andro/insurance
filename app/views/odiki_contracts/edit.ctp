<!-- File: /app/views/odiki_contracts/edit.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
?>
<div class="post">
	<div class="post_title">
		<h2>Διόρθωση Στοιχείων Συμβολαίου</h2></div>
	<div class="post_body">
		<?php
			echo $form->create('OdikiContract', array('action' => 'edit'));
			
			echo "<h3>Συμβόλαιο Οδικής Βοήθειας</h3>";
			echo $form->input('from', array('label' => 'Έναρξη Ασφάλειας:'));
			echo $form->input('to', array('label' => 'Λήξη Ασφάλειας:'));
			echo $form->input('amount', array('label' => 'Ποσό Ασφάλιστρων:'));
			echo "Ασφαλιστική Εταιρία:" . $odikiCompaniesSelect;		
			echo $form->end('Διόρθωση');
			echo "<br />* Για υποδιαστολή στο πεδίο Ποσό Ασφαλίστρων χρησιμοποιήστε τελεία (.)";
		?>		
	</div>
</div>
