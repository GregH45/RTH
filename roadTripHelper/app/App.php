<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App{
	

	
	private static $_instance;
	
	private $title = 'RoadTripHelper';
	
	private $db_instance;

	
	public static function getInstance()
	{
		if(is_null(self::$_instance)){ self::$_instance = new App(); } //Permet d'instancier la classe une seul fois! (Singleton)  si existe d�ja on renvoie celle existante	
		return self::$_instance;
	}
	
	public static function load(){
		session_start();
		
		require ROOT . '/app/Autoloader.php';
		App\Autoloader::register();
		
		require ROOT.'/core/Autoloader.php';
		Core\Autoloader::register();
	}
	
	public function getTable($name)
	{		
		$class_name = 'App\Table\\' . ucfirst($name).'Table';
		return new $class_name($this->getDb());
	}
	
	public function getDb(){
		 
		$config = Config::getInstance(ROOT . '\config\config.php');
		
		if (is_null($this->db_instance)){
			return new MysqlDatabase($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));
		}
		return $this->db_instance;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($name){
		 $this->title = $name;
	}

}