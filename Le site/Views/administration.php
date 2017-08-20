<h2>Bienvenue sur la page d'administration</h2>
<!-- Navigation tabs -->
<ul class="nav nav-tabs">
	<li<?php if($table == 'user' || $table == 'initial'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#users">Utilisateurs</a></li>
	<li<?php if($table == 'association'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#associations">Associations</a></li>
	<li<?php if($table == 'event'){ ?> class="active"<?php } ?>><a data-toggle="tab" href="#events">Événements</a></li>
</ul>
<!-- contenu onglets -->
<div class="tab-content">

	
