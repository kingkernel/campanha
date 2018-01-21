<?php
function dadosmapa(){
  $mapa= '<style>html, body {height: 95%; margin: 0;padding: 0;}</style>
    <div id="map"  style="height: 500px;"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById(\'map\'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y&callback=initMap" async defer></script>'
return $mapa;
}
//dadosmapa();
?>
<!-- 
<style>html, body {height: 95%; margin: 0;padding: 0;}</style>
    <div id="map"  style="height: 500px;"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzkJ0uCXjHF8KLentBR7aFWOzzsMxRa9Y&callback=initMap" async defer></script>
-->