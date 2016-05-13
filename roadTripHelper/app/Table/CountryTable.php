<?php
namespace App\Table;

use \Core\Table\Table;

class CountryTable extends Table{

			protected $table = "country";

	public function getCountriesByContinent($continent){
		return $this->query("SELECT Name
						FROM country c, encompasses e 
						WHERE c.Code = e.Country AND e.Continent = ?",[$continent], null, true);
	
	}

}