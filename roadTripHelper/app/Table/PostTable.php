<?php
namespace App\Table;

use \Core\Table\Table;

class PostTable extends Table{
	
	
	protected $table = 'article';
	
	/**
	 * Récupère els derniers articles
	 * @return array
	 */
	
	public function last()
	{
		return $this->query("
				SELECT article.id, article.titre, article.contenu, article.date, categorie.titre as categorie
				FROM article
				LEFT JOIN categorie	ON categorie_id = categorie.id
				ORDER BY article.date DESC
				");
	}
	
	/**
	 * Récupère les derniers article de la categorie demandé
	 * @param $categorie_id int 
	 * @return array
	 */
	
	public function lastByCategorie($categorie_id)
	{
		return $this->query("
				SELECT article.id, article.titre, article.contenu, article.date, categorie.titre as categorie
				FROM article
				LEFT JOIN categorie	ON categorie_id = categorie.id
				WHERE article.categorie_id = ?
				ORDER BY article.date DESC
				", [$categorie_id]);
	}
	
	
	/**
	 * Récupère un artcicle ou une categorie
	 * @param $categorie_id int 
	 * @return \App\Entity\PostEntity
	 */
	
	public function findWithCategorie($id)
	{
		return $this->query("
				SELECT article.id, article.titre, article.contenu, article.date, categorie.titre as categorie
				FROM article
				LEFT JOIN categorie	ON categorie_id = categorie.id
				WHERE article.id = ?
				", [$id],true);
	}
}