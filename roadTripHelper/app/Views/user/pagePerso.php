
<?php //die(var_dump($experiences)); ?>


	<div class="container col-sm-12" float="center" >

		<h4 align="center"> Mes expériences &nbsp; &nbsp; &nbsp;<a title="Ajouter une nouvelle experience" href='index.php?p=users.newExperience'><span style="color:grey" align="right" class='glyphicon glyphicon-plus' aria-hidden='true'></span></a></h4>

		<?php foreach  ($experiences as $experience):

				list($plus1, $plus2, $plus3) = split(";", $experience->plus);
				list($moins1, $moins2, $moins3) = split(";", $experience->moins); ?>


			<div class="panel panel-default">

					<div class="panel-heading">
						<h2 class="panel-title"><a href="#"><?=$experience->titre;?></a></h2>
					</div>
					<div class="panel-body">
							<div class="col-sm-11">
								<div class="row">
									<div class="col-lg-6 col-sm-push-1 ">
										<p><em> Date du voyage : Du  <?=$experience->date_debut;?> au <?=$experience->date_debut;?></em></p>
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
						<p><em>	<?=$experience->nb_likes;?></em></p>
					</div>
			</div>

	<?php endforeach;?>
	</div>
</div>
