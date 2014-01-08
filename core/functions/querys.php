<?php

/**
 * @author Kaj Bossard <kaj@edocsyl.ch>
 * @version 1.0
 * @category Querys file
 * @copyright Copyright (c) 2014, gigaIT.net
 */

class Querys extends Functions {

	
	/**
	 * Adds a survey
	 * @param int $user_id
	 * @param string $titel
	 * @param string $beschreibung
	 * @return string
	 */
	public function addSurvey($user_id, $titel, $beschreibung){
		return $this->insertDbAndGetLast("INSERT INTO umfragen (fk_user, titel, beschreibung) VALUES (:fk_user, :titel, :beschreibung)", array(
				 array(':fk_user', $user_id, PDO::PARAM_INT), array(':titel', $titel, PDO::PARAM_STR), array(':beschreibung', $beschreibung, PDO::PARAM_STR)
		));	
	}
	
	/**
	 * Adds a question to a survey
	 * @param int $survey_id
	 * @param string $question
	 */
	public function addQuestion($survey_id, $question){
		$this->insertDb("INSERT INTO fragen (fk_umfrage, frage) VALUES (:fk_umfrage, :question)", array(
			array(':fk_umfrage', $survey_id, PDO::PARAM_INT), array(':question', $question, PDO::PARAM_STR)	
		));
	}
	
	/**
	 * Adds a survey link
	 * @param int $survey_id
	 */
	public function addLink($survey_id){
		$this->insertDb("INSERT INTO links (fk_umfrage, hash) VALUES (:fk_umfrage, :hash)", array(
				array(':fk_umfrage', $survey_id, PDO::PARAM_STR), array(':hash', sha1($survey_id . date("d-m-Y H:i:s")), PDO::PARAM_STR)
		));
	}
	
	/**
	 * Add a result
	 * @param int $survey_id
	 * @param int $user_id
	 * @param int $question_id
	 * @param string $answer
	 */
	public function addResult($survey_id, $user_id, $question_id, $answer = null){
		$this->insertDb("INSERT INTO resultate (fk_umfrage, fk_frage, fk_user, antwort) VALUES (:survey_id, :question_id, :user_id, :answer)", array(
				array(':survey_id', $survey_id, PDO::PARAM_INT), array(':question_id', $question_id, PDO::PARAM_INT), array(':user_id', $user_id, PDO::PARAM_INT), array(':answer', $answer, PDO::PARAM_STR)
		));
	}
	
	/**
	 * Returns from user created surveys
	 * @param int $user_id
	 * @return Ambigous <multitype:, multitype:>
	 */
	public function getCreatedSurveysFromUser($user_id){
		 return $this->getArrayAssoc("SELECT a.id, a.titel, a.erstell_datum, l.hash FROM umfragen as a inner join links as l on a.id = l.fk_umfrage  WHERE `fk_user` =:user_id ORDER BY a.erstell_datum DESC", array(
		 		array(':user_id', $user_id, PDO::PARAM_INT)
		 ));
	}
	
	/**
	 * Returns participated surveys
	 * @param int $user_id
	 * @return Ambigous <multitype:, multitype:>
	 */
	public function getParticipatedSurveyFromUser($user_id){
		return $this->getArrayAssoc("SELECT DISTINCT r.fk_umfrage, u.titel, u.beschreibung, u.erstell_datum, l.hash FROM resultate AS r JOIN umfragen AS u ON r.fk_umfrage = u.id JOIN links AS l ON u.id = l.fk_umfrage WHERE r.fk_user =:user_id ORDER BY u.erstell_datum DESC", array(
				array(':user_id', $user_id, PDO::PARAM_INT)
		));
	}
	
