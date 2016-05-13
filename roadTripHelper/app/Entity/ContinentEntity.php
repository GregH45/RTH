<?php

namespace App\Entity;
use \Core\Entity\Entity;


class ContinentEntity extends Entity{
	

	public function getUrl(){
		return 'index.php?p=post.experiences&id='.$this->Name;
	}
	
}