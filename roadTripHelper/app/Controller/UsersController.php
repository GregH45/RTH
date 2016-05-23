<?php



namespace App\Controller;

use Core\HTML\BootstrapForm;
use  Core\Auth\DBAuth;
use \App;

class UsersController extends AppController{


	public function __construct(){
		parent::__construct();
		$this->loadModel('User');
		$this->loadModel('Continent');
		$this->loadModel('Country');
		$this->loadModel('City');
	}

	//Connexion de l'utilisateur
	public function login(){

		$errors = false;

		if(!empty($_POST))
		{
			if($this->User->login($_POST['username'], $_POST['password']))
			{
					header('Location: index.php');
			}
			else{
				$errors = true;
			}
		}

		$form = new  BootstrapForm($_POST);
		$this->render('user.login', compact('form','errors'));


	}

	//Déconnexion
	public function logout(){

		$userName = $this->User->getUsername();
			if($userName != false){
				$this->User->logout();
				$_SESSION["admin"] = 0;
			}
		header('Location: index.php');
	}

	//Récupération du nom de l'utilisateur courant
	public function getUsername(){

		$userName = $this->User->getUsername();

		if($userName != false){
			return $userName;
		} else {
			return 'Login';
		}

	}

	//Création d'un nouveau compte et gestion erreur de saisie formulaire
	public function newAccount(){

		$errors = 0;

		if(!empty($_POST))
		{
			$errors = $this->User->newAccount($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password']);

			if($errors==0){
				header('Location: index.php?p=users.pagePerso');
			} else if($errors==1){
				$errors = "Veuillez remplir tous les champs";
			} else if($errors==2){
				$errors = "Username \"".$_POST['username']."\" déjà utilisé";
			} else if($errors==3){
				$errors = "Veuillez saisir une adresse mail valide";
			} else {
				$errors = "Informations erronées";
			}
		}

		$form = new BootstrapForm($_POST);
		$this->render('user.newAccount', compact('form','errors'));


	}

	//Page perso de l'utilisateur
	public function pagePerso(){

		$experiences = $this->User->showExperiences();
		$this->render('user.pagePerso', compact('experiences'));
	}

	//Ajout d'une nouvelle experiences
	public function newExperience(){
		
	$errors = 0;

		if(!empty($_POST))
		{
			/* Gestion des destinations saisies dans les select dynamiques */
			$villes = explode(" - ", $_POST['listeVilles']);
			$i = 0;
			$destination = array();

			foreach ($villes as $ville){

				$codeCountry = $this->City->getCodePaysByCity($ville);
				$continent = $this->Country->getContinent($codeCountry[0]->Country);
				$country = $this->Country->getNameByCode($codeCountry[0]->Country);
				$continent = $continent[0]->Name;
				$country = $country[0]->Name;

				$destination[$i][1] = utf8_encode($continent);
				$destination[$i][2] = utf8_encode($country);
				$destination[$i][3] = utf8_encode($ville);

				$i = $i+1;

			}

			$errors = $this->User->newExperience($_POST['titre'], $_POST['description'], $_POST['date_debut'], $_POST['date_fin'], $_POST['plus1'], $_POST['plus2'], $_POST['plus3'], $_POST['moins1'], $_POST['moins2'], $_POST['moins3'], $destination);
			
			if($errors==0){
				header('Location: index.php?p=users.pagePerso');
			} else if($errors==1){
				$errors = "Veuillez remplir tous les champs";
			} 
		}

	
		$form = new BootstrapForm($_POST);
		$this->render('user.newExperience', compact('errors', 'form'));

	}

	//Gestion des select dynamiques vue des experiences
	public function selectDynamiques(){

		if(isset($_GET['pays'])){
			
			$codePays = $this->Country->getCodeByName($_GET['pays']);
			$cits = $this->City->getCitiesByCountry($codePays[0]->Code);
			$cities = array();
			$i = 0;
			  foreach ($cits as $cit){
				$cities[$i][] = utf8_encode($cit->Name);
				$i = $i+1;
			  }

			echo json_encode($cities);

		}elseif(isset($_GET['continent'])) {

			$counts = $this->Country->getCountriesByContinent($_GET['continent']);
			$countries = array();
			$i = 0;
			  foreach ($counts as $count){
				$countries[$i][] = utf8_encode($count->Name);
				$i = $i+1;
			  }

			echo json_encode($countries);

		}else{


			$conts = $this->Continent->all();

			$continents = array();
			$i = 0;
			  foreach ($conts as $cont){
				$continents[$i][] = utf8_encode($cont->Name);
				$i = $i+1;
			  }

			echo json_encode($continents);
		}

	}
}



