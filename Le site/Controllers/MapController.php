<?php
class MapController{ // le nom de votre controller

	public function __construct(){ // permet de créer le controller

	}

	public function run(){ // la méthode appelée dans index.php
		/*
			ICI vient le code php à exécuter avant d'ouvrir la page,
			chargement de données, conditions, boucles, ...
		*/

		$json =  [];

		if(isset($_GET["search"])){
			$id = $_GET["search"];
			$assoc = Db::getInstance()->select_association_with_id($id);

			array_push($json, array("name"=>$assoc->name(), "latitude"=>$assoc->latitude(), "longitude"=>$assoc->longitude()));

		}

		$json = json_encode($json);

		require_once VIEWS . 'map.php'; // affiche la vue (votre page html)
	}

}
?>
