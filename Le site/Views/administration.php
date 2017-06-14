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
		<form action="">
			<table>
				<thead>
					<tr>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	
	<!-- onglet Associations -->
	<div id="associations" class="tab-pane fade">
		<form method="post">
<table>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Description</th>
			<th>Adresse</th>
			<th>Tel</th>
			<th>Website</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tabAssociations as $i=>$association) {?>
			<tr>
				<td><input type="text" name="assoName" onchange="showEdit(this);" value="<?php echo $association->name();?>"></td>
				<td><input type="text" name="assoDescri" onchange="showEdit(this);" value="<?php echo $association->description();?>"></td> 
				<td><input type="text" name="assoAddress" onchange="showEdit(this);" value="<?php echo $association->address();?>"></td>
				<td><input type="text" name="assoPhone" onchange="showEdit(this);" value="<?php echo $association->phone();?>"></td>
				<td><input type="text" name="assoWebsite" onchange="showEdit(this);" value="<?php echo $association->website();?>"></td>
				<td><input type="checkbox" value="<?php echo $i; ?>" id="assoEdit<?php echo $i;?>"></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<input type="hidden" name="redirection" value="association">
<input value="Ajouter" type="submit" name="add">
<input value="Valider les modifications" type="submit" name="edit">
<input value="Supprimer" type="submit" name="delete">
</form>		
	</div>

	<!-- onglet Événements -->
	<div id="events" class="tab-pane fade">
		<form method="post">
<table>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Date</th>
			<th>Description</th>
			<th>Image</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tabEvents as $i=>$event) {?>
			<tr>
				<td><input type="text" name="event" onchange="showEdit(this)" value="<?php echo $event->name();?>"></td>
				<td><input type="text" name="event" onchange="showEdit(this)" value="<?php echo $event->date();?>"></td>
				<td><input type="text" name="event" onchange="showEdit(this)" value="<?php echo $event->description();?>"></td>
				<td><input type="text" name="event" onchange="showEdit(this)" value="<?php echo $event->image();?>"></td>
				<td><input type="checkbox" value="<?php echo $i; ?>" id="eventEdit<?php echo $i;?>"></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<input value="Ajouter" type="submit" name="add">
<input value="Valider les modifications" type="submit" name="edit">
<input value="Supprimer" type="submit" name="delete">
</form>
		
	</div>
</div>

<?php  ?>

