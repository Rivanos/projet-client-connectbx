<?php
class EventController{
	
	public function __construct(){ // permet de créer le controller
		
	}
	
	public function run(){ // la méthode appelée dans index.php
		/*
			ICI vient le code php à exécuter avant d'ouvrir la page, 
			chargement de données, conditions, boucles, ...
		*/

	    $tableauEvenements = Db::getInstance()->select_all_events();

		$tableauEvenementsPassed = Db::getInstance()->select_all_events_passed();
		$tableauEvenementsToComed = Db::getInstance()->select_all_events_to_come();

		//$address_event = Db::getInstance()->select_address_event($id);


		require_once VIEWS . 'event.php'; // affiche la vue (votre page html)
	}

}
?>

