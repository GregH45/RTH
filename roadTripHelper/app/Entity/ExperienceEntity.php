<?php

namespace App\Entity;
use \Core\Entity\Entity;


class ExperienceEntity extends Entity{
	
	
	public function getUrl(){
		return 'index.php?p=post.show&id='.$this->id;
	}
	
	public function getUrl2() {
		return 'index.php?p=post.show&filter=date';		
	}
	
}