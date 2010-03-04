<!-- file /app/views/users/login.ctp -->
<?php 
	if (($session->read('user'))!=null)
		echo $this->element("header", array( "activeTab" => 6, "username" => $session->read('user')) ); 
	else
		echo $this->element("header", array( "activeTab" => 6) ); 
	$title = "Είσοδος στην εφαρμογή";
	$this->set("title", $title);
?>
<div class="post">
	<div class="post_title"><h2><?php echo $title; ?></h2></div>
	<div class="post_body">
		<?php
			if (!isset($username))
			{
				$session->flash('auth');
				echo $form->create('User', array('action' => 'login'));
				echo $form->input('username', array('label' => 'Όνομα Χρήστη: '));
				echo $form->input('password', array('label' => 'Κωδικός: '));
				echo $form->end('Login', array('label' => 'Είσοδος'));
			}
			else
				echo "Έχεις ήδη κάνει login " . $username . "<br />" . $html->link("Αποσύνδεση", "/users/logout");	
		?>		
	</div>
</div>
