<h2>Bienvenue sur la page d'administration</h2>
<!-- Navigation tabs -->
<ul class="nav nav-tabs">
	<li<?php if($table == 'user' || $table == 'initial'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#users">Utilisateurs</a></li>
	<li<?php if($table == 'association'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#associations">Associations</a></li>
	<li<?php if($table == 'event'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#events">Événements</a></li>
</ul>
<!-- contenu onglets -->
<div class="tab-content">
	<!-- onglet Utilisateurs -->
	<div id="users" class="tab-pane fade <?php if($table == 'user' || $table == 'initial'){ ?>in active<?php }?>">
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
						<th>Confirmation</th>
						<th>Supprimer</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tab_users as $i=>$user){ ?>
					<tr>
						<td><input type="hidden" value="<?= $user->id(); ?>"></td>
						<td><input class="form-control" type="text" value="<?= $user->name(); ?>" maxlength="15" pattern="^[a-zA-Z\s]+$" title="Seules des lettres sont acceptées."></td>
						<td><input class="form-control first-name" type="text" value="<?= $user->first_name(); ?>" maxlength="50" pattern="^[a-zA-Z\s]+$" title="Veuillez entrer un nom uniquement en lettres."></td>
						<td><input class="form-control" type="date" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}" min="<?= $date_min; ?>" max="<?= $date_max; ?>" value="<?= substr($user->birthdate(), 0, 10); ?>"></td>
						<td><input class="form-control" type="email" value="<?= $user->email(); ?>" maxlength="50" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Veuillez entrer une adresse email valide."></td>
						<!-- ^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$ :: regexp pour adresse mail -->
						<td><input class="form-control" type="text" value="<?= $user->login(); ?>" maxlength="50" pattern="^[a-z0-9A-Z._%+-]{4,50}$" title=""></td>
						<td><input class="form-control" type="password" placeholder="Nouveau mot de passe" maxlength="50" pattern="^[a-z0-9A-Z._%+-]{4,50}$|^.{0}$" title="Le mot de passe doit posséder 4 caractères minimum."></td>
						<td><input class="form-control" type="password" placeholder="Confirmer" maxlength="50"></td>
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
	<!-- onglet Événements -->
	<div id="events" class="tab-pane fade <?php if($table == 'event'){ ?>in active<?php }?>">
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
						<td><input class="form-control" type="text" value="<?= substr($event->date(), 0, 10); ?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->description();?>"></td>
						<td><input class="form-control" type="text" value="<?= $event->image();?>"></td>
						<td><input class="form-control" type="checkbox" value="<?= $event->nEvent();?>" <?php if($event->nEvent() == 1) echo "checked";?>></td>
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
