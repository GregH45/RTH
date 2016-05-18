<?php
namespace App\Table;

use \Core\Table\Table;

class PostTable extends Table{


	protected $table = 'experience';

	/**
	 * Récupère les derniers articles
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

	public function addLike($id) {
		$nb = $this->getNbLikes($id) +1;
		return $this->query("UPDATE experience
				SET nb_likes = ?
				WHERE id = ?
				", [$nb, $id],true);
	}

	public function getNbLikes($id) {
		$datas = $this->query("
				SELECT nb_likes
				FROM experience
				WHERE id = ?
				", [$id],true);
		return $datas->nb_likes;
	}


	public function getNonValideExp()
	{
		$exps = $this->query("SELECT id,titre, description
								FROM experience
								WHERE accepte =0");
		return $exps;
	}

	public function validerExp($id)
	{
		//die(var_dump($id));
		return $this->query("UPDATE experience SET experience.accepte = ? WHERE id = ?",[1,$id],true);

	}

	public function getExperiencesValid(){
		return $this->query("SELECT *
						FROM experience
						WHERE accepte = 1");
	}

	public function getVillesParcourues($id) {
		return $this->query("SELECT *
						FROM villes_parcourues
						WHERE id_exp = ?", [$id]);
	}

	public function getExperiencesValidByContinent($continent, $orderBy = '') {
		if($orderBy != '' && $orderBy == 'nb_likes') {
			$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_continent = ? ) 
				ORDER BY nb_likes DESC ", [$continent]);	
		}
		else {
			if($orderBy != '' && $orderBy == 'date') {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_continent = ? ) 
				ORDER BY date_debut DESC ", [$continent]);	
			}
			else {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_continent = ? )", [$continent]);	
			}
		}
		return $res;		
	}

	public function getExperiencesValidByCountry($country, $orderBy = '') {
		if($orderBy != '' && $orderBy == 'nb_likes') {
			$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE code_pays = ? ) 
				ORDER BY nb_likes DESC ", [$country]);
		}
		else {
			if($orderBy != '' && $orderBy == 'date') {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE code_pays = ? ) 
				ORDER BY date_debut DESC ", [$country]);	
			}
			else {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE code_pays = ? )", [$country]);	
			}
		}	
		return $res;	
	}

	public function getExperiencesValidByCity($city, $orderBy = '') {
		if($orderBy != '' && $orderBy == 'nb_likes') {
			$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_ville = ? ) 
				ORDER BY nb_likes DESC ", [$city]);	
		}
		else {
			if($orderBy != '' && $orderBy == 'date') {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_ville = ? ) 
				ORDER BY date_debut DESC ", [$city]);	
			}
			else {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_ville = ? )", [$city]);	
			}
			
		}
		return $res;
		
	}

	function getDateFormat($date) {
		$newDate = date("d/m/Y", strtotime($date));
		return $newDate;
	}
}