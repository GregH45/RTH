<?php
namespace App\Table;

use \Core\Table\Table;

class CountryTable extends Table{

	protected $table = "country";

	public function getCountriesByContinent($continent){
		
		return $this->query("SELECT * 
				FROM country c
				LEFT JOIN encompasses e ON c.Code = e.Country
				WHERE e.Continent = ?", [$continent]);
	
	}

	public function getNameByCode($code){
		return $this->query("SELECT Name
						FROM country 
						WHERE Code = ? ",[$code], null, true);
	}


	public function getContinent($code){
		return $this->query("SELECT Name
						FROM continent c, encompasses e 
						WHERE c.Name = e.Continent AND e.Country = ?",[$code], null, true);

	}
}