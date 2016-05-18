<?php


namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use Core\Controller\Controller;



class PostController extends AppController{


	public function __construct(){

		parent::__construct();
		$this->loadModel('Experience');

	}


	public function index(){

		if ($_SESSION["admin"] == 1)
		{
			$experiences = $this->Experience->all();

			$this->render('admin.post.index', compact('experiences'));
		}
		else
			header('Location: index.php');

	}


	public function delete()
	{

		if(!empty($_POST))
		{
			$result = $this->Experience->delete($_POST['id']);

			return $this->index();

		}

	}


	public function accepter()
	{
		if(!empty($_POST))
		{
			$val = $this->Experience->validerExp($_POST['id']);
			header('Location: index.php?p=admin.post.index');
		}
	}

}