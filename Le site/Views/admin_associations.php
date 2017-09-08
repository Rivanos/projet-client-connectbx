<h4>Association</h4>
			<form class="form-horizontal" method="post">
				<input type="hidden" name="table" value="<?= $table ?>">
				<input type="hidden" name="id" value="<?= $association_to_edit->id() ?>">
				<input type="hidden" name="address_id" value="<?= $association_to_edit->address()->id() ?>">
				<div class="form-group">
					<label class="control-label col-md-3" for="name">Nom :</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $association_to_edit->name() ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="address">Adresse :</label>
					<div class="col-md-8">
						<div class="input-group">
							<input type="text" class="form-control" id="address" placeholder="Adresse" value="<?php echo $association_to_edit->id() == '' ? '' : $association_to_edit->address()->to_string(); ?>" readonly>
							<div class="input-group-btn">
								<button class="btn" type="button" data-toggle="collapse" data-target="#assoc-address">
									<i class="glyphicon glyphicon-edit"></i>
								</button>
							</div>
						</div>
						<!-- Collapsable address -->
						<div class="collapse" id="assoc-address">
							<div class="form-group">
								<label class="control-label col-md-3" for="street">Rue :</label>
								<div class="col-md-8">
									<input type="text" class="form-control edit-address" id="street" name="street" placeholder="Rue" value="<?= $association_to_edit->address()->street() ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="number">Numéro :</label>
								<div class="col-md-8">
									<input type="text" class="form-control edit-address" id="number" name="number" placeholder="Numéro" value="<?= $association_to_edit->address()->number() ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="town">Commune :</label>
								<div class="col-md-8">
									<select name="town" id="town" class="form-control edit-address">
										<option value="<?= $association_to_edit->address()->town()->post_code() . ' ' . $association_to_edit->address()->town()->name() ?>"><?= $association_to_edit->address()->town()->name() ?></option>
										<?php foreach($towns as $town){ ?>
											<option value="<?= $town->post_code() . ' ' . $town->name() ?>"><?= $town->name() ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="post-box">Boite postale :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="post-box" name="post_box" placeholder="Boite postale" value="<?= $association_to_edit->address()->post_box() ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="latitude">Latitude :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" value="<?= $association_to_edit->latitude() ?>" readonly>
								</div>
								<label class="control-label col-md-3" for="longitude">Longitude :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" value="<?= $association_to_edit->longitude() ?>" readonly>
								</div>
								<button type="button" class="form-control" id="getCoordinates">Calculer</button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="description">Description :</label>
					<div class="col-md-8">
						<textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"><?= $association_to_edit->description() ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="phone">Téléphone :</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Téléphone" value="<?= $association_to_edit->phone() ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="website">Site web :</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="website" name="website" placeholder="Site web" value="<?= $association_to_edit->website() ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="theme">Catégorie :</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="theme" name="theme" placeholder="Catégorie" value="<?= $association_to_edit->theme() ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-3 col-md-8">
						<button type="submit" class="btn btn-default" name="submit" value="<?= $operation ?>"><?= $add_or_edit ?></
					</div>
				</div>
			</form>


<!-- <div id="associations" class="tab-pane fade <?php /*if($table == 'association'){ ?>in active<?php }?>">
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
					<td><input class="form-control" type="text" value="<?= $association->address()->to_string();?>" maxlength="50"></td>
					<td><input class="form-control" type="text" value="<?= $association->phone();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->website();?>" maxlength="50"></td>
					<td><input class="form-control" type="text" value="<?= $association->latitude();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->longitude();?>"></td>
					<td><input class="form-control" type="text" value="<?= $association->theme();?>"></td>
					<td><input type="checkbox" name="delete[]" value="<?= $association->id(); ?>"></td>
					<td><input type="hidden" value="<?= $i; ?>"></td>
				</tr>
				<?php }*/?>
			</tbody>
		</table>
		<input type="hidden" name="table" value="association">
		<button class="form-control" type="button" id="add-asso">Ajouter</button>
		<input class="form-control" value="Valider les modifications" type="submit" name="edit_submit">
		<input class="form-control" value="Supprimer" type="submit" name="delete_submit">
		<input class="form-control" type="reset" value="Réinitialiser" name="reset">
	</form>
</div> -->

