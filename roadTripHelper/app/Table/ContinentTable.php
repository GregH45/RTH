<?php
namespace App\Table;

use \Core\Table\Table;

class ContinentTable extends Table{

	protected $table = "continent";

	/* Récupération du continent en fonction du code du pays */
	public function getContinent($code){
		return $this->query("SELECT Name
						FROM continent c, encompasses e 
						WHERE c.Name = e.Continent AND e.Country = ?",[$code], null, true);

	}
}