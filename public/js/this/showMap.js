 function @nomefunction() {
       var map = new google.maps.Map(document.getElementById("@divmapa"), 
       	{center: {lat: @lat, lng: @lng},
          zoom: @zoom
        });
       @pontos
   };