<?php
namespace App\Table;

use \Core\Table\Table;

class ExperienceTable extends Table{

	protected $table = 'experience';


	/* Incrémentation champs "nb_likes" dans la table */
	public function addLike($id) {
		$nb = $this->getNbLikes($id) +1;
		return $this->query("UPDATE experience
				SET nb_likes = ?
				WHERE id = ?
				", [$nb, $id],true);
	}

	/* Récupération du nombre de likes d'un article */
	public function getNbLikes($id) {
		$datas = $this->query("
				SELECT nb_likes
				FROM experience
				WHERE id = ?
				", [$id],true);
		return $datas->nb_likes;
	}


	/* Récupération des expériences non valides */
	public function getNonValideExp()
	{
		$exps = $this->query("SELECT id,titre, description
								FROM experience
								WHERE accepte = 0");
		return $exps;
	}

	/* Validation d'une expérience */
	public function validerExp($id)
	{
		return $this->query("UPDATE experience SET experience.accepte = ? WHERE id = ?",[1,$id],true);

	}

	/* Récupération des expériences valides */
	public function getExperiencesValid(){
		return $this->query("SELECT *
						FROM experience
						WHERE accepte = 1");
	}

	/* Récupération des villes parcourues */
	public function getVillesParcourues($id) {
		return $this->query("SELECT *
						FROM villes_parcourues
						WHERE id_exp = ?", [$id]);
	}

	/* Récupération des experiences en fonction du continent selectionné */
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

	/* Récupération des experiences en fonction du pays selectionné */
	public function getExperiencesValidByCountry($country, $orderBy = '') {
		if($orderBy != '' && $orderBy == 'nb_likes') {
			$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_pays = ? ) 
				ORDER BY nb_likes DESC ", [$country]);
		}
		else {
			if($orderBy != '' && $orderBy == 'date') {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_pays = ? ) 
				ORDER BY date_debut DESC ", [$country]);	
			}
			else {
				$res = $this->query("SELECT * 
				FROM experience 
				WHERE id IN(
					SELECT id_exp 
					FROM villes_parcourues
					WHERE nom_pays = ? )", [$country]);	
			}
		}	
		return $res;	
	}

	/* Récupération des experiences en fonction de la ville selectionnée */
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

	/* Récupération des experiences avec un orderby */
	public function getExperienceOrderBy($orderBy) {
		if($orderBy == 'nb_likes') {
			$res = $this->query("SELECT * 
					FROM experience
					WHERE accepte = 1 
					ORDER BY nb_likes DESC ");
		}
		else {
			if($orderBy == 'date') {
			$res = $this->query("SELECT * 
					FROM experience 
					WHERE accepte = 1 
					ORDER BY date_debut DESC ");
			}
		}
		return $res;	
	}
}