<?php
namespace Core\Database;
use \PDO;

class MysqlDatabase extends Database{
	
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;
	
	public function __construct($db_name,$db_user = 'root',$db_pass = '', $db_host = 'localhost'){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}
	
	private function getPDO(){
		
		$pdo = new PDO('mysql:dbname=roadtriphelper;host=localhost;charset=utf8','root','');
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo = $pdo;
		
		return $pdo;
	}
	/*
	*
	*
	*
	*/
	public function query($statement,$class_name = null, $one = false){


		$req = $this->getPDO()->query($statement);
		//Si on a ce genre de requete, cela ne sert à rien d'aller plus loin,
		//le fetchall ou autre planterais
		if(
				strpos($statement, 'INSERT') === 0 ||
				strpos($statement, 'DELETE') === 0 ||
				strpos($statement, 'UPDATE') === 0
		){
			return $req;die(var_dump("ooooooooooo"));
		}
		//var_dump($statement);
		///die(var_dump(strpos($statement, 'UPDATE')));
		
		if($class_name === null)
		{
			$req->setFetchMode(PDO::FETCH_OBJ);

		}else{
			
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
		}
		
		
		if($one)
		{
			$datas = $req->fetch();
		}
		else{
			$datas = $req->fetchAll();
		}
		
		return $datas;
	}
	
	public function prepare($statement, $attributes, $class_name = null,$one = false)
	{
		$req = $this->getPDO()->prepare($statement);
		
		$res = $req->execute($attributes);
		
		//Si on a ce genre de requete, cela ne sert à rien d'aller plus loin,
		//le fetchall ou autre planterais		
		if(
			strpos($statement, 'INSERT') === 0 ||	
			strpos($statement, 'DELETE') === 0 ||
			strpos($statement, 'UPDATE') === 0 
		){
			return $res;			
		}
		
		if($class_name === null)
		{
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
		}
		
		if($one)
		{
			$datas = $req->fetch();
		}
		else{
			$datas = $req->fetchAll();
		}

		return $datas;
	}
	
	public function lastInsertId(){
		
		return $this->getPDO()->lastInsertId();
		
	}
	
	
	
	

}