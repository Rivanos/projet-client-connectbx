<?php 

$ajax = isset($_POST['ajax']) && $_POST['ajax'] ? true : false;
if($ajax){
	function loadClass($class){
		require_once ('../../Models/' . $class . '.class.php');
	}
	spl_autoload_register('loadClass');
}

$towns = Db::getInstance()->select_all_towns();
$themes = Db::getInstance()->select_all_themes();
$association_to_edit = new Association('', '', '', new Address('', '', '', new Town('', ''), ''), '', '', '', '', '');
$add_or_edit = 'Ajouter';
$operation = 'add';
$table = 'association';
$required = ' required';

if($ajax){
	require_once '../../Views/admin_associations.php';	
} else {
	require_once VIEWS . 'admin_associations.php';
}


?>