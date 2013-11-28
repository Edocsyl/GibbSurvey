<?php

class ml_config{
	
	private $_cg_global = null;
	
	public function __construct($cg_global){
		$this->_cg_global = $cg_global;

	}
	
	public function getTemplatePath(){
		return $this->_cg_global['corepath'];
	}
	
	public function getCssPath(){
		return $this->getTemplatePath() . "css";
	}
	
	public function getJsPath(){
		return $this->getTemplatePath() . "js";
	}
	
	public function getImgPath(){
		return $this->getTemplatePath() . "img";
	}
	
	public function getHtmlpath(){
		return $this->getTemplatePath() . "html/";
	}
	
	public function getHeaderPath(){
		return $this->getHtmlpath() . 'header.php';
	}
	
	public function getFooterPath(){
		return $this->getHtmlpath() . 'footer.php';
	}
	
	public function getPageTitle(){
		return $this->_cg_global['title'];
	}
	
}
?>