	/**
	 * 
	 * @param int $question_id
	 * @return mixed
	 */
	public function getResultFromQuestionId($question_id){
		return $this->getRow("
		SELECT ( SELECT count( id ) FROM resultate WHERE fk_frage =:question_id AND antwort =0 ) AS '0', 
		( SELECT count( id ) FROM resultate WHERE fk_frage =:question_id AND antwort =25 ) AS '25', 
		( SELECT count( id ) FROM resultate WHERE fk_frage =:question_id AND antwort =75 ) AS '75', 
		( SELECT count( id ) FROM resultate WHERE fk_frage =:question_id AND antwort =100 ) AS '100', 
		( SELECT count( id ) FROM resultate WHERE fk_frage =:question_id AND antwort IS NULL ) AS 'Null'", array(
		array(':question_id', $question_id, PDO::PARAM_INT)));
	}
	
	/**
	 * Returns survey questions
	 * @param int $survey_id
	 * @return Ambigous <multitype:, multitype:>
	 */
	public function getQuestionBySurveyId($survey_id){
		return $this->getArrayAssoc("SELECT f.id, f.frage FROM umfragen AS u INNER JOIN fragen AS f ON u.id = f.fk_umfrage WHERE u.id =:survey_id", array(
				array(':survey_id', $survey_id, PDO::PARAM_INT)
		));
	}
	
	/**
	 * Returns survey questions
	 * @param string $hash
	 * @return Ambigous <multitype:, multitype:>
	 */
	public function getQuestionByHash($hash){
		return $this->getArrayAssoc("SELECT f.id, f.frage FROM umfragen AS u INNER JOIN fragen AS f ON u.id = f.fk_umfrage WHERE u.id = (SELECT u.id FROM umfragen AS u INNER JOIN links AS l ON u.id = l.fk_umfrage WHERE l.hash =:hash)", array(
				array(':hash', $hash, PDO::PARAM_STR)
		));
	}
	
	/**
	 * Returns survey information 
	 * @param string $hash
	 * @return mixed
	 */
	public function getSurveyByHash($hash){
		return $this->getRow("SELECT u.id, u.titel, u.beschreibung, u.erstell_datum, l.hash FROM umfragen AS u INNER JOIN links AS l ON u.id = l.fk_umfrage WHERE l.hash =:hash", array(
				array(':hash', $hash, PDO::PARAM_STR)
		));
	}
	
	/**
	 * Register a new user
	 * @param array $post
	 */
	public function registerUser($post){
		$password = sha1($post['password']);
		$password2 = sha1($post['password2']);
		$geburtstag = $post['tag'].'.'.$post['monat'].'.'.$post['jahr'];

		if($password == $password2 && !$this->emailExists($post['email'])){

			$insert = $this->insertDb("INSERT INTO users (name, email, password, geschlecht, geburtstag) VALUES (:name, :email, :pw, :geschlecht, :geburtstag)", array(
					array(':name', $post['name'], PDO::PARAM_STR), array(':email', $post['email'], PDO::PARAM_STR), array(':pw', $password, PDO::PARAM_STR), array(':geschlecht', $post['geschlecht'], PDO::PARAM_STR), array(':geburtstag', $geburtstag, PDO::PARAM_STR)
			));
				
			$this->alertSuccess("Erfolgreich registriert.</div>");
				
			header("Location: " . $this->_config['basepath']."/login");
		} else {
			$this->alertError("Bite &uuml;berpr&uuml;fen Sie ihre Angaben.");
		}
		
	}
	
	/**
	 * Log user activities
	 * @param int $userId
	 * @param string $log
	 */
	public function log($userId, $log){
		$this->insertDb("INSERT INTO log (fk_user, log) VALUES (:user_id, :log)", array(
				array(':user_id', $userId, PDO::PARAM_STR), array(':log', $log, PDO::PARAM_STR)
		));
	}
	
	/**
	 * Login a user
	 * @param array $post
	 */
	public function loginUser($post){
		$i = $this->getColumn("SELECT id FROM users WHERE email =:email AND password =:password", array(
			array(':email', $post['email'], PDO::PARAM_STR), array(':password', sha1($post['password']), PDO::PARAM_STR)	
		));
		
		if($i != null){
			$this->alertSuccess("Erfolgreich eingeloggt.");
			$_SESSION['userid'] = $i;
			$this->log($_SESSION['userid'], "login");
			header("Location: " . $this->_config['basepath']."/surveys");
		} else {
			$this->alertError("Bite &uuml;berpr&uuml;fen Sie ihre Angaben.");
		}
	}
	
	/**
	 * Get user data by id of the user
	 * @param int $user_id
	 * @return mixed
	 */
	public function getCurrentUser($user_id){
		return $this->getRow("SELECT * FROM users WHERE id =:user_id", array(
				array(':user_id', $user_id, PDO::PARAM_INT)
		));
	}
	
	/**
	 * Get user id by email adress
	 * @param string $email
	 * @return mixed
	 */
	public function getUserIdByEmail($email){
		return $this->getRow("SELECT id FROM users WHERE email =:email", array(
				array(':email', $email, PDO::PARAM_STR)
		));
	}
	
	/**
	 * Checks if email adress already exists
	 * @param string $email
	 * @return boolean
	 */
	public function emailExists($email){
		return $this->getColumn("SELECT id FROM users WHERE email =:email", array(
				array(':email', $email, PDO::PARAM_STR)
		));
	}
}