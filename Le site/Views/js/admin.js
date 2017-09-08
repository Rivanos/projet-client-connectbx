


$(document).ready(function () {

	if($("#administration").length > 0){

		// Checks the pattern of input and adds class 
		$(".form-control").change(function () {
			var patt = new RegExp($(this).attr("pattern"));
			var isPattOk = patt.test($(this).val());
			console.log(patt + " " + $(this).val() + " " + isPattOk);
			if(isPattOk){
				$(this).parent().addClass("has-success");
			} else {
				$(this).parent().addClass("has-error");
			}
		});

		// Check if passwords are the same : confirmation
		/*$('.check-password').outfocus(function(){
			var initial_password = $(this).parent().prev().children(0);
		});*/

		$('#add-user').click(function () {
			$.post("Controllers/AjaxControllers/AddUserController.php", function (data) {
				$('#admin_form').html(data);
			});
		});

		$('#add-association').click(function () {
			$.post("Controllers/AjaxControllers/AddAssociationController.php", function (data) {
				$('#admin_form').html(data);
			});
		});

		$('#add-event').click(function () {
			$.post("Controllers/AjaxControllers/AddEventController.php", function (data) {
				$('#admin_form').html(data);
			});
		});

		$('.edit-user').click(function (event) {
			var id = $(this).attr('id');
			$.post("Controllers/AjaxControllers/EditUserController.php", { id : id }, function (data) {
				$('#admin_form').html(data);
			});
		});

		$('.edit-association').click(function (event) {
			var id = $(this).attr('id');
			$.post("Controllers/AjaxControllers/EditAssociationController.php", { id : id }, function (data) {
				$('#admin_form').html(data);
			});
		});

		$('.edit-event').click(function (event) {
			var id = $(this).attr('id');
			$.post("Controllers/AjaxControllers/EditEventController.php", { id : id }, function (data) {
				$('#admin_form').html(data);
			});
		});

		$('.delete-user').click(function () {
			event.stopPropagation();
			var id = $(this).parent().attr('id');
			$.post("Controllers/AjaxControllers/DeleteUserController.php", { id : id });
		});

		$('.delete-association').click(function () {
			event.stopPropagation();
			var id = $(this).parent().attr('id');
			$.post("Controllers/AjaxControllers/DeleteAssociationController.php", { id : id });
		});

		$('.delete-event').click(function () {
			event.stopPropagation();
			var id = $(this).parent().attr('id');
			$.post("Controllers/AjaxControllers/DeleteEventController.php", { id : id });
		});

		// GEOCODE
		var geocoder;
		var map;
		function initialize () {
			geocoder = new google.maps.Geocoder();
			// var latlng = new google.maps.LatLng(-34.397, 150.644);
		 //   var mapOptions = {
		 //     zoom: 8,
		 //     center: latlng
		 //   }
		 //   map = new google.maps.Map(document.getElementById('map'), mapOptions);
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
