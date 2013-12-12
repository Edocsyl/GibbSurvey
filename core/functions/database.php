<?php


class Database {
	
	private $config = array();

	public function __construct($config) {
		$this->config = $config;
	}

	private function pdo (){
		$db = new PDO('mysql:host=' . $this->config['host'] . ';dbname=' . $this->config['dbname'], $this->config['username'], $this->config['password']);
		return $db;
	}

	private function query($query = null){
		return $this->pdo()->query($query);
	}

	public function db_assoc($query = null){
		return $this->query($query)->fetch(PDO::FETCH_ASSOC);
	}

	public function db_num($query = null){
		return $this->query($query)->fetch(PDO::FETCH_NUM);
	}

	public function get_array_assoc($query = null){
		return $this->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}

	public function get_array_num($query = null){
		return $this->query($query)->fetchAll(PDO::FETCH_NUM);
	}

	public function get_column($query = null){
		return $this->query($query)->fetchColumn();
	}

	public function get_query_count($query = null){
		return $this->query($query)->rowCount();
	}

	public function get_query_count_return_last($query = null){
		$pdo = $this->pdo();
		$query = $pdo->prepare($query);
		$query->execute();
			
		return $pdo->lastInsertId();
	}

	public function get_last_id(){
		return $this->pdo()->lastInsertId();
	}

}


?>