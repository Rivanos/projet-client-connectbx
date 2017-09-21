


$(document).ready(function () {

	if($("#administration").length > 0){

		// Checks the pattern of input and adds class 
		$("body").on("input", ".form-control", function () {
			var patt = new RegExp($(this).attr("pattern"));
			var isPattOk = patt.test($(this).val());

			if($(this).attr("required") && $(this).val().length === 0) isPattOk = false; 

			var allClass = $(this).parent().attr("class");
			oldClass = allClass.split(" ");

			if(isPattOk){
				$(this).parent().attr("class", oldClass[0] + " has-success");
			} else {
				$(this).parent().attr("class", oldClass[0] + " has-error");
			}
		});

		// Check if passwords are the same : confirmation
		$("body").on("input", "#pwd-confirm", function(){
			var allClass = $(this).parent().attr("class");
			oldClass = allClass.split(" ");
			if($("#pwd").val() === $("#pwd-confirm").val()){
				$(this).parent().attr("class", oldClass[0] + " has-success");
			} else {
				$(this).parent().attr("class", oldClass[0] + " has-warning");
			}
		});

		$("body").on("input", "#real-theme ~ input", function () {
			$('#real-theme').val($('#real-theme ~ input').val());
		});

		$('.add').click(function () {
			var entity = $(this).attr('id');
			entity = entity[0].toUpperCase() + entity.substring(1);
			addEntity(entity);
		});

		$('.edit').click(function () {
			var idClicked = $(this).attr('id');
			var parameters = idClicked.split('-');
			var entity = parameters[0][0].toUpperCase() + parameters[0].substring(1);
			var id = parameters[1];
			editEntity(entity, id);
		});

		$('.delete').click(function (event) {
			event.stopPropagation();
			var idClicked = $(this).parent().attr('id');
			var parameters = idClicked.split('-');
			var entity = parameters[0][0].toUpperCase() + parameters[0].substring(1);
			var id = parameters[1];
			deleteEntity(entity, id);
			location.reload(true);
		});

		function addEntity(entity) {
			$.post("Controllers/AjaxControllers/Add" + entity + "Controller.php", { ajax : true }, function (data) {
				$('#admin_form').html(data);
			});
		}

		function editEntity(entity, id){
			$.post("Controllers/AjaxControllers/Edit" + entity + "Controller.php", { id : id, ajax : true }, function (data) {
				$('#admin_form').html(data);
			});	
		}

		function deleteEntity(entity, id){
			$.post("Controllers/AjaxControllers/Delete" + entity + "Controller.php", { id : id });
		}


		// GEOCODE
		var geocoder;
		var map;
		function initialize () {
			geocoder = new google.maps.Geocoder();
			return geocoder;
		}

		$("body").on("click", "#getCoordinates", function () {
			var geocoder = initialize();
			codeAddress(geocoder);
		});

		function codeAddress (geocoder) {
			var address = document.getElementById('address').value;
    		geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	      	console.log(results[0].geometry.location);
	         document.getElementById('latitude').value = results[0].geometry.location.lat();
	         document.getElementById('longitude').value = results[0].geometry.location.lng();
	      } else {
	         alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
		}

		$("body").on("focusout", '.edit-address', updateAddressInput);

		function updateAddressInput(){
			var street, number, town;
			street = $('#street').val();
			number = $('#number').val();
			town = $('#town').val();
			$('#address').val(street + ' ' + number + ', ' + town);
		}
	}
});
