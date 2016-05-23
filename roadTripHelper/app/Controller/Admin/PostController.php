<?php


namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use Core\Controller\Controller;



class PostController extends AppController{


	public function __construct(){

		parent::__construct();
		$this->loadModel('Experience');

	}

	//redirige l'admin vers la page admin.post.index
	// si un utilisateur non admin essaye d'acceder la page, redirection vers index
	public function index(){

		if ($_SESSION["admin"] == 1)
		{
			$experiences = $this->Experience->all();

			$this->render('admin.post.index', compact('experiences'));
		}
		else
			header('Location: index.php');

	}

	//supprime une Experience
	public function delete()
	{

		if(!empty($_POST))
		{
			$result = $this->Experience->delete($_POST['id']);

			return $this->index();

		}

	}

	//accepte une expérience pour l'afficher sur le site
	public function accepter()
	{
		if(!empty($_POST))
		{
			$val = $this->Experience->validerExp($_POST['id']);
			header('Location: index.php?p=admin.post.index');
		}
	}

}