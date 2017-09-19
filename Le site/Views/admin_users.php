<h4>Utilisateur</h4>
<form class="form-horizontal" method="post">
	<input type="hidden" name="table" value="<?= $table ?>">
	<input type="hidden" name="id" value="<?= $user_to_edit->id() ?>">
	<div class="form-group">
		<label class="control-label col-md-3" for="name">Nom :</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $user_to_edit->name() ?>" pattern="^[a-zA-Z\s]+$" title="Seules des lettres sont acceptées.">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3" for="firstName">Prénom :</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="firstName" name="first_name" placeholder="Prénom" value="<?= $user_to_edit->first_name() ?>" pattern="^[a-zA-Z\s]+$" title="Seules des lettres sont acceptées.">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3" for="birthDate">Date de naissance :</label>
		<div class="col-md-8">
			<input type="date" class="form-control" id="birthDate" name="birthdate" value="<?= substr($user_to_edit->birthdate(), 0, 10) ?>" pattern="^[0-9]{4}-[0-9]{2}-[0-9]{2}" min="<?= $date_min; ?>" max="<?= $date_max; ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3" for="email">Email :</label>
		<div class="col-md-8">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user_to_edit->email() ?>" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Veuillez entrer une adresse email valide.">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3" for="login">Login* :</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?= $user_to_edit->login() ?>" maxlength="50" pattern="^[a-z0-9A-Z._%+-]{4,50}$" title="" required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3" for="pwd">Mot de passe<?php echo $operation == 'add' ? '*' : '' ?> :</label>
		<div class="col-md-8">
			<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Nouveau mot de passe" value=""  maxlength="50" pattern="^[a-z0-9A-Z._%+-]{4,50}$|^.{0}$" title="Le mot de passe doit posséder 4 caractères minimum." <?= $required ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-md-3" for="pwd-confirm">Confirmation<?php echo $operation == 'add' ? '*' : '' ?> :</label>
		<div class="col-md-8">
			<input type="password" class="form-control" id="pwd-confirm" name="pwd-confirm" placeholder="Confirmer le nouveau mot de passe" value=""  maxlength="50" pattern="^[a-z0-9A-Z._%+-]{4,50}$|^.{0}$" title="Le mot de passe doit posséder 4 caractères minimum." <?= $required ?>>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-3 col-md-8">
			<button type="submit" class="btn btn-default" name="submit" value="<?= $operation ?>"><?= $add_or_edit ?></
		</div>
	</div>
</form>

<!--<div id="users" class="tab-pane fade <?php /*if($table == 'user' || $table == 'initial'){ ?>in active<?php }?>">
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
					 ^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$ :: regexp pour adresse mail
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
	
	
		<ul class="list-group">
			<?php foreach ($tab_users as $key => $user) { ?>
				<a href="index.php?action=admin&id=<?= $user->id() ?>" class="list-group-item"><?= $user->name() . ' ' . $user->first_name() ?></a>
			<?php } */?>
		</ul>
</div>-->

