<?php

namespace App\Entity;
use \Core\Entity\Entity;


class CityEntity extends Entity{

	/*
	Définie une url pour les villes
	*/
	public function getUrl(){
		return 'index.php?p=post.experiences&id2='.$this->Name;
	}


}