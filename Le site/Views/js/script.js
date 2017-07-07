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



  var myArray = [];
  var add = 1;
  var commune = "commune"+add;

  while (add <= 3) {
    var commune = "commune"+add;
    if (document.getElementById(commune).checked) {
      var address = document.getElementById(commune).value;
      myArray.push(address);
    }

    else if (!document.getElementById(commune).checked) {
      var index = myArray.indexOf(document.getElementById(commune).value);
      if (index > -1) {
        myArray.splice(index, 1);
      }
    }

    add++;
  }

  console.log(myArray);

  /*if (document.getElementById("commune1").checked) {
    var address = document.getElementById("Ixelles").value;
    myArray.push(address);
  }

  if (document.getElementById("commune2").checked) {
    var address = document.getElementById("commune2").value;
    myArray.push(address);
  }

  if (document.getElementById("commune3").checked) {
    var address = document.getElementById("commune3").id;
    myArray.push(address);
  }*/

  var iteration = 0;

  while (iteration < myArray.length) {

  geocoder.geocode({'address': myArray[iteration]}, function(results, status) {
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
  iteration++;
}
}