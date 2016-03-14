
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
	padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
}
</style>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="../assets/js/html5shiv.js"></script>
<![endif]-->

<title><?=App::getInstance()->getTitle()?></title>

<!-- Fav and touch icons -->
</head>

<body>
<!--<div class="navbar navbar-inverse navbar-fixed-top">-->
<!--<div class="navbar-inner">-->
<!--<div class="container">-->
<!--<a class="brand" href="index.php">Road Trip Helper</a>-->
<div class="container">
<nav class="navbar navbar-default">
  <div class="container">
    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    <a class="navbar-brand" href="#">Road Trip</a>
    <a class="navbar-brand" href="index.php?p=post.experiences">Expériences</a>
  </div>
</nav>


<!--</div>-->
<!--</div>-->
<!--</div>-->

<div class="container">

	<?= $content;  ?>

</div> <!-- /container -->
</div>


</body>
</html>

