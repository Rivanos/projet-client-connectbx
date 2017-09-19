<?php 

$ajax = isset($_POST['ajax']) && $_POST['ajax'] ? true : false;
if($ajax){
	function loadClass($class){
		require_once ('../../Models/' . $class . '.class.php');
	}
	spl_autoload_register('loadClass');
}

$event_to_edit = new Event('', '', '', '', '', '', new Address('', '', '', new Town('', ''), ''));
$add_or_edit = 'Ajouter';
$operation = 'add';
$table = 'event';
$required = ' required';
$towns = Db::getInstance()->select_all_towns();

if($ajax){
	require_once '../../Views/admin_events.php';	
} else {
	require_once VIEWS . 'admin_events.php';
}

?>