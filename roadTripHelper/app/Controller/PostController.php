<?php
namespace App\Controller;

use Core\Controller\Controller;

class PostController extends AppController{


	public function __construct(){

		//Chargement des modèles de table nécessaires
		parent::__construct();
		$this->loadModel('Experience');
		$this->loadModel('Continent');
		$this->loadModel('Country');
		$this->loadModel('City');
	}

	//Contrôle la vue de la page d'accueil 
	public function index() {
		$this->render('post.index');
	}

	//Contrôle la vue du roadTrip
	public function roadTrip() {
		$this->render('post.roadTrip');
	}

	//Contrôle la vue des experiences
	public function experiences() {

		$continents = $this->Continent->all();

		//Si un continent vient d'être selectionné
		if(isset($_GET['id'])) {

			//Récupération des pays par continent
			$countries = $this->Country->getCountriesByContinent($_GET['id']);
			//Sauvegarde du continent cliqué
			$currentContinent = $_GET['id'];

			//Gestion des filtres d'affichage des expériences validées par l'admin
			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByContinent($_GET['id'], $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByContinent($_GET['id']);
			}
		}
		//Sinon
		else {

			//Récupération de tous les pays
			$countries = $this->Country->all();
			//Réinitialisation du select des continents
			$currentContinent = 'Continent';

			//Gestion des filtres
			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperienceOrderBy($_GET['filter']);
			}	
			else {
				$experiences = $this->Experience->getExperiencesValid();
			}
		}


		//Si un pays vient d'être sélectionné
		if(isset($_GET['code'])) {
			//Récupération des infos sur le pays
			$languages = $this->Country->getLanguages($_GET["code"]);
			$country = $this->Country->getCountryInfos($_GET["code"]);
			$capital = $this->Country->getCountryInfos($_GET["code"])[0]->Capital;
			$area = $this->Country->getCountryInfos($_GET["code"])[0]->Area;
			$pop = $this->Country->getCountryInfos($_GET["code"])[0]->Population;
			$politics = $this->Country->getPolitics($_GET["code"]);

			//Récupération des villes en fonction du pays
			$cities = $this->City->getCitiesByCountry($_GET['code']);

			//Récupération du nom du pays
			$currentCountry = $this->Country->getNameByCode($_GET['code']);
			$currentCountryCode = $_GET['code'];

			//Récupération du nom du continent
			$currentContinent = $this->Continent->getContinent($_GET['code']);
			$currentContinent = $currentContinent[0]->Name;

			//Récupération de tout les pays en fonction du continent
			$countries = $this->Country->getCountriesByContinent($currentContinent);
			$currentCountry = $currentCountry[0]->Name;
			
			//Récupération des infos sur le pays pour la partie guide
			$languages = $this->Country->getLanguages($_GET['code']);
			$politics = $this->Country->getPolitics($_GET['code']);
			$infosCountry = $this->Country->getCountryInfos($_GET['code']);

			//Gestion des filtres
			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByCountry($currentCountry, $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByCountry($currentCountry);
			}
			
		}

		//Sinon 
		else {

			//Réinitialisation des pays 
			$currentCountry = 'Pays';
			$currentCountryCode = '';

			//Récupération de toutes les villes du monde ou du continent courrant 
			$cities = $this->City->all();
		}

		// Ville sélectionnée
		if(isset($_GET['id2'])) {


			$currentCity = $_GET['id2'];

			//Récupération du pays en fonction de la ville et des villes en fonction du pays
			$currentCountry = $this->City->getCodePaysByCity($_GET['id2']);
			$cities = $this->City->getCitiesByCountry($currentCountry[0]->Country);

			//Récupération du continent
			$currentContinent = $this->Continent->getContinent($currentCountry[0]->Country);
			$currentCountry = $this->Country->getNameByCode($currentCountry[0]->Country);
			$currentCountry = $currentCountry[0]->Name;
			$currentContinent = $currentContinent[0]->Name;

			//Récupération des musées
			$muse = $this->City->getMuseFromCity($_GET["id2"]);

			//Récupération des pays
			$countries = $this->Country->getCountriesByContinent($currentContinent);

			if(isset($_GET['filter'])) {
				$experiences = $this->Experience->getExperiencesValidByCity($_GET['id2'], $_GET['filter']);
			}
			else {
				$experiences = $this->Experience->getExperiencesValidByCity($_GET['id2']);
			}
			
		//Sinon on réinitialise select des villes
		}else{
			$currentCity = 'Villes';
		}

		//Envoi de toutes les informations à la vue des expériences
		$this->render('post.experiences',compact('continents', 'countries', 'cities', 'experiences', 'currentContinent','muse',
			'currentCountry', 'currentCity', 'languages', 'politics', 'country', 'currentCountryCode','capital','area','pop'));

	}


	//Contrôle de la vue des détails d'une expérience partagée
	public function show () {

		//Récupération des destinations de l'expérience
		$villes_parcourues = $this->Experience->getVillesParcourues($_GET['id']);
		//Récupération des informations sur l'expérience
		$experience = $this->Experience->find($_GET['id']);
		$this->render('post.show', compact('experience', 'villes_parcourues'));

	}

	//Contrôle d'incrémentation du like au clic sur le glyphicone coeur
	public function incrementeLike(){
		$this->Experience->addLike($_GET['id']);
		//Redirection vers la vue des experiences
		header('location: ?p=post.experiences');
	}


}