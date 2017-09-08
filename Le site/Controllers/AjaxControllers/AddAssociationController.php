<?php 

function loadClass($class){
	require_once ('../../Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

$towns = Db::getInstance()->select_all_towns();
$association_to_edit = new Association('', '', '', new Address('', '', '', new Town('', ''), ''), '', '', '', '', '');
$add_or_edit = 'Ajouter';
$operation = 'add';
$table = 'association';

require_once '../../Views/admin_associations.php';

?>