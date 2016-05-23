<?php

namespace App\Entity;
use \Core\Entity\Entity;


class ContinentEntity extends Entity{

	/*
	Définie une url pour les continents
	*/
	public function getUrl(){
		return 'index.php?p=post.experiences&id='.$this->Name;
	}

}