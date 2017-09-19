<?php

// charge les modèles
function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');
$tab_selected_associations = Db::getInstance()->search_assoc_by_towns_themes($_POST["towns"], array());

$file = file_get_contents("associations.json");
$json = json_decode($file, true);

$json["coordinates"] = [];
$json["name"] = [];

echo "<pre>";
print_r ($tab_selected_associations);
echo "</pre>";

foreach ($tab_selected_associations as $i => $association) {
	array_push($json["coordinates"], array("latitude"=>$association->latitude(), "longitude"=>$association->longitude()));
	array_push($json["name"], $association->name());
}


file_put_contents("associations.json", json_encode($json));


?>
