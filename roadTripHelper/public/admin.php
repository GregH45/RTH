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



$content = ob_get_clean();



require ROOT . '/pages/templates/default.php';

