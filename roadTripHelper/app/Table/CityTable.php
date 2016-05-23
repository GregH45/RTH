<?php
namespace App\Table;

use \Core\Table\Table;

class CityTable extends Table{

	protected $table = "city";

	public function getCitiesByCountry($country){
		return $this->query("SELECT ci.Name
						FROM country co, city ci 
						WHERE co.Code = ci.Country AND ci.Country = ?",[$country], null, true);
	}

	public function getCodePaysByCity($city){
		
		return $this->query("SELECT c.Country
				FROM city c
				WHERE c.Name = ?", [$city]);
	
	}

	
	public function getMuseFromCity($idcity)
	{
		$res = $this->query("SELECT distinct(m.NOM) FROM MuseFrance  m join city c on c.Name = m.Ville where m.Ville = ?",[$idcity]);
		return $res;
	}
 
}