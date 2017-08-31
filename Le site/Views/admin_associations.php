<div id="associations" class="tab-pane fade <?php if($table == 'association'){ ?>in active<?php }?>">
	<form method="post" class="form-group">
		<table id="table-asso">
			<thead>
				<tr>
					<th></th>
					<th>Nom</th>
					<th>Description</th>
					<th>Adresse</th>
					<th>Tel</th>
					<th>Website</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Theme</th>
					<th>Supprimer</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tab_associations as $i=>$association) {?>
				<tr>
					<td><input type="hidden" value="<?= $association->id();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->name();?>" maxlength="50"></td>
					<td><input class="form-control" type="text" value="<?= $association->description();?>" maxlength="1000"></td>
					<td><input class="form-control" type="text" value="<?= $association->address();?>" maxlength="50"></td>
					<td><input class="form-control" type="text" value="<?= $association->phone();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->website();?>" maxlength="50"></td>
					<td><input class="form-control" type="text" value="<?= $association->latitude();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->longitude();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->theme();?>"></td>
					<td><input type="checkbox" name="delete[]" value="<?= $association->id(); ?>"></td>
					<td><input type="hidden" value="<?= $i; ?>"></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<input type="hidden" name="table" value="association">
		<button class="form-control" type="button" id="add-asso">Ajouter</button>
		<input class="form-control" value="Valider les modifications" type="submit" name="edit_submit">
		<input class="form-control" value="Supprimer" type="submit" name="delete_submit">
		<input class="form-control" type="reset" value="Réinitialiser" name="reset">
	</form>
</div>