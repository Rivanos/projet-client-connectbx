<h4>Événement</h4>
			<form class="form-horizontal" method="post">
				<input type="hidden" name="table" value="<?= $table ?>">
				<input type="hidden" name="id" value="<?= $event_to_edit->id() ?>">
				<input type="hidden" name="address_id" value="<?= $event_to_edit->address()->id() ?>">
				<div class="form-group">
					<label class="control-label col-md-3" for="name">Nom :</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $event_to_edit->name() ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="date">Date :</label>
					<div class="col-md-8">
						<input type="date" class="form-control" id="date" name="date" placeholder="Date" value="<?= $event_to_edit->date() ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="address">Adresse :</label>
					<div class="col-md-8">	
						<div class="input-group">
							<input type="text" class="form-control" id="address" placeholder="Adresse" value="<?php echo $event_to_edit->id() == '' ? '' : $event_to_edit->address()->to_string(); ?>" readonly>
							<div class="input-group-btn">
								<button class="btn" type="button" data-toggle="collapse" data-target="#event-address">
									<i class="glyphicon glyphicon-edit"></i>
								</button>
							</div>
						</div>
						<!-- Collapsable address of event -->
						<div class="collapse" id="event-address">
							<div class="form-group">
								<label class="control-label col-md-3" for="street">Rue :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="street" name="street" placeholder="Rue" value="<?= $event_to_edit->address()->street() ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="number">Numéro :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="number" name="number" placeholder="Numéro" value="<?= $event_to_edit->address()->number() ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="town">Commune :</label>
								<div class="col-md-8">
									<select name="town" id="town" class="form-control">
										<option value="<?= $event_to_edit->address()->town()->post_code() ?>"><?= $event_to_edit->address()->town()->name() ?></option>
										<?php foreach($towns as $town){ ?>
											<option value="<?= $town->post_code() ?>"><?= $town->name() ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3" for="post-box">Boite postale :</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="post-box" name="post_box" placeholder="Boite postale" value="<?= $event_to_edit->address()->post_box() ?>">
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="description">Description :</label>
					<div class="col-md-8">
						<textarea class="form-control" id="description" name="description" rows="4" placeholder="Description"><?= $event_to_edit->description() ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3" for="image">Image :</label>
					<div class="col-md-8">
						<input type="text" class="form-control" id="image" name="image" placeholder="Image" value="<?= $event_to_edit->image() ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-3 col-md-8">
						<button type="submit" class="btn btn-default" name="submit" value="<?= $operation ?>"><?= $add_or_edit ?></button>
					</div>
				</div>
			</form>	


	<!-- <div id="events" class="tab-pane fade <?php /* if($table == 'event'){ ?>in active<?php }?>">
		<form method="post" class="form-group">
			<table id="table-event">
				<thead>
					<tr>
						<th></th>
						<th>Nom</th>
						<th>Date</th>
						<th>Adresse</th>
						<th>Description</th>
						<th>Image</th>
						<th>Priorité</th>
						<th>Supprimer</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php /*foreach ($tab_events as $i=>$event) {?>
					<tr>
						<td><input type="hidden" value="<?= $event->id();?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->name();?>"></td>
						<td><input class="form-control" type="text" value="<?= substr($event->date(), 0, 10); ?>"></td>
						<td>
							<div class="input-group">
								<input class="form-control" type="text" value="<?= $event->address()->to_string(); ?>" readonly>
								<span class="input-group-btn"><button class="btn btn-default" type="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></span>
							</div></td>
						<td><input class="form-control" type="text" value="<?= $event->description();?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->image();?>"></td>
						<td><input class="form-control" type="checkbox" value="<?= $event->priority();?>" <?php if($event->priority() == 1) echo "checked";?>></td>
						<td><input type="checkbox" name="delete[]" value="<?= $event->id();?>"></td>
						<td><input type="hidden" value="<?= $i; ?>"></td>
					</tr>
					<?php }*/?>
				</tbody>
			</table>
			<input type="hidden" name="table" value="event">
			<button class="form-control" type="button" id="add-event">Ajouter</button>
			<input class="form-control" value="Valider les modifications" type="submit" name="edit_submit">
			<input class="form-control" value="Supprimer" type="submit" name="delete_submit">
			<input class="form-control" type="reset" value="Réinitialiser" name="reset">
		</form>

	</div>
</div>
		</div>
	</div>
</div> -->