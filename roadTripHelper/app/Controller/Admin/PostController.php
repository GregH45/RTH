<?php


namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;
use Core\Controller\Controller;



class PostController extends AppController{


	public function __construct(){

		parent::__construct();
		$this->loadModel('Post');

	}


	public function index(){

		$post = $this->Post->getNonValideExp();

		$this->render('admin.post.index', compact('post'));

	}

	public function add(){

			if(!empty($_POST)){
				$result = $this->Post->create( [
						'titre' => $_POST['titre'],
						'contenu' => $_POST['contenu'],
						'categorie_id' => $_POST['categorie_id']
				]);

				if($result)
				{
					return $this->index();
				}


			}

	$this->loadModel('Categorie');
	$categories = $this->Categorie->extract('id', 'titre');

	$form = new  BootstrapForm($_POST);

	$this->render('admin.post.edit', compact('categories', 'form'));

	}

	public function delete()
	{

		if(!empty($_POST))
		{
			$result = $this->Post->delete($_POST['id']);

			return $this->index();

		}

	}

	public function edit(){



		if(!empty($_POST)){
			$result = $this->Post->update($_GET['id'], [
					'titre' => $_POST['titre'],
					'contenu' => $_POST['contenu'],
					'categorie_id' => $_POST['categorie_id'],

			]);

			if($result){

				return $this->index();
			}


		}

		$post = $this->Post->find($_GET['id']);
		$this->loadModel('Categorie');
		$categories =  $this->Categorie->extract('id', 'titre');

		$form = new  BootstrapForm($post);

		$this->render('admin.post.edit', compact('categories', 'form'));

	}

	public function accepter()
	{
		if(!empty($_POST))
		{
			//die(var_dump($_POST));
			$val = $this->Post->validerExp($_POST['id']);
			//$this->render('admin.post.index');
			header('Location: index.php?p=admin.post.index');
		}
	}

}