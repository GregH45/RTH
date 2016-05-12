<div class="col-sm-12">

<div style='padding-left:10px'  class="col-sm-1">
<!-- PROPOSITION 1 FILTER -->

	<div class="dropdown">
	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Filtrer
    <span class="caret"></span>
	</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
			<li class="dropdown-header">Continents</li>
			<!-- PHP : foreach  ($continents as $continent):  -->
				<?php  foreach ($continents as $continent):  ?>
					<li><a href="<?= $continent->url;?>"><?= $continent->Name ?></a></li>
				<?php endforeach?>
			<li class="dropdown-header">Pays</li>
			<!-- PHP : foreach  ($pays as $Pays):  -->
				<?php  foreach ($countries as $country):  ?>
					<li><a href="<?= $country->url;?>"><?= $country->Name ?></a></li>
				<?php endforeach?>
			<li class="dropdown-header">Villes</li>
			<!-- PHP : foreach  ($villes as $ville):  -->
				<?php  foreach ($cities as $city):  ?>
					<li><a href="#"><?= $city->Name ?></a></li>
				<?php endforeach?>
		</ul>
	</div>

	
</br></br>

<!-- PROPOSITION 2 FILTER -->

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Continent
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">NOM CONTINENTS</a></li>
  </ul>
</div>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Pays
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  
    <li><a href="#">NOM PAYS</a></li>
  </ul>
</div>

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Villes
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <?php  foreach ($categories as $categorie):  ?>
			<li><a href="<?= $categorie->url;?>"><?= $categorie->titre ?></a></li>
	<?php endforeach?>
  </ul>
</div>
</div>

<div class="btn-group" role="group">
  <button type="button" class="btn btn-default">Trier par date</button>
  <button type="button" class="btn btn-default">Trier par like</button>
</div>
</br></br>

	<div style='padding-left:40px' class="col-sm-11">

		<?php foreach  ($posts as $post): ?>
			
			<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title"><a href="<?= $post->url?>"><?=$post->titre;?></a></h2>
			</div>
			<div class="panel-body">
				<div class="col-sm-10">
					<p><em> <?=  $post->categorie;?></em></p>			
					<p><?= $post->getExtrait();?></p>
				</div>
				<div align="right" class="col-sm-2">
					<h3 align="right">
						<a href='index.php?p=users.logout' title="J'adore !"><span class='glyphicon glyphicon-heart grey' aria-hidden='true'></span></a>
						<a href='index.php?p=users.logout' title="Je veux y aller !" ><span class='glyphicon glyphicon-plane' aria-hidden='true'></span></a>
					</h3>
				</div>
			</div>
			</div>
		<?php endforeach;?>
	</div>
			
				
		

	
</div>

