<?php
namespace Core\Table;


use Core\Database\Database;



class Table{

	protected $table;
	protected $db;

	public function __construct(Database $db)
	{
		$this->db = $db;

		if(is_null($this->table))
		{

			$part = explode('\\', get_class($this));

			$class_name = end($part);
			$this->table = strtolower(str_replace('Table', "", $class_name));
		}
	}

	public function all(){
		return $this->query('SELECT * FROM '. $this->table);
	}


	public function create($fields){

		//Création d'un requête maléable à toutes les possibilités de champs conditionnelle (where) appelé ici fields
		$sql_parts = [];

		foreach($fields as $fieldName => $fieldValue)
		{
			$sql_parts[] = "$fieldName = ?";
			$attributes[] = $fieldValue;
		}


		$sql_part = implode(', ', $sql_parts);

		return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes,true);

	}

	public function delete($id){

		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);

	}

	public function update($id, $fields){

		//Création d'un requête maléable à toutes les possibilités de champs conditionnelle (where) appelé ici fields
		$sql_parts = [];
		$attributes = [];

		foreach($fields as $fieldName => $fieldValue)
		{
			$sql_parts[] = "$fieldName = ?";
			$attributes[] = $fieldValue;
		}

		$attributes[] = $id;

		$sql_part = implode(', ', $sql_parts);

		return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes,true);
	}




	public function find($id){

		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id],true);
	}

	/*
	 * La focntion sert à transformer une récupération basique de catégories en une liste/array key=>value
	 * @Param1 key est la clé
	 * @Pram2 est la valeur
	 */
	public function extract($key, $value){

		$record = $this->all();

		$return = [];

		foreach($record as $v){

			$return[$v->$key] = $v->$value;

		}

		return $return;


	}


	public function query($statement,$attributes = null, $one = false){
		die(var_dump(str_replace('Table', 'Entity', get_class($this))));
		if($attributes){
			return $this->db->prepare(
					$statement,
					$attributes,
					str_replace('Table', 'Entity', get_class($this)),
					$one);
		}else{
			return $this->db->query(
					$statement,
					str_replace('Table', 'Entity', get_class($this)),
					$one);
		}

	}




}