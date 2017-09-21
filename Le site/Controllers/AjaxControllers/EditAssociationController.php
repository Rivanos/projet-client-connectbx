<?php 

$ajax = isset($_POST['ajax']) && $_POST['ajax'] ? true : false;
if($ajax){
	function loadClass($class){
		require_once ('../../Models/' . $class . '.class.php');
	}
	spl_autoload_register('loadClass');
}

$id = $_POST['id'];
$association_to_edit = Db::getInstance()->select_association_with_id($id);
$add_or_edit = 'Modifier';
$operation = 'edit';
$table = 'association';
$required = '';
$towns = Db::getInstance()->select_all_towns();
$themes = Db::getInstance()->select_all_themes();

if($ajax){
	require_once '../../Views/admin_associations.php';	
} else {
	require_once VIEWS . 'admin_associations.php';
}

?>