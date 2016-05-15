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
				$this->isAdmin($username);
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

	public function isAdmin($username)
	{
		$user = $this->query('SELECT *
									FROM user
									WHERE username = ? and isAdmin = 1
									',[$username], null, true);
		if($user)
		{
			$_SESSION['admin'] = 1;
			return true;
		}
		return false;
	}


}