<!-- Template du site -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<title><?=App::getInstance()->getTitle()?></title>
	</head>

	<body>
		<div class="container">

			<!-- Navbar -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
			  		<div class="navbar-header">
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            	<span class="sr-only">Toggle navigation</span>
			              	<span class="icon-bar"></span>
			              	<span class="icon-bar"></span>
			              	<span class="icon-bar"></span>
			            </button>
			            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> RoadTripHelper</a>
			        </div>

			    	<div id="navbar" class="navbar-collapse collapse">
			            <ul class="nav navbar-nav">
			    			<li><a href="index.php?p=roadTrip.mapitineraire">Road Trip</a></li>
			    			<li><a href="index.php?p=post.experiences">Expériences</a></li>
			    			<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1)  echo("
			    				<li><a href='index.php?p=admin.post.index'>Administration</a></li>");
			    				?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
			              	<li><a href="index.php?p=users.login"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?=App::getUsername()?></a></li>
							<?php if(App::getUsername()!="Login") { echo("<li><a href='index.php?p=users.logout'><span class='glyphicon glyphicon-off' aria-hidden='true'></span></a></li>"); }?>
			            </ul>
			  		</div>
				</div>
			</nav>

			<!-- Contenu de la page -->

				<?= $content;  ?>

		</div><br />

		<!-- Footer -->
		<div class="container">
			<footer class="footer footerFonce" >
	      		<div class="container" >
	        		<p class="text-muted text-center">Luc Bettuzzi, Grégoire Harba , Marine Legros et Mathilde Prévost - <a href="mailto:roadtriphelper2@gmail.com">Contact</a>
	        		- <a href="#"><img class="icone" src="img/facebook.png" alt="facebook" /></a> - <a href="#"><img class="icone" src="img/twitter.png" alt="twitter" /></a></p>
	      		</div>
	    	</footer>
    	</div>
		<!--  -->

    	<!-- Bootstrap core JavaScript
   		================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="js/bootstrap.js"></script>
	</body>


</html>

