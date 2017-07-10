function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 50.8503463, lng: 4.351721099999963}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

function geocodeAddress(geocoder, resultsMap) {

  if (document.getElementById("Ixelles").checked) {
    var address = document.getElementById("Ixelles").id;
  }

  else if (document.getElementById("Forest, Brussels").checked) {
    var address = document.getElementById("Forest, Brussels").id;
  }

  else if (document.getElementById("Anderlecht").checked) {
    var address = document.getElementById("Anderlecht").id;
  }
  
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}