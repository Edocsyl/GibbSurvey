<?php

/**
 * @author Kaj Bossard <kaj@edocsyl.ch>
 * @version 1.0
 * @category Database file
 * @copyright Copyright (c) 2014, gigaIT.net
 */

class Database {
	
	/**
	 * Initialises the PDO Connection
	 * @return PDO
	 */
	public function pdo(){
		try {
			return new PDO('mysql:host=' . $this->_config['database']['host'] . ';dbname=' . $this->_config['database']['dbname'], $this->_config['database']['username'], $this->_config['database']['password']);	
		} catch (PDOException $e){
			die("Error: " . $e);
		}
	}
	
	/**
	 * Insert a statement and returns the id
	 * @param string $query
	 * @param array $parameter
	 * @return string
	 */
	public function insertDbAndGetLast($query, $parameter){
		$pdo = $this->_pdo;
		$stm = $pdo->prepare($query);
		foreach ($parameter as $p){
			$stm->bindParam($p[0], $p[1], $p[2]);
		}
		$stm->execute();
		return $pdo->lastInsertId();
	}
	
	/**
	 * Insert a statement
	 * @param string $query
	 * @param array $parameter
	 * @return PDOStatement
	 */
	public function insertDb($query, $parameter){
		$stm = $this->_pdo->prepare($query);
		foreach ($parameter as $p){
			$stm->bindParam($p[0], $p[1], $p[2]);
		}
		$stm->execute();
		return $stm;
	}
	
	/**
	 * Executes a sql statement and returns an array
	 * @param string $query
	 * @param array $parameter
	 * @return multitype:
	 */
	public function getArrayAssoc($query, $parameter){
		$stm = $this->prep($query, $parameter);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Executes a sql statement and returns one row
	 * @param string $query
	 * @param array $parameter
	 * @return mixed
	 */
	public function getRow($query, $parameter){
		$stm = $this->prep($query, $parameter);
		$stm->execute();
		return $stm->fetch(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Executes a slq statement and returns one column
	 * @param string $query
	 * @param array $parameter
	 * @return string
	 */
	public function getColumn($query, $parameter){
		$stm = $this->prep($query, $parameter);
		$stm->execute();
		return $stm->fetchColumn();
	}
	
	/**
	 * Helper function to prepare sql statements
	 * @param string $query
	 * @param array $parameter
	 * @return PDOStatement
	 */
	public function prep($query, $parameter){
		$stm = $this->_pdo->prepare($query);
		foreach ($parameter as $p){
			$stm->bindParam($p[0], $p[1], $p[2]);
		}
		return $stm;
	}
	

}

?>