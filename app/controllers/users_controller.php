<?php
	class UsersController extends AppController 
	{
		var $name = 'Users';    
		var $components = array('Auth'); // Not necessary if declared in your app controller
 
		function login() 
		{
			if ($this->Auth->user())
			{
				$this->set("username", $this->Auth->user('username'));
				$this->Session->write('user', $this->Auth->user('username'));
			}
		}

		function logout() 
		{
			$this->Session->write('user', null);
			$this->redirect($this->Auth->logout());
		}
	}
?>
