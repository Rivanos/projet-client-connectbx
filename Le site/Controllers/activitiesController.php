<?php
class activitiesController{ // le nom de votre controller

	public function __construct(){ // permet de créer le controller

	}

	public function run(){ // la méthode appelée dans index.php
		/*
			ICI vient le code php à exécuter avant d'ouvrir la page, 
			chargement de données, conditions, boucles, ...
		*/
		require_once VIEWS . 'activities.php'; // affiche la vue (votre page html)
	}

}
?>
