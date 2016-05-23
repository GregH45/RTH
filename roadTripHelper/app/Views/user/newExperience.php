<!-- Chargement des ressources javascript nécessaires -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="js/selectDynamiques.js"></script>


<?php 

/*Gestion des erreurs si mauvaise saisie */

if($errors!="0"){ 
	echo "<div class='alert alert-danger'>".$errors."</div>" ;
} 

?>
	<div class="col-sm-12 ">
		<form method = "post" >
			<h3 align="right"><b> Nouvelle experience </b></h3></br>
			
			<!-- Formulaire de création d'une nouvelle experience -->

			<div class="row" >
				<div class="col-lg-4 col-sm-push-1">
					<?php echo $form->input('titre','Titre');?>
					<?php echo $form->input('description','Description', ['type' => 'textarea']);?>	
					<?php echo $form->input('date_debut','Date de début du voyage', ['type' => 'date']);?>
					<?php echo $form->input('date_fin','Date de fin du voyage', ['type' => 'date']);?>
				</div>
				<div class="col-lg-3 col-sm-push-1 ">
					<?php echo $form->input('plus1','Les plus');?>
					<?php echo $form->input('plus2','');?>
					<?php echo $form->input('plus3','');?>
				</div>
				<div class="col-lg-3 col-sm-push-1">
					<?php echo $form->input('moins1','Les moins');?>
					<?php echo $form->input('moins2','');?>
					<?php echo $form->input('moins3','');?>
				</div>

				<!-- Affichage dynamique des destinations -->

				<div class=row>
					<div class="col-lg-3 col-sm-push-1">
						<label>Parcours du RoadTrip :</label>
						<select class="form-control" onchange="chargerPays()" id="continent"></select>
						<select class="form-control" onchange="chargerVilles()" id="pays" style="display:none; margin-top:7px"></select>
						<select class="form-control" onchange="listerVilles()" id="villes" style="display:none; margin-top:7px"></select>
					</div>

					<!-- Affichage de la liste des villes selectionnées -->
					<div class=row>
						<div class="col-lg-2 col-sm-push-1">							
							<div class="form-group"><label>Villes parcourues</label><textarea readonly="readonly" name="listeVilles" id="listeVilles"  class = "form-control"></textarea></div>
							<input type="button" class="btn btn-danger" value="Réinitialiser" onclick="resetVilles()"></input>
						</div>
					</div>
				</div>
			</div>	
			<br><br>
			<div class="col-sm-12 col-sm-push-6">
				<?php echo $form->submit('Ajouter');?>
			</div>


		</form>
	</div>
