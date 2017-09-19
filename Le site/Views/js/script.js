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
            lng: 4.351
        }
    });
    //var geocoder = new google.maps.Geocoder();



    //window.onload = geocodeAddress(geocoder, map);



    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        //geocodeAddress(geocoder, map);
        addMarker(map);
    });
}

function addMarker(map){
  var check = document.getElementsByName("communeCheckbox[]");
  var selected_towns = [];
  var i;
  for (i=0; i < check.length; i++) {
      if (check[i].checked) {
          selected_towns.push(check[i].value);
        }
  }

  selected_towns.push(search);

  if (selected_towns.length > 1) {

      $.post({
          data: {towns:selected_towns},
          url: "Views/ajax/search_assoc_by_towns_themes.php",
          success: function (associations) {
            //console.log("Success");
            //$("#test").html(associations);
          }
      });

      $(document).ajaxSuccess(function (event, xhr, settings) {
            if(settings.url == "Views/ajax/search_assoc_by_towns_themes.php") {
                $.getJSON("Views/ajax/associations.json", function (output) {
                    var iteration = 0;
                    while (iteration < output["coordinates"].length) {
                      console.log(iteration);
                        var string = output["name"][iteration];
                        var infowindow = new google.maps.InfoWindow({
                            content: string
                        });
                        var lat = parseFloat(output["coordinates"][iteration]["latitude"]);
                        var long = parseFloat(output["coordinates"][iteration]["longitude"]);
                            //if (status === 'OK') {
                                //resultsMap.setCenter(output["coordinates"][iteration]);
                                //console.log(output["coordinates"][iteration]["latitude"]);
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: {lat: lat, lng: long},
                                    //title: string,
                                    infowindow: infowindow,
                                });
                                marker.addListener('mouseover', function () {
                                    this.infowindow.open(map, this);
                                });
                                marker.addListener('mouseout', function () {
                                    this.infowindow.close(map, this);
                                });
                            /*} else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }
                        ;*/
                        iteration++;
                    }
                })
            }
        });
    }
  }
