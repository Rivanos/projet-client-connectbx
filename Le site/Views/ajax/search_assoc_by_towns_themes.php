<?php 

require_once "../../Models/Db.class.php";
$tab_selected_associations = Db::getInstance()->search_assoc_by_towns_themes($_POST["towns"], array());

	var_dump($tab_selected_associations);





?>