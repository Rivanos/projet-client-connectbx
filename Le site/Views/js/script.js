function getUrlVars() { //simulate $_GET in js
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}



var search = getUrlVars()["search"]; //define $_GET


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

    

    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        geocodeAddress(geocoder, map);
    });
}




function geocodeAddress(geocoder, resultsMap) {

    /*var selected_towns = [];
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
    }*/

    var check = document.forms[1];
    var selected_towns = [];
    var i;
    for (i=0; i < check.length; i++) {
        if (check[i].checked) {
            selected_towns.push(check[i].value);
        }
        /*else {
            var index = myArray.indexOf(check[i].value);
            myArray.splice(index, 1);
        }*/
    }

    selected_towns.push(search);

    console.log(selected_towns);


    if (selected_towns.length > 1) {

        var iteration = 0;

        $.post({
            data: {towns:selected_towns},
            url: "Views/ajax/search_assoc_by_towns_themes.php",
            success: function (associations) {
                $("#test").html(associations);
            }
        })

        while (iteration < selected_towns.length) {

            geocoder.geocode({
                'address': selected_towns[iteration]
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
}