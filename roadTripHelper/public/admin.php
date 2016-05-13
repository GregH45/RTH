<?php 

define('ROOT',dirname(__DIR__));

use \Core\Auth\DBAuth;

require ROOT . '/app/App.php';

App::load();



if(isset($_GET['p'])){
	
	$page = $_GET['p'];
	
}else{
	
	$page = 'home';
}

 
ob_start();

if($page === 'home'){
	require ROOT . '/pages/admin/post/index.php';
}elseif($page === 'post.edit'){
	require ROOT . '/pages/admin/post/edit.php';
	}elseif($page === 'post.add'){
		require ROOT . '/pages/admin/post/add.php';
}elseif($page === 'post.delete'){
	require ROOT . '/pages/admin/post/delete.php';
}elseif($page === 'post.show'){
	require ROOT . '/pages/admin/post/show.php';
}
elseif($page === 'categories.index'){
	require ROOT . '/pages/admin/categories/index.php';
}elseif($page === 'categories.edit'){
	require ROOT . '/pages/admin/categories/edit.php';
}elseif($page === 'categories.add'){
	require ROOT . '/pages/admin/categories/add.php';
}elseif($page === 'categories.delete'){
	require ROOT . '/pages/admin/categories/delete.php';
}elseif($page === 'categories.show'){
	require ROOT . '/pages/admin/categories/show.php';
}




$content = ob_get_clean();



require ROOT . '/pages/templates/default.php';


/*$app = App::getInstance();

$posts = $app->getTable('Posts');



echo var_dump($posts->all());
*/

//$config = new App\Config();


/*
if(isset($_GET['p']))
{
	$p = $_GET['p'];
} else 
{
	$p = 'home';
}

//Initialisation des objets

$db = new App\Database('roadtriphelper');


ob_start();
if($p ==='home')
{
	require '../pages/home.php';
}
elseif ($p ==='article')
{
	require '../pages/single.php';
}
elseif ($p ==='categorie')
{
	require '../pages/categorie.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';

*/