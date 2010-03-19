<?php
class AppController extends Controller {
	
	var $components = array('Auth');
	var $helper = array('Session');
	
	function beforeFilter() 
	{ 
		if (ENABLE_USERS==1)
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
		
			if ($this->Auth->user())
			{	
				$this->set("username", $this->Auth->user('username'));
				$this->Session->write('user', $this->Auth->user('username'));
			}
		}
		else
		{
			$this->Auth->allow();
		}
	}	
	
	function checkDates($from, $to=null)
	{
		if ($to!=null)
		{
			if ( (!checkdate($from['month'], $from['day'], $from['year']))
					|| (!checkdate($to['month'], $to['day'], $to['year'])) )
				return -1; // valid dates check
		
			$fromD = $from['year'] . "-" . $from['month'] . "-" . $from['day'];
			$toD = $to['year'] . "-" . $to['month'] . "-" . $to['day'];
										
			if ($fromD>=$toD)
				return -2; // to after from check
		}
		else
		{
			if (!checkdate($from))
				return -1;
		}
	}
	
	/*
	 * 	Αν η ημορομηνία δεν είναι έγκυρη επιστρέφει την προηγούμενη έγκυρη ημερομηνία
	 */
	function fixDate($date) 
	{
		while (!checkdate($date["month"], $date["day"], $date["year"]))
			$date['day']--;
			
		return $date;			
	}

	function makeEnglish($string)
	{
		$search  = array('Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν',
							'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω');
		$replace = array('A', 'B', 'GK', 'D', 'E', 'Z', 'H', 'TH', 'I', 'K', 'L', 'M', 'N',
							'KS', 'O', 'P', 'R', 'S', 'T', 'Y', 'F', 'X', 'PS', 'O');
		return str_replace($search, $replace, $string);
	}
}
?>
