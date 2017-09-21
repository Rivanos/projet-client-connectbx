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

		if(!empty($_POST)){
			$towns = isset($_POST['town']) ? array($_POST['town']) : array();
			$themes = isset($_POST['theme']) ? array($_POST['theme']) : array();
			$searched_assoc = Db::getInstance()->search_assoc_by_towns_themes($towns, $themes);

			
			foreach ($searched_assoc as $i => $association) {
				array_push($json, array("name"=>$association->name(), "latitude"=>$association->latitude(), "longitude"=>$association->longitude()));
			}
		}

		$json = htmlspecialchars(json_encode($json));

		$town_select = false;
		if(isset($_GET['town'])){
			$town_select = $_GET['town'];
		}

		require_once VIEWS . 'map.php'; // affiche la vue (votre page html)
	}

}
?>
