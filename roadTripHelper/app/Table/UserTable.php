<?php

namespace App\Table;

use \Core\Table\Table;


class UserTable extends Table{

	protected $table = 'user';
	

	/**
	 * @Param $username
	 * @Param $password
	 * @return boolean
	 */
	public function login($username, $password){
		
		$user = $this->query('SELECT *
									FROM user
									WHERE username = ?
									',[$username], null, true);
		if($user){
			if ($user[0]->password === sha1($password)){
				$_SESSION['auth'] = $user[0]->id;
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
	
	public function getUserId(){
		
		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}
	
	public function getUsername(){
		
			$userId = $this->getUserId();
		
			if($userId != false && $userId>0){
			
				$user = $this->query('SELECT *
						FROM user
						WHERE id = ?',[$userId], null, true);

				return $user[0]->username;	
			}
				return false; 	
	}
	
	

	public function newAccount($name, $lastname, $username, $email, $password){
		
		if($name=="" || $lastname=="" || $username=="" || $password=="" || $email == ""){
			return 1;
		}
				
		$criptedPassword = sha1($password);
		
		$user = $this->query('SELECT *
					FROM user
					WHERE username = ?',[$username], null, true);
					
		if($user){
			return 2;
		} else if (filter_var($email, FILTER_VALIDATE_EMAIL)!== false) {
			
			$this->query("INSERT INTO user
							  VALUES ('','".$username."','".$criptedPassword."','".$name."','".$lastname."','".$email."')",null,false);
			
			if($this->login($username, $password)){
				return 0;
			}	
			
		}else{		
			return 3;
		}
		
	}

	public function showExperiences(){

		$userId = $this->getUserId();

		if($userId != false && $userId>0){
			
				$experiences = $this->query('SELECT *
						FROM experience
						LEFT JOIN user ON experience.id_user = user.id 
						WHERE user.id = ?
						ORDER BY experience.date DESC',[$userId], null, true);

				return $experiences;	
		}

		return false;

	}	

	public function newExperience($titre, $description, $date, $plus1, $plus2, $plus3, $moins1, $moins2, $moins3){
		
		if($titre=="" || $description=="" || $date=="jj/mm/aaaa"){
			return 1;
		}
				
			$userId = $this->getUserId();

			$this->query('INSERT INTO experience
						VALUES ("","'.$userId.'","'.$titre.'","'.$description.'","0","'.$plus1.';'.$plus2.';'.$plus3.'","'.$moins1.';'.$moins2.';'.$moins3.'","false","'.$date.'")',null,false);		
		return 0;
	}	

}