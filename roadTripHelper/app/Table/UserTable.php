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

	//Connexion de l'utilisateur
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

	//Déconnexion
	public function logout(){

		$_SESSION['auth'] = -1;
		return true;
	}

	//Renvoie true si un utilisateur est connecté
	public function logged(){  return isset($_SESSION['auth']);  }

	//Récupère l'id de l'utilisateur courant
	public function getUserId(){

		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}

	//Récupère le nom de l'utilisateur courant
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

	//Création d'un nouveau compte utilisateur dans la base de donnée
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
							  VALUES ('','".$username."','".$criptedPassword."','".$name."','".$lastname."','".$email.",0')",null,false);

			//Vérification de l'insertion du nouvel utilisateur
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

	//Récupération du détail des experiences
	public function showExperiences(){

		$userId = $this->getUserId();

		if($userId != false && $userId>0){

				$experiences = $this->query('SELECT *
						FROM experience
						LEFT JOIN user ON experience.id_user = user.id
						WHERE user.id = ?
						ORDER BY experience.date_debut DESC',[$userId], null, true);

				return $experiences;
		}

		return false;

	}

	//Création d'une nouvelle expériences
	public function newExperience($titre, $description, $date_debut, $date_fin, $plus1, $plus2, $plus3, $moins1, $moins2, $moins3, $listeDestinations){

		if($titre=="" || $description=="" || $date_debut=="jj/mm/aaaa" || $date_fin=="jj/mm/aaaa" ||$listeDestinations==""){
			return 1;
		}

			$userId = $this->getUserId();

			$this->query('INSERT INTO experience
						VALUES ("","'.$userId.'","'.$titre.'","'.$description.'","0","'.$plus1.';'.$plus2.';'.$plus3.'","'.$moins1.';'.$moins2.';'.$moins3.'","false","'.$date_debut.'","'.$date_fin.'")',null,false);

			$id_exp = $this->query('SELECT id FROM experience WHERE id_user = "'.$userId.'" AND titre="'.$titre.'"');
		
			$id_exp = $id_exp[0]->id;

			foreach ($listeDestinations as $destination) {
				
				$continent = $destination[1];
				$country = $destination[2];
				$city = $destination[3];

				$this->query('INSERT INTO villes_parcourues VALUES ("", "'.$id_exp.'", "'.$continent.'", "'.$country.'", "'.$city.'")');

			}	

		return 0;
	}

}