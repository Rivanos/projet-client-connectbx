<?php 

// charge les modèles
function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');
$tab_selected_associations = Db::getInstance()->search_assoc_by_towns_themes($_POST["towns"], array());

$file = file_get_contents("associations.json");
$json = json_decode($file, true);

$json["address"] = [];
$json["name"] = [];

foreach ($tab_selected_associations as $i => $association) {
	array_push($json["address"], $association->address()->to_string());
	array_push($json["name"], $association->name());
}


file_put_contents("associations.json", json_encode($json));


?>