<?php
class mapa {
	public function __construct(){

	}
	public function index(){
		$nav = $nav = new topmenu_campanha;
		$pagina = new page_site;

		$mp = new googleMaps;
		$mp->zoom = "4";
		$mp->userKey = "AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y";

		$ponto1 = new googleMarker;
		$ponto2 = new googleMarker;
			$ponto2->latitude = "0.9019925";
			$ponto2->longitude = "-52.0029565";
			$ponto2->setMap = $mp->mapName;
			$ponto2->icon = "/public/images/syspng/android.png";

		$ponto3 = new googleMarker;
			$ponto3->latitude = "-1.4557794";
			$ponto3->longitude = "-48.4901968";
			$ponto3->setMap = $mp->mapName;
			$ponto3->icon = "/public/images/syspng/android.png";
		$endereco = array('av coaraci numes', "922", "centro", "macapa");

		//$ponto3->userKey = $mp->userKey;
		//echo $ponto3->mountAdress($endereco);

		$mp->points = [$ponto1, $ponto2, $ponto3];
		
		$geo = '<p>Clique no botão para ver suas coordenadas.</p><button onclick="getLocation()">Esse aqui</button><div id="demo"></div><script>
		var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;  
}</script>';
		$pagina->bodycontent = $nav->html().$mp->render().$geo; //."<div id=\"map\"></div>". $divmapa;

		
		'var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;  
}';

/*
	//	include(PATHMOTOR."class/3rdp/google_maps.php");
	//	$mapa = new googlemaps("AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y");

		$ponto = new mapspoint;

		$divmapa = '<div class="col-md-4 col-sm-6" style="margin-top:10px" style="height: 500px; width: 700px"><div id="mapa"></div></div>';
		$endereco = "https://maps.googleapis.com/maps/api/geocode/json?address=av+sete+de+setembro+1937,+paraiso+-+ap&key=AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y";
		function retorna_cords ($endereco){
			$url = curl_init();
			curl_setopt($url, CURLOPT_URL, $endereco);
			curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
			$retorno = json_decode(curl_exec($url), true);

			$lat = $retorno["results"]["0"]["geometry"]["location"]["lat"];
			$lng = $retorno["results"]["0"]["geometry"]["location"]["lng"];

			$cordenadas = [];
			$cordenadas["lat"] = $lat;
			$cordenadas["lng"] = $lng;
			return $cordenadas;
			curl_close($url);
		};


		$mapa->key = "AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y";
		$mapa->idmap = "mapa";
		$mapa->functionName = "showmapa";

		$cord = retorna_cords($endereco);
		$ponto = new mapspoint;
		$ponto->position = $cord;
		$ponto->icon = PUBLICDIR . "images/syspng/chicken.png";
		$ponto->title = "teste";
		$ponto->mapa = $mapa->idmap;

		$mapa->position["lat"] = $ponto->position["lat"];
		$mapa->position["lng"] = $ponto->position["lng"];
		$mapa->points = [$ponto];
*/

		$js =  '<script>function initMap() {var map = new google.maps.Map(document.getElementById(\'map\'), {center: {lat: -34.397, lng: 150.644},zoom: 8});}</script><script src="https://maps.googleapis.com/maps/api/js?sensor=false></script>';
		
		$pagina->scriptsendpagev = '<script src="js/jquery.min.js"></script>'. $js;
		$pagina->render();
		//$mapa->mountjs();

	}
}
?>