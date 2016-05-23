<?php


namespace App\Controller;


use Core\Controller\Controller;



class RoadtripController extends AppController{
	
	
	
	//On construit le controlleur : Chargement de(s) modèle(s) de base de données
	public function __construct(){
		parent::__construct();
 		$this->loadModel('City');	
 		$this->loadModel('Country');
 		$this->loadModel('Continent');
	}
	
	//Fonction de la vue mapItineraire
	public function mapitineraire() {
		//on charge la vue et on lui transmet le résultat de la reqûete ci-dessus
		$this->render('roadtrip.mapitineraire');
		
	}

	public function selectDynamiques(){

		if(isset($_GET['pays'])){
			
			$codePays = $this->Country->getCodeByName($_GET['pays']);
			$cits = $this->City->getCitiesByCountry($codePays[0]->Code);
			$cities = array();
			$i = 0;
			  foreach ($cits as $cit){
				$cities[$i][] = utf8_encode($cit->Name);
				$i = $i+1;
			  }

			echo json_encode($cities);

		}elseif(isset($_GET['continent'])) {

			$counts = $this->Country->getCountriesByContinent($_GET['continent']);
			$countries = array();
			$i = 0;
			  foreach ($counts as $count){
				$countries[$i][] = utf8_encode($count->Name);
				$i = $i+1;
			  }

			echo json_encode($countries);

		}else{


			$conts = $this->Continent->all();

			$continents = array();
			$i = 0;
			  foreach ($conts as $cont){
				$continents[$i][] = utf8_encode($cont->Name);
				$i = $i+1;
			  }

			echo json_encode($continents);
		}

	}


}