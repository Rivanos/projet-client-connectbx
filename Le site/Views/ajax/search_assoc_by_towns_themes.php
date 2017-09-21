<?php

// charge les modèles
function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');
$towns = !empty($_POST["towns"])?$_POST["towns"]:array();
$themes = !empty($_POST["themes"])?$_POST["themes"]:array();
$tab_selected_associations = Db::getInstance()->search_assoc_by_towns_themes($towns, $themes);





$json = [];


/*echo "<pre>";
print_r ($tab_selected_associations);
echo "</pre>";*/

foreach ($tab_selected_associations as $i => $association) {
	array_push($json, array("name"=>$association->name(), "latitude"=>$association->latitude(), "longitude"=>$association->longitude()));
}


//setcookie("associations", serialize($json), time()+3600, "");
echo json_encode($json);
/*echo "<pre>";
print_r ($tab_selected_associations);
echo "</pre>";*/

/*echo "<pre>";
print_r ($_COOKIE["associations"]);
echo "</pre>";*/

?>
