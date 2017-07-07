<?php
class AdministrationController{

	public function __construct(){

	}

	public function run(){


		// Affiche toutes les valeurs de POST
		if(!empty($_POST)){
			echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		}


		// NOTE: Updates the db if submitted
		if(isset($_POST['edit_submit'])){

			// NOTE: Gets the current table
			$table = $_POST['table'];

			// NOTE: Inserts elements in db
			if (isset($_POST['add_lines'])&&isset($_POST['add1'])) {
				foreach ($_POST['add_lines'] as $value) {
					$add_table = $_POST['add' . $value];
					if($table == 'user') Db::getInstance()->insert_user($add_table[0], $add_table[1], $add_table[2], $add_table[3], $add_table[4], $add_table[5]);
					if($table == 'association') Db::getInstance()->insert_association($add_table[0], $add_table[1], $add_table[2], $add_table[3], $add_table[4], $add_table[5], $add_table[6], $add_table[7]);
					if($table == 'event') Db::getInstance()->insert_event($add_table[0], $add_table[1], $add_table[2], $add_table[3], $add_table[4]);
				}
			}
			// NOTE: Updates elements in db
			if(isset($_POST['edit_lines'])){
				foreach ($_POST['edit_lines'] as $value) {
					$edit_table = $_POST['edit' . $value];
					if($table == 'user') Db::getInstance()->update_user($edit_table[0], $edit_table[1], $edit_table[2], $edit_table[3], $edit_table[4], $edit_table[5], $edit_table[6]);
					if($table == 'association') Db::getInstance()->update_association($edit_table[0], $edit_table[1], $edit_table[2], $edit_table[3], $edit_table[4], $edit_table[5], $edit_table[6], $edit_table[7], $edit_table[8]);
					if($table == 'event') Db::getInstance()->update_event($edit_table[0], $edit_table[1], $edit_table[2], $edit_table[3], $edit_table[4], $edit_table[5]);
				}
			}
		}
		// NOTE: Deletes elements in db
		if(isset($_POST['delete_submit'])){
			// NOTE: Gets the current table
			$table = $_POST['table'];

			$delete_table = $_POST['delete'];
			foreach ($delete_table as $value) {
				if($table == 'user') Db::getInstance()->delete_user($value);
				if($table == 'association') Db::getInstance()->delete_association($value);
				if($table == 'event') Db::getInstance()->delete_event($value);
			}
		}

		// NOTE: Selects all the users and stocks them in an array
		$tab_users = Db::getInstance()->select_all_users();
		// NOTE: Selects all the associations and stocks them in an array
		$tab_associations = Db::getInstance()->select_all_associations();
		// NOTE: Selects all the events and stocks them in an array
		$tab_events = Db::getInstance()->select_all_events();


		require_once VIEWS . 'administration.php';

	}

}
?>
