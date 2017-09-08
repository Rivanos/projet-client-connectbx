<?php 

function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

$event_to_edit = new Event('', '', '', '', '', '', new Address('', '', '', new Town('', ''), ''));
$add_or_edit = 'Ajouter';
$operation = 'add';
$table = 'event';
$towns = Db::getInstance()->select_all_towns();

require_once '../../Views/admin_events.php';

?>