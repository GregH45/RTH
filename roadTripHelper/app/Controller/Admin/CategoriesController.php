<?php


namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use Core\Controller\Controller;



class CategoriesController extends AppController{


	public function __construct(){

		parent::__construct();
		$this->loadModel('Categorie');

	}


	public function index(){

		$items = $this->Categorie->all();

		$this->render('admin.categories.index', compact('items'));

	}

	public function add(){

		if(!empty($_POST)){
			$result = $this->Categorie->create( [
					'titre' => $_POST['titre']
			]);

				return $this->index();
		}

		$form = new  BootstrapForm($_POST);
		$this->render('admin.categories.edit', compact('form'));

	}

	public function delete()
	{

		if(!empty($_POST))
		{
			$result = $this->Categorie->delete($_POST['id']);

			return $this->index();

		}

	}

	public function edit(){



		if(!empty($_POST)){
			$result = $this->Post->Categorie($_GET['id'], [
					'titre' => $_POST['titre']
			]);

				return $this->index();

		}

		$Categorie = $this->Categorie->find($_GET['id']);

		$form = new  BootstrapForm($Categorie);

		$this->render('admin.categories.edit', compact('form'));

	}

}