
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