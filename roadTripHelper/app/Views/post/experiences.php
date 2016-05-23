<?php

	/*
	affiche les informations sur le pays ou la ville
	si les listes de selections sont remplies
	*/
 if (isset($_GET["code"])) {
		echo("
		<div class='panel panel-default'>
  		<div class='panel-body'>
  		Informations générales sur le pays : <br />
  		<li>Capitale : ".$capital."</li>
  		<li>Superficie :".$area." m²</li>
  		<li>Population : ".$pop." habitants</li>
  		Langue(s) parlée(s) :");
    	foreach ($languages as $language)
			echo ($language->Name.",");
		echo("<br/> Politique du pays  :");
    	foreach ($politics as $politic)
			echo($politic->Government.",");

		echo("<br/></div>
		</div>");
	}

	if (isset($_GET["id2"])){
		echo("<div class='panel panel-default'>
  		<div class='panel-body'>
  		Musées de la Ville :");
		foreach ($muse as $muses){
			echo($muses->NOM.",");
		}
		echo("</div>
		</div>");
	}

?>


<?php
if($currentContinent == 'Continent' && $currentCountry == 'Pays' && $currentCity == 'Villes') {
	$lien = '';
}
if($currentContinent != 'Continent') {
	$lien = 'id='.$currentContinent.'&';
}
if($currentCountry != 'Pays') {
	$lien = 'code='.$currentCountryCode.'&';
}
if($currentCity != 'Villes') {
	$lien = 'id2='.$currentCity.'&';
}
?>

<div class="text-center">
	<div class="btn-group">
  		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   			<?= $currentContinent ?> <span class="caret"></span>
  		</button>
  		<ul class="dropdown-menu">
    		<?php  foreach ($continents as $continent):  ?>
				<li><a href="<?= $continent->url;?>"><?= $continent->Name ?></a></li>
			<?php endforeach?>
  		</ul>&nbsp;
	</div>

	<div class="btn-group">
  		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  			<?= $currentCountry ?> <span class="caret"></span>
  		</button>
  		<ul class="dropdown-menu">
    		<?php  foreach ($countries as $country):  ?>
				<li><a href="<?= $country->url;?>"><?= $country->Name ?></a></li>
			<?php endforeach?>
  		</ul>&nbsp;
	</div>

	<div class="btn-group">
  		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   			<?= $currentCity ?> <span class="caret"></span>
  		</button>
  		<ul class="dropdown-menu">
    		<?php  foreach ($cities as $city):  ?>
				<li><a href="<?= $city->url;?>"><?= $city->Name ?></a></li>
			<?php endforeach?>
  		</ul>&nbsp;
	</div>


	<div class="btn-group">
  		<a href="?p=post.experiences&<?=$lien;?>filter=date"><button type="button" class="btn btn-default">Trier par date</button></a>
	</div>

	<div class="btn-group">
  		<a href="?p=post.experiences&<?=$lien;?>filter=nb_likes"><button type="button" class="btn btn-default">Trier par like</button></a>
	</div>
	<div class="btn-group">
  		<a href="?p=post.experiences"><button type="button" class="btn btn-primary">Réinitialiser les filtres</button></a>
	</div>
</div>
</br>


<?php foreach ($experiences as $experience):
	list($plus1, $plus2, $plus3) = explode(";", $experience->plus);
	list($moins1, $moins2, $moins3) = explode(";", $experience->moins); ?>

<div class="panel panel-default">
	<div class="panel-heading">
			<h3 class="panel-title">
			<div class="row">
			<div class="col-md-8">
				<strong><a class="text-default" href="<?= $experience->url?>"><?=$experience->titre;?></a></strong>
			</div>
			<div class="col-md-4 text-right">
				<a href='?p=post.incrementeLike&id=<?=$experience->id;?>' title="J'adore !">
					<span class='glyphicon glyphicon-heart grey text-default' aria-hidden='true'></span> <span class="badge"><?= $experience->nb_likes;?></span></a>
				<a href='index.php?p=users.logout' title="Je veux y aller !" ><span class='glyphicon glyphicon-plane text-default' aria-hidden='true'></span></a>
				<a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=google.fr&t=RoadTripHelper" rel="nofollow"
					onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">
					<img src="img/facebook.png" alt="Facebook" /></a>
				<?php if(isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1))
					echo("<form action = '?p=admin.post.delete' method = 'post' style= 'display : inline;'>
							<input type= 'hidden' name ='id' value = '<?= $experience->id;?>'>
							<button type= 'submit' class ='btn btn-danger'>Supprimer</button>
						</form>");?>
					</div>
				</div>
			</h3>
		</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<p><strong>Date du voyage :</strong>  Du  <?=$experience->date_debut;?> au <?=$experience->date_debut;?></p>
				<p><?=$experience->description;?></p>

			</div>
			<div class="col-md-6">
				<div class="col-lg-5 col-sm-push-1 alert-success">
					&nbsp;<h4 align="center"><b>Les plus <span class="glyphicon glyphicon-ok"></span></b></h4>&nbsp;
					<ul>
						<li><?=$plus1;?></li>
						<li><?=$plus2;?></li>
						<li><?=$plus3;?></li>
						<br />
					</ul>
				</div>
				<div class="col-lg-5 col-sm-push-1 alert-danger">
					&nbsp;<h4 align="center"><b>Les moins <span class="glyphicon glyphicon-remove"></span></b></h4>&nbsp;
					<ul>
						<li><?=$moins1;?></li>
						<li><?=$moins2;?></li>
						<li><?=$moins3;?></li>
						<br />
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach;?>
<?php if(sizeof($experiences) == 0):?>
	<div class="text-center"><p><em>Aucune expérience ne correspond à votre recherche...</em></p></div>
<?php endif ?>
