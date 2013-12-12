<?php
class ml_html{
	
	
	private $_ml_config = null;
	
	public function __construct($ml_config){
		$this->_ml_config = $ml_config;
	}
	
	public function printFooter(){
		
		$search = array(
				'|{js_path}|',
				'|{copyright}|'
		);
		
		$replace = array(
				$this->_ml_config->getJsPath(),
				$this->_ml_config->getCopyRight()
		);
		
		$page = file_get_contents($this->_ml_config->getFooterPath());
		
		echo preg_replace($search, $replace, $page);
	}
	
	public function printHeader(){
	
		$search = array(
				'|{title}|',
				'|{css_path}|',
				'|{js_path}|'
		);
	
		$replace = array(
				$this->_ml_config->getPageTitle(),
				$this->_ml_config->getCssPath(),
				$this->_ml_config->getJsPath()
				
		);
	
		$page = file_get_contents($this->_ml_config->getHeaderPath());
	
		echo preg_replace($search, $replace, $page);
	}
	
	public function printNavigation($site){
		
		/*
		 * <li class=""><a href="{base_path}/">Home</a></li>
	          <li class=""><a href="{base_path}/about">&Uuml;ber uns</a></li>
	          <li class=""><a href="{base_path}/registrieren">Registrieren</a></li>
	          <li class=""><a href="{base_path}/login">Login</a></li>
		 */
		
		
		$search = array(
				'|{navigation}|',
				'|{title}|'
		);
		
		$replace = array(
				$navigation,
				$this->_ml_config->getPageTitle()
		
		);
		
		$page = file_get_contents($this->_ml_config->getHeaderPath());
		
		echo preg_replace($search, $replace, $page);
	}
	
	public function printIndex(){
		
		//Header 
		
		$this->printHeader();
		
		//Navigation
		$this->printNavigation('index');
		
		
		
		//Footer
		
		$this->printFooter();
		
		
		
	}
	
	/*
	public function printAbout(){
	
	$pages = array(
				$this->_ml_config->getHeaderPath(),
				$this->_ml_config->getNavigationPath(),
				$this->_ml_config->getHtmlpath() . "index.php",
				$this->_ml_config->getFooterPath()
	
		);
	
		$search = array(
				
				'|{title}|',
				'|{base_path}|',
				'|{css_path}|',
				'|{js_path}|'
		);
	
		$replace = array(
				
				$this->_ml_config->getPageTitle(), 
				$this->_ml_config->getBasePath(), 
				$this->_ml_config->getCssPath(),
				$this->_ml_config->getJsPath()
		);
	
	
	
		foreach ($pages as $page){
			$page = file_get_contents($page);
			echo preg_replace($search, $replace, $page);
		}
		$pages = array(
				$this->_ml_config->getHeaderPath(),
				$this->_ml_config->getHtmlpath() . "about.php",
				$this->_ml_config->getFooterPath()
	
		);
	
		$search = array(
	
				// Variables
				'|{title}|',
				
				'|{path}|',
	
				// Paths
				'|{css_path}|',
				'|{js_path}|'
		);
	
		$replace = array($this->_ml_config->getPageTitle(), $this->_ml_config->getBasePath() , $this->_ml_config->getCssPath(), $this->_ml_config->getJsPath());
	
	
	
		foreach ($pages as $page){
			$page = file_get_contents($page);
			echo preg_replace($search, $replace, $page);
		}
	
	}*/
}