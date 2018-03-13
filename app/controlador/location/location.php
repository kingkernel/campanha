<?php
class location{
  public $page;
	public function __construct(){
    $pagina = new page_site;
    $pagina->headersinclude .= fontawesome(urlcss($_GET));
      $topmenu = new topmenu_campanha;
    $pagina->bodycontent = $topmenu->html();
    $this->page = $pagina;
	}
	public function index(){
	echo '<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script><article>
      <p>Finding your location: <span id="status">checking...</span></p>
    </article>
<script>
function success(position) {
  var s = document.querySelector(\'#status\');

  if (s.className == \'success\') {
    // not sure why we\'re hitting this twice in FF, I think it\'s to do with a cached result coming back
    return;
  }

  s.innerHTML = "found you!";
  s.className = \'success\';

  var mapcanvas = document.createElement(\'div\');
  mapcanvas.id = \'mapcanvas\';
  mapcanvas.style.height = \'400px\';
  mapcanvas.style.width = \'560px\';

  document.querySelector(\'article\').appendChild(mapcanvas);

  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var myOptions = {
    zoom: 18,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);

  var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title:"You are here! (at least within a "+position.coords.accuracy+" meter radius)"
  });
}

function error(msg) {
  var s = document.querySelector(\'#status\');
  s.innerHTML = typeof msg == \'string\' ? msg : "failed";
  s.className = \'fail\';

  // console.log(arguments);
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error(\'not supported\');
}
navigator.geolocation.getCurrentPosition(function(posicao) {
   alert(posicao.coords.latitude + ', ' + posicao.coords.longitude); 
});
</script>';
	}
  public function tracking(){
    /*
    //  0.0331833, -51.0592348
    $dados = explode("/", $_GET["urldigitada"]);
    $mapa =  new googlemaps("AIzaSyD5PEcj6kLmlUT7tugLOy9wGygX_ptWGUY");
    $mapa->idMap = "mapadiv";
    $mapa->position["lat"] = "0.03268";
    $mapa->position["lng"] = "-51.058308";
    $mapa->idmap = "idmapa";
    unset($mapa->jsInclude[4]);
    $mapa->mountJs();
      $ponto1 = new mapspoint;
      $ponto1->position = ["lat"=>"0.03268", "lng"=>"-51.058308"];
      $ponto1->mapa = $mapa->idmap;
      $ponto1->title = "meu texto";
    $mapa->points = [$ponto1];
    
    $this->page->bodycontent .= '<div class="mapa"></div>'.$mapa->jsInclude;

    //$this->page->scriptsendpage .= $mapa->addContent.$ponto1->html();
    $this->page->scriptsendpage = 'var map;
 
function initialize() {
    var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
 
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
};
 
initialize();';
    $this->page->render();
    object(googleMaps)#3 (9) {
  ["userKey"]=>
  NULL
  ["styleHeight"]=>
  string(3) "500"
  ["idMap"]=>
  string(4) "mapa"
  ["latitude"]=>
  string(10) "-14.235004"
  ["longitude"]=>
  string(9) "-51.92528"
  ["funcName"]=>
  string(7) "initMap"
  ["zoom"]=>
  string(1) "5"
  ["mapName"]=>
  string(6) "screen"
  ["points"]=>
  array(0) {
  }
}
    */
  $mapa = new googlemaps2;
    $this->page->bodycontent .= $mapa->testamapa();
    $this->page->render();
  }
  public function testamapa(){
    $pagina = new page_site;
      $topmenu = new topmenu_campanha;
    $mapa = new googlemaps2;
    $mapa->divId = "showmap";
    $mapa->mapName = "onde";

   // echo $sql = 'call sp_sel_eleitores("'.$_SESSION["userinfo"]["idlicenca"].'", "'.$_SESSION["userinfo"]["id"].'")';


      $ponto = new pointsMap("AIzaSyD5PEcj6kLmlUT7tugLOy9wGygX_ptWGUY");
      $ponto->compactArray("avenida henrique galucio, 794 centro Macapá-AP Brazil");
      $ponto->geoData();
      $ponto->mapContainer = $mapa->mapName;

      $ponto1 = new pointsMap("AIzaSyD5PEcj6kLmlUT7tugLOy9wGygX_ptWGUY");
      $ponto1->compactArray("avenida 7 de setembro, 1937 paraiso santana-AP Brazil");
      $ponto1->geoData();
      $ponto1->mapContainer = $mapa->mapName;

      $ponto2 = new pointsMap("AIzaSyD5PEcj6kLmlUT7tugLOy9wGygX_ptWGUY");
      $ponto2->compactArray("hildemar maia, 6079 muca macapa-AP Brazil");
      $ponto2->geoData();
      $ponto2->mapContainer = $mapa->mapName;

    $mapa->pointsMap = [$ponto, $ponto1, $ponto2];

    $pagina->bodycontent = $topmenu->html().'<div id="'.$mapa->divId.'" ></div>'.$mapa->html();
    $pagina->render();
  }
} 
?>