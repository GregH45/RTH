<?php


namespace App\Controller;


use Core\Controller\Controller;



class PostController extends AppController{
	

	
	
	public function __construct(){
		
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Categorie');
		
	}
	
	public function index() {

		$this->render('post.index');
		
	}
	
	public function roadTrip() {

		$this->render('post.roadTrip');
		
	}
	
	public function experiences() {
		
		$posts = $this->Post->last();
		
		$categories = $this->Categorie->all();

		$countries = $this->Post->getCountriesByContinent('Europe');		
		

		$this->render('post.experiences',compact('posts','categories', 'countries'));
		
	}
	
	public function categorie() {
		
		$categorie = $this->Categorie->find($_GET['id']);
		
		if($categorie === false)
		{
			$this->notrFound();
		}
		
		
		$article = $this->Post->lastByCategorie($_GET['id']);
		
		$categories = $this->Categorie->all();
		
		$this->render('post.categorie',compact('article','categories', 'categorie'));
	
	}
	
	
	public function show () {
	

		$article = $this->Post->findWithCategorie($_GET['id']);
		$this->render('post.show', compact('article'));
		
	}

	/*public function getCountriesByContinent($continent){
		return $db->prepare('SELECT Name
						FROM country c, encompasses e 
						WHERE c.Code = e.Country AND e.Continent = ?',[$continent], null, true);
	
	}*/





}