<?php
namespace App\Table;

use \Core\Table\Table;

class CountryTable extends Table{

	protected $table = "country";

	/* Récupération de la liste des pays en fonction du continent */
	public function getCountriesByContinent($continent) {		
		return $this->query("SELECT * 
				FROM country c
				LEFT JOIN encompasses e ON c.Code = e.Country
				WHERE e.Continent = ?", [$continent]);	
	}

	/* Récupération du nom du pays en fonction de son code */
	public function getNameByCode($code){
		return $this->query("SELECT Name
						FROM country 
						WHERE Code = ? ",[$code], null, true);
	}

	
	/* Récupération de la langue en fonction du code du pays */
	public function getLanguages($country) {
		$res = $this->query("SELECT Name
						FROM language 
						WHERE Country = ? ",[$country]);
		return $res;
	}

	/* Récupération de la politique en fonction du code du pays */
	public function getPolitics($country) {
		return $this->query("SELECT Government
						FROM politics 
						WHERE Country = ? ",[$country]);
	}

	public function getCountryInfos($country) {
		$res = $this->query("SELECT *
						FROM country 
						WHERE Code = ? ",[$country], null, true);
		return $res;
	}

}