<?php

namespace Core\Auth;

use Core\Database\Database;


Class DBAuth{
	
	private $db;
	
	public function __construct(Database $db){
		$this->db = $db;
	}
	
	
	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}
	
	
	/**
	 * @Param $username
	 * @Param $password
	 * @return boolean
	 */
	public function login($username, $password){
		
		$user = $this->db->prepare('SELECT *
									FROM user
									WHERE username = ?
									',[$username], null, true);
		if($user){
			if ($user->password === sha1($password)){
				$_SESSION['auth'] = $user->id;
				return true;
			}
		}
			return false;	
		
	}
	
	public function logout(){
		
		$_SESSION['auth'] = -1;
		return true;
	}
	
	public function logged(){  return isset($_SESSION['auth']);  }
	
	
	public function getUsername(){
		
			$userId = $this->getUserId();
		
			if($userId != false && $userId>0){
			
				$user = $this->db->prepare('SELECT *
						FROM user
						WHERE id = ?',[$userId], null, true);
		
				return $user->username;	
			}
				return false; 	
	}
	
	
	public function newAccount($name, $lastname, $username, $email, $password){
		
		if($name=="" || $lastname=="" || $username=="" || $password=="" || $email == ""){
			return 1;
		}
				
		$criptedPassword = sha1($password);
		
		$user = $this->db->prepare('SELECT *
					FROM user
					WHERE username = ?',[$username], null, true);
					
		if($user){
			return 2;
		} else if (filter_var($email, FILTER_VALIDATE_EMAIL)!== false) {
			
			$this->db->query("INSERT INTO user
							  VALUES ('','".$username."','".$criptedPassword."','".$name."','".$lastname."','".$email."')",null,false);
			
			if($this->login($username, $password)){
				return 0;
			}	
			
		}else{		
			return 3;
		}
		
	}
	
	
}