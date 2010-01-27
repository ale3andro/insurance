<!-- file /app/views/insurance_companies/edit.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
?>
<div class="post">
	<div class="post_title"><h2>Ενημέρωση Στοιχείων Ασφαλιστικής Εταιρίας</h2></div>
	<div class="post_body">
		<?php
			echo $form->create('InsuranceCompany', array('action' => 'edit'));
			echo $form->input('description', array('label' => 'Όνομα Eταιρίας:'));
			echo $form->input('telephone', array('label' => 'Τηλέφωνο:'));
			echo $form->end('Διόρθωση');
		?>		
	</div>
</div>
