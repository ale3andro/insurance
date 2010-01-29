<?php
	class UsersController extends AppController 
	{
		var $name = 'Users';    
		var $components = array('Auth'); // Not necessary if declared in your app controller
 
		function login() 
		{

		}

		function logout() 
		{
			$this->Session->write('user', null);
			$this->redirect($this->Auth->logout());
		}
	}
?>
