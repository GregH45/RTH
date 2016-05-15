<?php



namespace App\Controller;

use Core\HTML\BootstrapForm;
use  Core\Auth\DBAuth;
use \App;
	
class UsersController extends AppController{
	
	
	public function __construct(){	
		parent::__construct();
		$this->loadModel('User');		
	}

	public function login(){
		
		$errors = false;

		if(!empty($_POST))
		{
			if($this->User->login($_POST['username'], $_POST['password'])){
				header('Location: index.php');
			}
			else{	
				$errors = true;
			}
		}
			
		$form = new  BootstrapForm($_POST);
		$this->render('user.login', compact('form','errors'));
		
		
	}
	
	public function logout(){
		
		$userName = $this->User->getUsername();
			if($userName != false){
				$this->User->logout();
			}
		header('Location: index.php');
	}
	
	
	public function getUsername(){
		
		$userName = $this->User->getUsername();
		
		if($userName != false){
			return $userName;
		} else {
			return 'Login';
		}	
		
	}
	
	
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
	
	public function pagePerso(){

		$experiences = $this->User->showExperiences();
		$this->render('user.pagePerso', compact('experiences'));
	}

	public function newExperience(){
		
	$errors = 0;

		if(!empty($_POST))
		{
			$errors = $this->User->newExperience($_POST['titre'], $_POST['description'], $_POST['date'], $_POST['plus1'], $_POST['plus2'], $_POST['plus3'], $_POST['moins1'], $_POST['moins2'], $_POST['moins3']);
			
			if($errors==0){
				header('Location: index.php?p=users.pagePerso');
			} else if($errors==1){
				$errors = "Veuillez remplir tous les champs";
			} 
		}

		$form = new BootstrapForm($_POST);
		$this->render('user.newExperience', compact('form', 'errors'));	

	}
}
	
	
	
