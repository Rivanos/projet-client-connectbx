function getUrlVars() { //simulate $_GET in js
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}



var search = getUrlVars()["search"]; //define $_GET

if (typeof search == "undefined") {
  search = 0;
}


function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
            lat: 50.8503463,
            lng: 4.351721099999963
        }
    });
    var geocoder = new google.maps.Geocoder();

    

    window.onload = geocodeAddress(geocoder, map);
      
    

    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
    });
}




function geocodeAddress(geocoder, resultsMap) {



    var myArray = [];
    var add = 1;
    var commune = "commune" + add;

    while (add <= 3) {
        var commune = "commune" + add;
        if (document.getElementById(commune).checked) {
            var address = document.getElementById(commune).value;
            myArray.push(address);
        } else if (!document.getElementById(commune).checked) {
            var index = myArray.indexOf(document.getElementById(commune).value);
            if (index > -1) {
                myArray.splice(index, 1);
            }
        }

        add++;
    }

    console.log(search);
    myArray.push(search);

    console.log(myArray);

    var iteration = 0;

    while (iteration < myArray.length) {

        geocoder.geocode({
            'address': myArray[iteration]
        }, function(results, status) {
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