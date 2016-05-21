<h4 class="text-center"> Mes expériences 
	<a title="Ajouter une nouvelle experience" href='index.php?p=users.newExperience'><span class='glyphicon glyphicon-plus text-default' aria-hidden='true'></span></a></h4>

	<?php foreach  ($experiences as $experience):
		list($plus1, $plus2, $plus3) = split(";", $experience->plus);
		list($moins1, $moins2, $moins3) = split(";", $experience->moins); ?>

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