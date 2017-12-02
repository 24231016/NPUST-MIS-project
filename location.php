<?php $_GET["email"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 10px;
        padding-left: 10px;
      }
    </style>
</head>
<body>

<div class="container-fluid">
  
  <div class="row">
    
    <div class="col-md-4" style="background-color:pink;">
        <div id="floating-panel">
        <input id="address" type="textbox" placeholder="捜尋您欲開團的地點">
        <input id="submit" type="button" value="搜尋">
        <br>

        <input type="hidden" id="lat"><br>
        <input type="hidden" id="lng">
      </div>
    </div>
    <div class="col-md-8">
       <div id="map" style="width:100%;height:800px;"></div>
    </div>
  </div>
</div>
     <script>
      var delhi = {lat: 22.6474, lng: 120.612};
       
       
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: delhi
        });
        // var marker1 = new google.maps.Marker({
        //   position: delhi,
        //   map: map,
        //   draggable: true
        // });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
           map.setZoom(15);
          geocodeAddress(geocoder, map);
        });
        // Create the search box and link it to the UI element.
        var input = document.getElementById('address');
        var searchBox = new google.maps.places.SearchBox(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        /*var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

           Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });*/

      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
           
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
            
            document.getElementById('lat').value=marker.getPosition().lat();
            document.getElementById('lng').value=marker.getPosition().lng();
            var lat1 = document.getElementById('lat').value;
            var lng1 = document.getElementById('lng').value;
            var infowindow = new google.maps.InfoWindow({
            content: "<a href='http://140.127.32.18/activity/activity-add.php?lat="+lat1+"&lng="+lng1+"&loc="+address+"&email=<?php echo $_GET["email"]; ?>'>確認地點</a>"
        });
            infowindow.open(resultsMap,marker);
             
            
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
      function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
}
    </script>
    <!-- Add your API below-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtjBm4X_MLTQD9oUALRr4_w5_U02uW-1g&callback=initMap&libraries=places">
    </script>
</body>
</html>
