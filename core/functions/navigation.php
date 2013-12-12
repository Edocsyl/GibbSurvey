<?php
class Navigation {
	
	private $_config = null;
	private $_page = null;
	private $_param1 = null;
	private $_param2 = null;
	
	public function __construct($config, $page = null, $param1 = null, $param2 = null){
		$this->_config = $config;
		$this->_page = $page;
		$this->_param1 = $param1;
		$this->_param2 = $param2;
	}
	
	public function showPage(){
		
		require $this->_config['html'] . '/header.inc.php';
		
		switch ($this->_page){
			case null:
				$this->printIndex();
				break;
			case 'about':
				$this->printAbout();
				break;
			case 'login':
				$this->printLogin();
				break;
			case 'registrieren':
				$this->printRegistrieren();
				break;
			default:
				break;
		}
		
		require $this->_config['html'] . '/footer.inc.php';
	}
	
	
	public function printIndex(){
		
		require $this->_config['sites'] . '/home.php';
		
	}
	
	public function printAbout(){
	
		require $this->_config['sites'] . '/about.php';
	
	}
	
	public function printLogin(){
	
		require $this->_config['sites'] . '/login.php';
	
	}
	
	public function printRegistrieren(){
	
		require $this->_config['sites'] . '/registrieren.php';
	
	}
	
	
}

?>