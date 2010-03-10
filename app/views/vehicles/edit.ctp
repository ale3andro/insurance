<!-- File: /app/views/changes/edit.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 3, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 3) ); 
?>
<div class="post">
	<div class="post_title">
		<h2>Διόρθωση Στοιχείων Οχήματος</h2></div>
	<div class="post_body">
		<?php
			echo $form->create('Vehicle', array('action' => 'edit', 'type' => 'file'));
			echo $form->input('first_name', array('label' => 'Όνομα:'));
			echo $form->input('last_name', array('label' => 'Επώνυμο:'));
			echo $form->input('father_name', array('label' => 'Όνομα Πατέρα:'));
			echo $form->input('plate', array('label' => 'Αριθμός Πινακίδας:'));
			echo $form->input('telephone', array('label' => 'Τηλ. Επικοινωνίας:'));
			echo $form->end('Διόρθωση');
		?>		
	</div>
</div>
