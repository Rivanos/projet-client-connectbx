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
	$id = $_POST['id'];
	$user_to_edit = Db::getInstance()->select_user_with_id($id);
	$add_or_edit = 'Modifier';
	$operation = 'edit';
	$table = 'user';
	$required = '';

	if($ajax){
		require_once '../../Views/admin_users.php';	
	} else {
		require_once VIEWS . 'admin_users.php';
	}

}

?>