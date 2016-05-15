<?php

namespace App\Entity;
use \Core\Entity\Entity;


class CityEntity extends Entity{
	
	
	public function getUrl(){
		return 'index.php?p=post.experiences&id2='.$this->Name;
	}
	
	
}