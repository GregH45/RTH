<?php



namespace App\Controller;

use Core\HTML\BootstrapForm;
use  Core\Auth\DBAuth;
use \App;
	
class UsersController extends AppController{
	
	
	public function login(){
		
		$errors = false;

		if(!empty($_POST))
		{
			$auth = new DBAuth(App::getInstance()->getDb());
			if($auth->login($_POST['username'], $_POST['password'])){
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
		
		$auth = new DBAuth(App::getInstance()->getDb());
		$userName = $auth->getUsername();
			if($userName != false){
				$auth->logout();
			}
		header('Location: index.php');
	}
	
	
	public function getUsername(){
		
		$auth = new DBAuth(App::getInstance()->getDb());
		$userName = $auth->getUsername();
		
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
			$auth = new DBAuth(App::getInstance()->getDb());
			$errors = $auth->newAccount($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password']);
			
			if($errors==0){
				header('Location: index.php?p=admin.post.index');
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
		
		$this->render('user.pagePerso');
	}
}
	
	
	
