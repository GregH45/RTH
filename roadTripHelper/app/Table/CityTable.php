<?php
namespace App\Table;

use \Core\Table\Table;

class CityTable extends Table{

	protected $table = "city";

	/*
	Récupère les villes d'un pays
	*/
	public function getCitiesByCountry($country){
		return $this->query("SELECT ci.Name
						FROM country co, city ci
						WHERE co.Code = ci.Country AND ci.Country = ?",[$country], null, true);
	}

	/*
	Récupère le code d'un pays via une ville
	*/
	public function getCodePaysByCity($city){

		return $this->query("SELECT c.Country
				FROM city c
				WHERE c.Name = ?", [$city]);

	}

	/*
	Recupère les musées d'une ville en fonction de son nom
	*/
	public function getMuseFromCity($idcity)
	{
		$res = $this->query("SELECT distinct(m.NOM) FROM MuseFrance  m join city c on c.Name = m.Ville where m.Ville = ?",[$idcity]);
		return $res;
	}

}