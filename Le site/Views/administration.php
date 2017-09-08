
<!-- Navigation tabs -->
<div class="container-fluid" id="administration">
	<div class="row">
		<div class="col-md-4">
			<ul class="nav nav-tabs">
				<li<?php if($table == 'user' || $table == 'initial'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#users">Utilisateurs</a></li>
				<li<?php if($table == 'association'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#associations">Associations</a></li>
				<li<?php if($table == 'event'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#events">Événements</a></li>
			</ul>
			<!-- contenu onglets -->
			<div class="tab-content">
				<div id="users" class="tab-pane fade <?php if($table == 'user' || $table == 'initial'){ ?>in active<?php }?>">
					<ul class="list-group">
						<li class="list-group-item" id="add-user">Ajouter un utilisateur</li>
						<?php foreach ($tab_users as $key => $user) { ?>
						<li id="<?= $user->id() ?>" class="edit-user list-group-item"><?= $user->name() . ' ' . $user->first_name() ?><span class="badge delete-user"><span class="glyphicon glyphicon-trash"></span></span></li>
						<?php } ?>
					</ul>
				</div>
				<div id="associations" class="tab-pane fade <?php if($table == 'association'){ ?>in active<?php }?>">
					<ul class="list-group">
						<li class="list-group-item" id="add-association">Ajouter une association</li>
						<?php foreach ($tab_associations as $key => $association) { ?>
						<li id="<?= $association->id() ?>" class="edit-association list-group-item"><?= $association->name() ?><span class="badge delete-association"><span class="glyphicon glyphicon-trash"></span></span></li>
						<?php } ?>
					</ul>
				</div>
				<div id="events" class="tab-pane fade <?php if($table == 'event'){ ?>in active<?php }?>">
					<ul class="list-group">
						<li class="list-group-item" id="add-event">Ajouter un événement</li>
						<?php foreach ($tab_events as $key => $event) { ?>
						<li id="<?= $event->id() ?>" class="edit-event list-group-item"><?= $event->name() ?><span class="badge delete-event"><span class="glyphicon glyphicon-trash"></span></span></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h2>Bienvenue sur la page d'administration</h2>
			<div id="admin_form">
				
			</div>
		</div>
	</div>
</div>

			
		