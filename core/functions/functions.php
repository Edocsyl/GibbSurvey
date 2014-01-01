<?php


class Functions extends Database {
	
	public function logoutUser(){
		
		//session_unset();
		$this->log($_SESSION['userid'], "logout");
		session_destroy();
		$this->alertSuccess("Erfolgreich ausgeloggt.");
		header("Location: " . $this->_config['basepath']);
		exit();
		
		
	}
	
	public function isLoggedIn(){
		if($_SESSION['userid'] == null){
			return false;
		} else {
			return $_SESSION['userid'];
		}
	}
	
	public function alertSuccess($msg){
		echo '<div class="alert alert-success">'.$msg.'</div>';
	}
	
	public function alertError($ms){
		echo '<div class="alert alert-error">'.$msg.'</div>';
	}
	
}

?>