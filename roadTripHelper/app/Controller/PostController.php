<?php
namespace App\Controller;

use Core\Controller\Controller;

class PostController extends AppController{


	public function __construct(){

		parent::__construct();
		$this->loadModel('Experience');
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
		$languages = $this->Country->getLanguages('F');
		$politics = $this->Country->getPolitics('F');
		$country = $this->Country->getCountryInfos('F');
		$continents = $this->Continent->all();

		// Continent sélectionné
		if(isset($_GET['id'])) {
			$countries = $this->Country->getCountriesByContinent($_GET['id']);
			$currentContinent = $_GET['id'];

			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByContinent($_GET['id'], $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByContinent($_GET['id']);
			}
		}
		else {
			$countries = $this->Country->all();
			$currentContinent = 'Continent';
			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperienceOrderBy($_GET['filter']);
			}	
			else {
				$experiences = $this->Experience->getExperiencesValid();
			}
		}
		// Pays sélectionné
		if(isset($_GET['code'])) {
			$cities = $this->City->getCitiesByCountry($_GET['code']);
			$currentCountry = $this->Country->getNameByCode($_GET['code']);
			$currentCountryCode = $_GET['code'];
			$currentContinent = $this->Continent->getContinent($_GET['code']);
			$countries = $this->Country->getCountriesByContinent($currentContinent[0]->Name);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;

			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByCountry($currentCountry, $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByCountry($currentCountry);
			}
			
		}
		else {
			$currentCountry = 'Pays';
			$currentCountryCode = '';
			$cities = $this->City->all();
		}

		// Ville sélectionnée
		if(isset($_GET['id2'])) {
			$currentCity = $_GET['id2'];
			$currentCountry = $this->City->getCodePaysByCity($_GET['id2']);
			$cities = $this->City->getCitiesByCountry($currentCountry[0]->Country);
			$currentContinent = $this->Continent->getContinent($currentCountry[0]->Country);
			$currentCountry = $this->Country->getNameByCode($currentCountry[0]->Country);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;
			$countries = $this->Country->getCountriesByContinent($currentContinent);

			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByCity($_GET['id2'], $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByCity($_GET['id2']);
			}
			

		}else{
			$currentCity = 'Villes';
		}

		$this->render('post.experiences',compact('continents', 'countries', 'cities', 'experiences', 'currentContinent', 
			'currentCountry', 'currentCity', 'languages', 'politics', 'country', 'currentCountryCode'));

	}


	public function show () {

		$villes_parcourues = $this->Experience->getVillesParcourues($_GET['id']);

		$experience = $this->Experience->find($_GET['id']);
		$this->render('post.show', compact('experience', 'villes_parcourues'));

	}

	public function incrementeLike(){
		$this->Experience->addLike($_GET['id']);
		header('location: ?p=post.experiences');
	}


}