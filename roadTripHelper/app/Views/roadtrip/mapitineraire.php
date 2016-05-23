<!DOCTYPE html> 
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Calcul d'itinéraire Google Map Api v3</title>
    <link rel="stylesheet" href="css/jquery-ui-1.8.12.custom.css" type="text/css" /> 
    <link rel="stylesheet" href="css/itinéraire.css" type="text/css" />    
  </head>
  <body>
    <div id="container">
        <h1>Calcul d'itinéraire Google Maps Api V3</h1>
        <div style="border-radius: 7px;" id="destinationForm">
            <b id = md>Mode de déplacement :  </b>
            <select style="border-radius: 7px;" id="mode">
              <option value="DRIVING">Driving</option>
              <option value="WALKING">Walking</option>
              <option value="BICYCLING">Bicycling</option>
              <option value="TRANSIT">Transit</option>
            </select>
        </div>
        <div id="panel"></div>
        <div id="floating-panel">
            <div id="right-panel" style="border-radius: 7px;">
                <div>
                <b>Départ:</b>
                    <select class="form-control" onchange="chargerPays()" id="continent"></select>
                    <select class="form-control" onchange="chargerVilles()" id="pays" style="display:none; margin-top:7px"></select>
                    <select class="form-control" id="start" style="display:none; margin-top:7px" ></select>
                <br>
                <b>Points de passage:</b> <br>
                    <i>(Ctrl-Click pour de multiple sélection!)</i> <br>
                    <select class="form-control" multiple id="waypoints"></select>
                    <br>
                <b>Arrivé:</b>
                    <select id="end" class="form-control" ></select>
                <br>
                  
                  <input class="btn btn-primary" type="submit" id="submit">
                </div>
            </div>
            <div id="map">
                <!-- Message affiché lorsque la map n'a pas encore chargé ou ne chargera pas -->
                <p>Veuillez patienter pendant le chargement de la carte...</p>
            </div>    
        </div>
        <div id="directions-panel"></div>
    </div>
        
    
    <!-- Include Javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.12.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/selectDynamiques2.js"></script> 
  </body>
</html>
