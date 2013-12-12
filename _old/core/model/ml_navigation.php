<?php
class ml_navigation {
	
	private $_ml_html = null;
	private $_page = null;
	private $_param1 = null;
	private $_param2 = null;
	
	public function __construct($ml_html, $page = null, $param1 = null, $param2 = null){
		$this->_ml_html = $ml_html;
		$this->_page = $page;
		$this->_param1 = $param1;
		$this->_param2 = $param2;
	}
	
	public function showPage(){
		switch ($this->_page){
			case null:
				$this->_ml_html->printIndex();
				break;
			case 'about':
				$this->_ml_html->printAbout();
				break;
			case 'login':
				$this->_ml_html->printLogin();
				break;
			case 'registrieren':
				$this->_ml_html->printRegistrieren();
				break;
			default:
				break;
		}
	}
	
	
}

?>