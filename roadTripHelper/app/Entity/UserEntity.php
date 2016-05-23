<?php

namespace App\Entity;
use \Core\Entity\Entity;


class UserEntity extends Entity{


	/*
	Définie une url pour la page perso
	*/
	public function getUrl(){
		return 'index.php?p=users.pagePerso&id='.$this->id;
	}


}