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
		$categories = $this->Categorie->all();

		if(isset($_GET['id'])) {

			$countries = $this->Country->getCountriesByContinent($_GET['id']);
			//$countries = $this->Country->all();
			$currentContinent = $_GET['id'];
		}
		else {
			$countries = $this->Country->all();
			$currentContinent = 'Continent';
		}

		if(isset($_GET['code'])) {
			$cities = $this->City->getCitiesByCountry($_GET['code']);
			$currentCountry = $this->Country->getNameByCode($_GET['code']);
			$currentContinent = $this->Country->getContinent($_GET['code']);
			$countries = $this->Country->getCountriesByContinent($currentContinent[0]->Name);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;
		}
		else {
			$currentCountry = 'Pays';
			$cities = $this->City->all();
		}

		if(isset($_GET['id2'])) {

			$currentCity = $_GET['id2'];
			$currentCountry = $this->City->getCodePaysByCity($_GET['id2']);
			$cities = $this->City->getCitiesByCountry($currentCountry[0]->Country);
			$currentContinent = $this->Country->getContinent($currentCountry[0]->Country);
			$currentCountry = $this->Country->getNameByCode($currentCountry[0]->Country);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;
			$countries = $this->Country->getCountriesByContinent($currentContinent);


		}else{
			$currentCity = 'Villes';
		}

		//$experiences = $this->Post->all();
		$experiences = $this->Post->getExperiencesValid();
		$villes_parcourues = $this->Post->getVillesParcourues();
		$this->render('post.experiences',compact('categories', 'continents', 'countries', 'cities', 'experiences', 'currentContinent', 
			'currentCountry', 'currentCity', 'villes_parcourues'));

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


		$experience = $this->Post->find($_GET['id']);
		$this->render('post.show', compact('experience'));

	}

	public function incrementeLike(){
		$this->Post->addLike($_GET['id']);
		header('location: http://localhost/RTH/roadTripHelper/public/index.php?p=post.experiences');
	}


}