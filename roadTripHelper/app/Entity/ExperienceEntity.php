<?php

namespace App\Entity;
use \Core\Entity\Entity;


class ExperienceEntity extends Entity{
	
	
	public function getUrl(){
		return 'index.php?p=post.show&id='.$this->id;
	}
	
	public function getExtrait()
	{
		$html = '<p>'.substr($this->contenu, 0, 100).'...</p>';
		$html .= '<p><a href="'.$this->getURL().'">voir la suite</a></p>';
		return $html;
	}

	
	
}