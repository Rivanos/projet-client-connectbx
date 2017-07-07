<h2>Bienvenue sur la page d'administration</h2>
<!-- Navigation tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#users">Utilisateurs</a></li>
	<li><a data-toggle="tab" href="#associations">Associations</a></li>
	<li><a data-toggle="tab" href="#events">Événements</a></li>
</ul>
<!-- contenu onglets -->
<div class="tab-content">
	<!-- onglet Utilisateurs -->
	<div id="users" class="tab-pane fade in active">
		<form method="post" class="form-group">
			<table id="table-user">
				<thead>
					<tr>
						<th></th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Date de naissance</th>
						<th>Mail</th>
						<th>Pseudo</th>
						<th>Mot de passe</th>
						<th>Supprimer</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tab_users as $i=>$user){ ?>
					<tr>
						<td><input type="hidden" value="<?= $user->id(); ?>"></td>
						<td><input class="form-control" type="text" value="<?= $user->name(); ?>"></td>
						<td><input class="form-control" type="text" value="<?= $user->first_name(); ?>"></td>
						<td><input class="form-control" type="date" value="<?= substr($user->birthdate(), 0, 10); ?>"></td>
						<td><input class="form-control" type="email" value="<?= $user->email(); ?>"></td>
						<td><input class="form-control" type="text" value="<?= $user->login(); ?>"></td>
						<td><input class="form-control" type="password"></td>
						<td><input type="checkbox" name="delete[]" value="<?= $user->id(); ?>"></td>
						<td><input type="hidden" value="<?= $i; ?>"></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<input type="hidden" name="table" value="user">
			<button class="form-control" type="button" id="add-user">Ajouter</button>
			<input class="form-control" value="Valider les modifications" type="submit" name="edit_submit">
			<input class="form-control" value="Supprimer" type="submit" name="delete_submit">
			<input class="form-control" type="reset" value="Réinitialiser" name="reset">
		</form>
	</div>

	<!-- onglet Associations -->
	<div id="associations" class="tab-pane fade">
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
						<td><input class="form-control" type="text" value="<?= $association->name();?>"></td>
						<td><input class="form-control" type="text" value="<?= $association->description();?>"></td>
						<td><input class="form-control" type="text" value="<?= $association->address();?>"></td>
						<td><input class="form-control" type="text" value="<?= $association->phone();?>"></td>
						<td><input class="form-control" type="text" value="<?= $association->website();?>"></td>
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
	<!-- onglet Événements -->
	<div id="events" class="tab-pane fade">
		<form method="post" class="form-group">
			<table id="table-event">
				<thead>
					<tr>
						<th></th>
						<th>Nom</th>
						<th>Date</th>
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
						<td><input class="form-control" type="text" value="<?= $event->date();?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->description();?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->image();?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->nEvent();?>"></td>
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
<?php  ?>
