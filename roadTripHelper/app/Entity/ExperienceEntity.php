<?php

namespace App\Entity;
use \Core\Entity\Entity;


class ExperienceEntity extends Entity{

	/*
	Définie une url pour les expériences
	*/
	public function getUrl(){
		return 'index.php?p=post.show&id='.$this->id;
	}

}