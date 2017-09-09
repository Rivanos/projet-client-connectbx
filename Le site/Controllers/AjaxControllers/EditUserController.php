<?php 

function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

$id = $_POST['id'];
$user_to_edit = Db::getInstance()->select_user_with_id($id);
$add_or_edit = 'Modifier';
$operation = 'edit';
$table = 'user';

require_once '../../Views/admin_users.php';

?>