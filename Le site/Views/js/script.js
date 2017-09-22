function getUrlVars() { //simulate $_GET in js
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}



//var townHome = getUrlVars()["town"]; //define $_GET
//var themesHome = getUrlVars()["themes"];

var markers = [];

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
            lat: 50.8503463,
            lng: 4.351
        }
    });
    //addMarker(map);
    //var geocoder = new google.maps.Geocoder();

    if($("#json").length > 0){
      console.log($("#json").val());
      var json = JSON.parse($("#json").val());
      json.forEach( function(association) {
        var string = association["name"];
        var infowindow = new google.maps.InfoWindow({
            content: string
        });
        var marker = new google.maps.Marker({
            map: map,
            position: {lat: parseFloat(association["latitude"]), lng:  parseFloat(association["longitude"])},
            //title: string,
            infowindow: infowindow,
        });
        markers.push(marker);
        marker.addListener('mouseover', function () {
            this.infowindow.open(map, this);
        });
        marker.addListener('mouseout', function () {
            this.infowindow.close(map, this);
        });
        });
      
      //addMarker(map);
    }


    //window.onload = geocodeAddress(geocoder, map);



    document.getElementById('submitMap').addEventListener('click', function(event) {
        event.preventDefault();
        //geocodeAddress(geocoder, map);
        console.log(markers);
        addMarker(map);
        //window.location.href =  window.location.href.split("?")[0];
    });
}

function addMarker(map){
  var check = document.getElementsByName("communeCheckbox");
  var selected_towns = new Array();
  for (var i=0; i < check.length; i++) {
      if (check[i].checked) {
          selected_towns.push(check[i].value);
        }
  };

  var check2 = document.getElementsByName("themesCheckbox");
  var selected_themes = new Array();
  for (var i=0; i < check2.length; i++) {
      if (check2[i].checked) {
          selected_themes.push(check2[i].value);
        }
  };

  //console.log(selected_themes);

  //selected_towns.push(townHome);
  //selected_themes.push(themesHome);

  //document.cookie = "associations=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=../ajax/;";
  //var testAssociations;

      $.post({
          data: {towns:selected_towns,
                themes:selected_themes},
          url: "Views/ajax/search_assoc_by_towns_themes.php",
          success: function (associations) {
            //console.log("Success");
            //console.log(document.cookie);
            //$("#test").html(associations);
          }
      });

      $(document).ajaxSuccess(function (event, xhr, settings, testAssociations) {
            if(settings.url == "Views/ajax/search_assoc_by_towns_themes.php") {
              for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
              }
                markers = [];
                //$.getJSON("Views/ajax/associations.json", function (output) {
                    var iteration = 0;
                    testAssociations = JSON.parse(testAssociations);
                    //console.log(testAssociations);
                    while (iteration < testAssociations.length) {
                      //console.log(iteration);
                        var string = testAssociations[iteration]["name"];
                        var infowindow = new google.maps.InfoWindow({
                            content: string
                        });
                        var lat = parseFloat(testAssociations[iteration]["latitude"]);
                        var long = parseFloat(testAssociations[iteration]["longitude"]);
                            //if (status === 'OK') {
                                //resultsMap.setCenter(output["coordinates"][iteration]);
                                //console.log(output["coordinates"][iteration]["latitude"]);
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: {lat: lat, lng: long},
                                    //title: string,
                                    infowindow: infowindow,
                                });
                                markers.push(marker);
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
                //})
            }
        });
    }
  //}
