<div class="col-sm-12">
<div style='padding-left:10px'  class="col-sm-1">

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

   <?= $currentContinent ?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    	<?php  foreach ($continents as $continent):  ?>
			<li><a href="<?= $continent->url;?>"><?= $continent->Name ?></a></li>
		<?php endforeach?>
  </ul>
</div>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

  	<?= $currentCountry ?>

    <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    	<?php  foreach ($countries as $country):  ?>
			<li><a href="<?= $country->url;?>"><?= $country->Name ?></a></li>
		<?php endforeach?>
  </ul>
</div>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

    <?= $currentCity ?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <?php  foreach ($cities as $city):  ?>
		<li><a href="<?= $city->url;?>"><?= $city->Name ?></a></li>
	<?php endforeach?>
  </ul>
</div>
</div>

<div style="padding-left:50px" class="btn-group" role="group">
  <button type="button" class="btn btn-default">Trier par date</button>
  <button type="button" class="btn btn-default">Trier par like</button>
</div>
</br></br>
</br>
	<div style='padding-left:40px' class="col-sm-11">


		<?php foreach ($experiences as $experience):
			list($plus1, $plus2, $plus3) = split(";", $experience->plus);
			list($moins1, $moins2, $moins3) = split(";", $experience->moins); ?>

			<div class="panel panel-default">
				<div class="panel-heading">
				<div class="row">
					<h3 style='padding-left:20px' align="left" class="panel-title">
						<a href="<?= $experience->url?>"><?=$experience->titre;?></a>
					</h3>
					<h3 align="right" style='padding-right:20px' class="panel-title">
						<a href='?p=post.incrementeLike&id=<?=$experience->id;?>' title="J'adore !"><span class='glyphicon glyphicon-heart grey' aria-hidden='true'></span><span class="badge"><?= $experience->nb_likes;?></span></a>
							<a href='index.php?p=users.logout' title="Je veux y aller !" ><span class='glyphicon glyphicon-plane' aria-hidden='true'></span></a>
							 
							 <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=google.fr&t=RoadTripHelper" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><img src="img/facebook.png" alt="Facebook" /></a>
							 <?php if(isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1))  echo("
						<form action = '?p=admin.post.delete' method = 'post' style= 'display : inline;'>
							<input type= 'hidden' name ='id' value = '<?= $experience->id;?>'>
							<button type= 'submit' class ='btn btn-danger'>Supprimer</button>
						</form>");?>

					</h3>
				</div>
				</div>
				<div class="panel-body">
					<div class="col-sm-11">
						<div class="row">
							<div class="col-lg-6 col-sm-push-1 ">
								<p><em> <?=$experience->description;?></em></p>
							</div>
							<div class="col-lg-3 col-sm-push-1 alert-success">
								&nbsp;<h4 align="center"><b>Les plus <span class="glyphicon glyphicon-ok"></span></b></h4>&nbsp;
								&nbsp;<p><em>&bull; <?=$plus1;?></em></p>&nbsp;
								&nbsp;<p><em>&bull; <?=$plus2;?></em></p>&nbsp;
								&nbsp;<p><em>&bull; <?=$plus3;?></em></p>&nbsp;
							</div>
							<div class="col-lg-3 col-sm-push-1 alert-danger">
								&nbsp;<h4 align="center"><b>Les moins <span class="glyphicon glyphicon-remove"></span></b></h4>&nbsp;
								&nbsp;<p><em>&bull; <?=$moins1;?></em></p>&nbsp;
								&nbsp;<p><em>&bull; <?=$moins2;?></em></p>&nbsp;
								&nbsp;<p><em>&bull; <?=$moins3;?></em></p>&nbsp;
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach;?>
		<?php if(sizeof($experiences) == 0):?>
			<p><em>Aucune expérience ne correspond à votre recherche...</em></p>
		<?php endif ?>
	</div>




</div>

