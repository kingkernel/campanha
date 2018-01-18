<?php
class mapa {
	public function __construct(){

	}
	public function index(){
		include(PATHMOTOR."class/3rdp/google_maps.php");
		$mapa = new googlemaps("AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y");

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

		$pagina = new page_site;

		$js =  '<script>function initMap() {var map = new google.maps.Map(document.getElementById(\'map\'), {center: {lat: -34.397, lng: 150.644},zoom: 8});}</script><script src="https://maps.googleapis.com/maps/api/js?sensor=false></script>';
		$pagina->bodycontent = "<div id=\"map\"></div>" . $divmapa;
		$pagina->scriptsendpagev = '<script src="js/jquery.min.js"></script>'. $js;
		$pagina->render();
		$mapa->mountjs();

	}
}
?>