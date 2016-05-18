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
		// Continent sélectionné
		if(isset($_GET['id'])) {
			$countries = $this->Country->getCountriesByContinent($_GET['id']);
			$currentContinent = $_GET['id'];
			// A TESTER
			//si un filtre est sélectionné
			//$experiences = $this->Post->getExperiencesValidByContinent($_GET['id'], $_GET['filtre']);
			//sinon
			$experiences = $this->Post->getExperiencesValidByContinent($_GET['id']);
		}
		else {
			$countries = $this->Country->all();
			$currentContinent = 'Continent';	
			$experiences = $this->Post->getExperiencesValid();
		}
		// Pays sélectionné
		if(isset($_GET['code'])) {
			$cities = $this->City->getCitiesByCountry($_GET['code']);
			$currentCountry = $this->Country->getNameByCode($_GET['code']);
			$currentContinent = $this->Country->getContinent($_GET['code']);
			$countries = $this->Country->getCountriesByContinent($currentContinent[0]->Name);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;

			// A TESTER
			//si un filtre est sélectionné
			//$experiences = $this->Post->getExperiencesValidByCountry($_GET['code'], $_GET['filtre']);
			//sinon
			$experiences = $this->Post->getExperiencesValidByCountry($_GET['code']);
		}
		else {
			$currentCountry = 'Pays';
			$cities = $this->City->all();
		}

		// Ville sélectionnée
		if(isset($_GET['id2'])) {
			$currentCity = $_GET['id2'];
			$currentCountry = $this->City->getCodePaysByCity($_GET['id2']);
			$cities = $this->City->getCitiesByCountry($currentCountry[0]->Country);
			$currentContinent = $this->Country->getContinent($currentCountry[0]->Country);
			$currentCountry = $this->Country->getNameByCode($currentCountry[0]->Country);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;
			$countries = $this->Country->getCountriesByContinent($currentContinent);

			// A TESTER
			//si un filtre est sélectionné
			//$experiences = $this->Post->getExperiencesValidByCity($_GET['id2'], $_GET['filtre']);
			//sinon
			$experiences = $this->Post->getExperiencesValidByCity($_GET['id2'], '');

		}else{
			$currentCity = 'Villes';
		}

		$this->render('post.experiences',compact('categories', 'continents', 'countries', 'cities', 'experiences', 'currentContinent', 
			'currentCountry', 'currentCity'));

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

		$villes_parcourues = $this->Post->getVillesParcourues($_GET['id']);

		$experience = $this->Post->find($_GET['id']);
		$date_debut = $this->Post->getDateFormat($experience->date_debut);
		$date_fin = $this->Post->getDateFormat($experience->date_fin);
		$this->render('post.show', compact('experience', 'villes_parcourues', 'date_debut', 'date_fin'));

	}

	public function incrementeLike(){
		$this->Post->addLike($_GET['id']);
		header('location: ?p=post.experiences');
	}


}