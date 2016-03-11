<?php

namespace Core;


class Config {
	
	
	private $settings = [];
	
	private static $_instance;
	
	public static function getInstance($file)
	{
		if(is_null(self::$_instance)){ self::$_instance = new Config($file); } //Permet d'instancier la classe une seul fois! (Singleton)  si existe déja on renvoie celle existante
		return self::$_instance;
	}
	
	public function __construct($file){
		
		$this->settings = require($file);
		
	}
	
	public function get($key){
		
		if(!isset($this->settings[$key])){return null;} //Si la clé n'existe pas (DIFFERENRT DE  db_name, db_user  ----> Attr. Config) on retourne null
		
		return $this->settings[$key];
	}
	
}