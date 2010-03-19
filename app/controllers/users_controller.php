<?php
	class UsersController extends AppController 
	{
		var $name = 'Users';    
		 
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
