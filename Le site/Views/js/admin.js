


$(document).ready(function () {

	var countAdded = 0;

	$("td>.form-control").change(function () {
		$(this).parent().addClass("has-warning");
		var elem = $(this).parent().parent().children(0).children();
		elem.attr("name", "edit" + elem.last().val() + "[]");
		elem.last().attr("name", "edit_lines[]");
	});

	/*$("td>.form-control").outfocus(function(){

	});*/

	// Check if passwords are the same : confirmation
	/*$('.check-password').outfocus(function(){
		var initial_password = $(this).parent().prev().children(0);
	});*/

	$("#add-user").click(function () {
		$("#table-user>tbody").append(
			[
				'<tr class="add-user">' +
					'<td><input class="form-control" type="hidden" name="add_lines[]" value=' + countAdded + '></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Nom"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Prénom"></td>' +
					'<td><input class="form-control" type="date" name="add' + countAdded + '[]"></td>' +
					'<td><input class="form-control" type="email" name="add' + countAdded + '[]" placeholder="E-mail"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Login"></td>' +
					'<td><input class="form-control" type="password" name="add' + countAdded + '[]" placeholder="Mot de passe"></td>' +
					'<td><input class="form-control" type="password" name="add' + countAdded + '[]" class="check-password" placeholder="Confirmer mot de passe"></td>' +
				'</tr>'
			]
		);
		countAdded++;
	});

	$("#add-asso").click(function () {
		$("#table-asso>tbody").append(
			[
				'<tr class="add-asso">' +
					'<td><input class="form-control" type="hidden" name="add_lines[]" value=' + countAdded + '></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Nom"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Description"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Adresse"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Téléphone"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Website"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Latitude"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Longitude"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Theme"></td>' +
				'</tr>'
			]
		);
		countAdded++;
	});

	$("#add-event").click(function () {
		$("#table-event>tbody").append(
			[
				'<tr class="add-event">' +
					'<td><input class="form-control" type="hidden" name="add_lines[]" value=' + countAdded + '></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Nom"></td>' +
					'<td><input class="form-control" type="date" name="add' + countAdded + '[]" placeholder="Date"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Description"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Image"></td>' +
					'<td><input class="form-control" type="text" name="add' + countAdded + '[]" placeholder="Priorité"></td>' +
				'</tr>'
			]
		);
	});
	countAdded++;
});
