<?php 

function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

Db::getInstance()->delete_event($_POST['id']);

?>