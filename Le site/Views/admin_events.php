	<div id="events" class="tab-pane fade <?php if($table == 'event'){ ?>in active<?php }?>">
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
					<?php foreach ($tab_events as $i=>$event) {?>
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
					<?php }?>
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