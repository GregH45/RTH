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
	
	public function logged(){  return isset($_SESSION['auth']);  }
	
	
	public function newAccount($name, $lastname, $username, $email, $password){
		
		
		$criptedPassword = sha1($password);
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)!== false) {
			
			$this->db->query("INSERT INTO user
							  VALUES ('','".$username."','".$criptedPassword."','".$name."','".$lastname."','".$email."')",null,false);
			
			if($this->login($username, $password)){
				return true;
			}			
		}
		
			return false;
		
		
	}
	
	
}