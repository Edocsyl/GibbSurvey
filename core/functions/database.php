<?php


class Database {
	
	private function pdo (){
		$db = new PDO('mysql:host=' . $this->_config['database']['host'] . ';dbname=' . $this->_config['database']['dbname'], $this->_config['database']['username'], $this->_config['database']['password']);
		return $db;
	}

	public function prep($query, $parameter){
		$stm = $this->pdo()->prepare($query);
		foreach ($parameter as $p){
			$stm->bindValue($p[0], $p[1], $p[2]);
		}
		return $stm;
	}
	
	public function fetch_assoc($query, $parameter){
		return $this->prep($query, $parameter)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	
	
	public function query($query = null){
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