<!-- Template du site -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<style>
body {
	padding-top: 50px;
}
</style>

<title><?=App::getInstance()->getTitle()?></title>
</head>

<body>

<!-- Navbar --> 
<div class="container">
<nav class="navbar navbar-default">
  <div class="container">
    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    <a class="navbar-brand" href="#">Road Trip</a>
    <a class="navbar-brand" href="index.php?p=post.experiences">Expériences</a>
	<!--<p style="padding-left : 8px;" class="navbar-text">RoadTripHelper, mon guide de voyage</p>-->
	<p style="padding-right : 40px"><a class="navbar-brand navbar-right" href="index.php?p=users.login">Login</a></p>
	</ul>
  </div>
</nav>

<!-- Contenu de la page -->
<div class="container">

	<?= $content;  ?>

</div>
</div>


</body>
</html>

