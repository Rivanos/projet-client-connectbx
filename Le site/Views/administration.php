
<!-- Navigation tabs -->
<div class="container-fluid" id="administration">
	<div class="row">
		<div class="col-md-4">
			<ul class="nav nav-tabs">
				<li<?php if($table == 'association' || $table == 'initial'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#associations">Associations</a></li>
				<li<?php if($table == 'event'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#events">Événements</a></li>
				<?php if($admin){ ?>
					<li<?php if($table == 'user'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#users">Utilisateurs</a></li>
				<?php } ?>
			</ul>
			<!-- contenu onglets -->
			<div class="tab-content">
				<div id="associations" class="tab-pane fade <?php if($table == 'association' || $table == 'initial'){ ?>in active<?php }?>">
					<ul class="list-group">
						<li class="list-group-item add" id="association">Ajouter une association</li>
						<?php foreach ($tab_associations as $key => $association) { ?>
						<li id="association-<?= $association->id() ?>" class="edit list-group-item"><?= $association->name() ?><span class="badge delete"><span class="glyphicon glyphicon-trash"></span></span></li>
						<?php } ?>
					</ul>
				</div>
				<div id="events" class="tab-pane fade <?php if($table == 'event'){ ?>in active<?php }?>">
					<ul class="list-group">
						<li class="list-group-item add" id="event">Ajouter un événement</li>
						<?php foreach ($tab_events as $key => $event) { ?>
						<li id="event-<?= $event->id() ?>" class="edit list-group-item"><?= $event->name() ?><span class="badge delete"><span class="glyphicon glyphicon-trash"></span></span></li>
						<?php } ?>
					</ul>
				</div>
				<?php if($admin){ ?>
					<div id="users" class="tab-pane fade <?php if($table == 'user'){ ?>in active<?php }?>">
						<ul class="list-group">
							<li class="list-group-item add" id="user">Ajouter un utilisateur</li>
							<?php foreach ($tab_users as $key => $user) { ?>
							<li id="user-<?= $user->id() ?>" class="edit list-group-item"><?= $user->name() . ' ' . $user->first_name() ?><span class="badge delete"><span class="glyphicon glyphicon-trash"></span></span></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-8">
			<h2>Bienvenue sur la page d'administration</h2>
			<?php if(!empty($error)){ ?>
				<div class="alert alert-danger">
					<strong>Erreur !</strong> <?= $error ?>
				</div>
			<?php } ?>
			<?php if(!empty($success)){ ?>
				<div class="alert alert-success">
					<strong>Succès !</strong> <?= $success ?>
				</div>
			<?php } ?>
			<div id="admin_form">
				<?php require_once $view_admin; ?>
			</div>
		</div>
	</div>
</div>

			
		