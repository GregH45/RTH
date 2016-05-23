<?php

namespace App\Entity;
use \Core\Entity\Entity;


class CountryEntity extends Entity{

	/*
	Définie une url pour les pays
	*/
	public function getUrl(){
		return 'index.php?p=post.experiences&code='.$this->Code;
	}

}