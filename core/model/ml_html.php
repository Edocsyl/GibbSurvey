<?php
class ml_html{
	
	
	private $_ml_config = null;
	
	public function __construct($ml_config){
		$this->_ml_config = $ml_config;
	}
	
	public function printIndex(){
		
		
		$pages = array(
				$this->_ml_config->getHeaderPath(),
				$this->_ml_config->getHtmlpath() . "index.php",
				$this->_ml_config->getFooterPath()
				
		);
		
		$search = array(
				
				// Variables
				'|{title}|', 
		
				// Paths	
				'|{css_path}|', 	
				'|{js_path}|'
		);
		
		$replace = array($this->_ml_config->getPageTitle(), $this->_ml_config->getCssPath(), $this->_ml_config->getJsPath());
		

		
		foreach ($pages as $page){
			$page = file_get_contents($page);
			echo preg_replace($search, $replace, $page);
		}
		


	}
}