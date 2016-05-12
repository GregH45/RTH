<?php


namespace App\Controller;


use Core\Controller\Controller;



class PostController extends AppController{
	
	
	public function __construct(){
		
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Categorie');
		$this->loadModel('Continent');
		$this->loadModel('Country');
		$this->loadModel('City');
		
	}
	
	public function index() {

		$this->render('post.index');
		
	}
	
	public function roadTrip() {

		$this->render('post.roadTrip');
		
	}
	
	public function experiences() {		
		$continents = $this->Continent->all();

		$posts = $this->Post->last();
		
		$categories = $this->Categorie->all();

		if(isset($_GET['id'])) {
			$countries = $this->Country->getCountriesByContinent($_GET['id']);	
		}
		else {
			$countries = $this->Country->all();
		}
		if(isset($_GET['code'])) {
			$cities = $this->City->getCitiesByCountry($_GET['code']);
		}
		else {
			$cities = $this->City->all();
		}
		

		$this->render('post.experiences',compact('posts','categories', 'continents', 'countries', 'cities'));
		
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


}