<h2>Bienvenue sur la page d'administration</h2>

<form method="post">
<table>
	<caption>Associations</caption>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Description</th>
			<th>Adresse</th>
			<th>Tel</th>
			<th>Website</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tabAssociations as $i=>$association) {?>
			<tr>
				<td><?php echo $association->name();?></td>
				<td><?php echo $association->description();?></td>
				<td><?php echo $association->address();?></td>
				<td><?php echo $association->phone();?></td>
				<td><?php echo $association->website();?></td>
				<td><input type="checkbox" value="<?php echo $i; ?>"></td>
				<td><button>[x]</button></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<input type="hidden" name="redirection" value="association">
<input value="Ajouter" type="submit" name="add">
<input value="Modifier" type="submit" name="edit">
</form>

<?php  ?>

<form method="post">
<table>
	<caption>Événements</caption>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Date</th>
			<th>Description</th>
			<th>Image</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tabEvents as $i=>$event) {?>
			<tr>
				<td><?php echo $event->name();?></td>
				<td><?php echo $event->date();?></td>
				<td><?php echo $event->description();?></td>
				<td><?php echo $event->image();?></td>
				<td><input type="checkbox" value="<?php echo $i; ?>"></td>
				<td><button>[x]</button></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<input type="hidden" name="redirection" value="event">
<input value="Ajouter" type="submit" name="add">
<input value="Modifier" type="submit" name="edit">
</form>
