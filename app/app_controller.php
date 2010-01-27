<?php
class AppController extends Controller {
	
	var $components = array('Auth');
	var $helper = array('Session');
	
	function beforeFilter() 
	{ 
		Security::setHash('md5');
		// Authenticate
		
		$this->Auth->deny();
		$this->Auth->allow('display'); // Allow static pages to be rendered for not authenticated users
		
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'vehicles', 'action' => 'index');
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home');
		
		$this->Auth->authError = 'Παρακαλώ δώστε τα στοιχεία σας ...';
		$this->Auth->loginError = 'Λάθος συνδυσμός ονόματος χρήστη / κωδικού πρόσβασης.';
	}	
}
?>
