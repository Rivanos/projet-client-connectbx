<?php 

function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

$id = $_POST['id'];
$event_to_edit = Db::getInstance()->select_event_with_id($id);
$add_or_edit = 'Modifier';
$operation = 'edit';
$table = 'event';
$towns = Db::getInstance()->select_all_towns();

require_once '../../Views/admin_events.php';

?>