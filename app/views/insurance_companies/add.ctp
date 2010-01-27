<!-- file /app/views/insurance_companies/add.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
?>
<div class="post">
	<div class="post_title"><h2>Προσθήκη Ασφαλιστικής Εταιρίας</h2></div>
	<div class="post_body">
		<?php
			echo $form->create('InsuranceCompany');
			echo $form->input('description', array('label' => 'Όνομα Eταιρίας:'));
			echo $form->input('telephone', array('label' => 'Τηλέφωνο:'));
			echo $form->end('Προσθήκη');
		?>		
	</div>
</div>
