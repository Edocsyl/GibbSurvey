<?php


class Database {
	
	public function pdo(){
		return new PDO('mysql:host=' . $this->_config['database']['host'] . ';dbname=' . $this->_config['database']['dbname'], $this->_config['database']['username'], $this->_config['database']['password']);
	}
	
	public function insertDbAndGetLast($query, $parameter){
		$pdo = $this->pdo();
		$stm = $pdo->prepare($query);
		foreach ($parameter as $p){
			$stm->bindParam($p[0], $p[1], $p[2]);
		}
		$stm->execute();
		return $pdo->lastInsertId();
	}
	
	public function insertDb($query, $parameter){
		$stm = $this->pdo()->prepare($query);
		foreach ($parameter as $p){
			$stm->bindParam($p[0], $p[1], $p[2]);
		}
		$stm->execute();
		return $stm;
	}

	public function getArrayAssoc($query, $parameter){
		$stm = $this->prep($query, $parameter);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getColumn($query, $parameter){
		$stm = $this->prep($query, $parameter);
		$stm->execute();
		return $stm->fetch(PDO::FETCH_ASSOC);
	}
	
	public function prep($query, $parameter){
		$stm = $this->pdo()->prepare($query);
		foreach ($parameter as $p){
			$stm->bindParam($p[0], $p[1], $p[2]);
		}
		return $stm;
	}
	
	
	
	//OLD

	
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