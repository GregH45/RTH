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
			$languages = $this->Country->getLanguages($_GET["code"]);
			$country = $this->Country->getCountryInfos($_GET["code"]);
			$capital = $this->Country->getCountryInfos($_GET["code"])[0]->Capital;
			$area = $this->Country->getCountryInfos($_GET["code"])[0]->Area;
			$pop = $this->Country->getCountryInfos($_GET["code"])[0]->Population;

			$politics = $this->Country->getPolitics($_GET["code"]);
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
			$muse = $this->Country->getMuseFromCity($_GET["id2"]);

			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByCity($_GET['id2'], $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByCity($_GET['id2']);
			}


		}else{
			$currentCity = 'Villes';
		}

		$this->render('post.experiences',compact('continents', 'countries', 'cities', 'experiences', 'currentContinent','muse',
			'currentCountry', 'currentCity', 'languages', 'politics', 'country', 'currentCountryCode','capital','area','pop'));
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