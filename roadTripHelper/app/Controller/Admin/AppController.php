<?php


namespace App\Controller\Admin;


use \App;
use \Core\Auth\DBAuth;

class AppController extends \App\Controller\AppController{
		
	
	public function __construct(){
		
		parent::__construct();
		
		//Auth
		
		$app = App::getInstance();
		
		$Auth = new DBAuth($app->getDb());
		
		if (!$Auth->logged()){
			$this->forbidden();
		}
		
	}
	
	
	
}