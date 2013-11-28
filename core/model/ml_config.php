<?php

class ml_config{
	
	private $_basepath = null;
	
	public function __construct($basepath){
		$this->_basepath = $basepath;

	}
	
	public function getTemplatePath(){
		return "core/template/";
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
	
}
?>