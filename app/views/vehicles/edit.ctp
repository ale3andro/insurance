<!-- File: /app/views/changes/edit.ctp -->	
<?php echo $this->element("header", array( "activeTab" => 3) ); ?>
<div class="post">
	<div class="post_title">
		<h2>Διόρθωση Στοιχείων Οχήματος</h2></div>
	<div class="post_body">
		<?php
			echo $form->create('Vehicle', array('action' => 'edit'));
			echo $form->input('first_name', array('label' => 'Όνομα:'));
			echo $form->input('last_name', array('label' => 'Επώνυμο:'));
			echo $form->input('father_name', array('label' => 'Όνομα Πατέρα:'));
			echo $form->input('plate', array('label' => 'Αριθμός Πινακίδας:'));
			echo $form->end('Διόρθωση');
		?>		
	</div>
</div>
