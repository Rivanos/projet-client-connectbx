<?php 

// charge les modèles
function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');
$tab_selected_associations = Db::getInstance()->search_assoc_by_towns_themes($_POST["towns"], array());

echo '<pre>';
print_r($tab_selected_associations);
echo '</pre>'




?>