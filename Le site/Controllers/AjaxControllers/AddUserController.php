<?php 

function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

$user_to_edit = new User();
$add_or_edit = 'Ajouter';
$operation = 'add';
$table = 'user';
$towns = Db::getInstance()->select_all_towns();

require_once '../../Views/admin_users.php';

?>