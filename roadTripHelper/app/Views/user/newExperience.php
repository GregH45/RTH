<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

var $villes_parcourues;

$(document).ready(function() {

	var $continent = $('#continent');
	var $pays = $('#pays');

	// chargement de la liste de localité un

	$continent.append('<option value="">Continent</option>');

		$.ajax({

			url: 'index.php?p=users.selectDynamiques',
			dataType: 'json', 
			success: function(continents) {

				$.each(continents, function(i, value) {
					$('#continent').append('<option value="'+ value +'">'+ value +'</option>');
				});

			}

		});
});


function chargerPays(){

	var continent  = document.getElementById("continent").value;

	//alert(continent);
	var $pays = $('#pays');
	document.getElementById("pays").style.display = "block";

	$pays.empty(); // on vide la liste de localité deux

	$pays.append('<option value="">Pays</option>');

	
	$.ajax({

			url: 'index.php?p=users.selectDynamiques&continent='+continent,
			dataType: 'json', 
			success: function(countries) {

				$.each(countries, function(i, value) {
					$('#pays').append('<option value="'+ value +'">'+ value +'</option>');
				});

			}

		});
}

function chargerVilles(){

	var pays  = document.getElementById("pays").value;
	document.getElementById("villes").style.display = "block";
	//alert(continent);
	var $villes = $('#villes');

	$villes.empty(); 

	$villes.append('<option value="">Villes</option>');

	
	$.ajax({

			url: 'index.php?p=users.selectDynamiques&pays='+pays,
			dataType: 'json', 
			success: function(cities) {
				$.each(cities, function(i, value) {
					$('#villes').append('<option value="'+ value +'">'+ value +'</option>');
				});
			}
	});
}

function listerVilles(){

	var ville  = document.getElementById("villes").value;
	var liste = document.getElementById("listeVilles");

	if(liste.value==''){
		liste.value = ville;
	}else{
		liste.value += ' - ' + ville;
	}

}

function resetVilles(){

	document.getElementById("listeVilles").value = '';

}


</script>

<?php 

if($errors!="0"){ 
	echo "<div class='alert alert-danger'>".$errors."</div>" ;
} 

//echo $json;

?>
	<div class="col-sm-12 ">
		<form method = "post" >
			<h3 align="right"><b> Nouvelle experience </b></h3></br>
			
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
				<div class=row>
					<div class="col-lg-3 col-sm-push-1">
						<label>Parcours du RoadTrip :</label>
						<select class="form-control" onchange="chargerPays()" id="continent"></select>
						<select class="form-control" onchange="chargerVilles()" id="pays" style="display:none; margin-top:7px"></select>
						<select class="form-control" onchange="listerVilles()" id="villes" style="display:none; margin-top:7px"></select>
					</div>
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
