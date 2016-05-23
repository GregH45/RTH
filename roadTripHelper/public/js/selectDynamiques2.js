
$(document).ready(function() {

	var $continent = $('#continent');
	var $pays = $('#pays');

	// chargement de la liste de localité un

	$continent.append('<option value="">Continent</option>');

		$.ajax({

			url: 'index.php?p=roadtrip.selectDynamiques',
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

			url: 'index.php?p=roadtrip.selectDynamiques&continent='+continent,
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
	document.getElementById("start").style.display = "block";
	//alert(continent);
	var $villes = $('#start');
	

	$villes.empty(); 
	$('#start').empty();

	$villes.append('<option value="">Villes</option>');

	
	$.ajax({

			url: 'index.php?p=roadtrip.selectDynamiques&pays='+pays,
			dataType: 'json', 
			success: function(cities) {
				$.each(cities, function(i, value) {
					$('#start').append('<option value="'+ value +'">'+ value +'</option>');
					$('#waypoints').append('<option value="'+ value +'">'+ value +'</option>');
					$('#end').append('<option value="'+ value +'">'+ value +'</option>');
				});
			}
	});
}