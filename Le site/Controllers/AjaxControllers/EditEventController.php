<?php 

$ajax = isset($_POST['ajax']) && $_POST['ajax'] ? true : false;
if($ajax){
	function loadClass($class){
		require_once ('../../Models/' . $class . '.class.php');
	}
	spl_autoload_register('loadClass');
}

$id = $_POST['id'];
$event_to_edit = Db::getInstance()->select_event_with_id($id);
$add_or_edit = 'Modifier';
$operation = 'edit';
$table = 'event';
$required = '';
$towns = Db::getInstance()->select_all_towns();

if($ajax){
	require_once '../../Views/admin_events.php';	
} else {
	require_once VIEWS . 'admin_events.php';
}

?>