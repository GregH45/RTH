<?php
namespace App\Table;

use App\App;


class Article extends Table{
	
	protected static $table = "article";
	
	
	public static function find($id)
	{
		return self::query("
				SELECT article.id, article.titre, article.contenu, categorie.titre as categorie 
				FROM article
				LEFT JOIN categorie	ON categorie_id = categorie.id
				WHERE article.id = ?
				", [$id],true);
	}
	
	public static function  getLast(){
		return self::query("
				SELECT article.id, article.titre, article.contenu, categorie.titre as categorie 
				FROM article
				LEFT JOIN categorie	ON categorie_id = categorie.id"
				);
	}
	
	public function __get($key)
	{
		$method = 'get'.ucfirst($key);
		
		$this->$key = $this->$method();
		
		return $this->$key;
	}
	
	public function getUrl()
	{
		return 'index.php?p=article&id='.$this->id;
	}
	
	public function getExtrait()
	{
		$html = '<p>'.substr($this->contenu, 0, 100).'...</p>';
		$html .= '<p><a href="'.$this->getURL().'">voir la suite</a></p>';
		return $html;
	}
	
	public static function lastByCategorie($categorie_id)
	{
		return self::query("
				SELECT article.id, article.titre, article.contenu, categorie.titre as categorie 
				FROM article
				LEFT JOIN categorie	ON categorie_id = categorie.id
				WHERE categorie_id = ? "
				,[$categorie_id]);
	}
	
	
}