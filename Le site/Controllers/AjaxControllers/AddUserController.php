<?php 

$ajax = isset($_POST['ajax']) && $_POST['ajax'] ? true : false;
if($ajax){
	session_start();
	function loadClass($class){
		require_once ('../../Models/' . $class . '.class.php');
	}
	spl_autoload_register('loadClass');
}

if(isset($_SESSION['admin']) && $_SESSION['admin']){

	$date_min = strftime("%G-%m-%d", strtotime("-120 years"));
	$date_max = strftime("%G-%m-%d", strtotime("-12 years"));
	$user_to_edit = new User();
	$add_or_edit = 'Ajouter';
	$operation = 'add';
	$table = 'user';
	$required = ' required';

	if($ajax){
		require_once '../../Views/admin_users.php';	
	} else {
		require_once VIEWS . 'admin_users.php';
	}

}

?>