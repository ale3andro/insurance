<!-- File: /app/views/images/add.ctp -->	
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => -1, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => -1) ); 
	$title = "Προσθήκη επισύναψης (" . $plate . ")";
	$this->set('title', $title);	
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			echo $form->create('Image', array('enctype' => 'multipart/form-data', 
										'url' => 'add/' . $vehicleId));
			echo "Επιλογή Αρχείου:";
			echo $form->file('file') . "Μέγιστο αρχείο:" . 
				(ini_get("upload_max_filesize")>ini_get("post_max_size")?ini_get("post_max_size"):ini_get("upload_max_filesize"));
			echo $form->input('description', array('label' => 'Περιγραφή:'));
			echo $form->end('Προσθήκη');			
		?>		
	</div>
</div>
