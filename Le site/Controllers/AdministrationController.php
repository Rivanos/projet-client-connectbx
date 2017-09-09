<?php
class AdministrationController{

	public function __construct(){

	}

	public function run(){

		// Met à jour les dates
		$date_min = strftime("%G-%m-%d", strtotime("-120 years"));
		$date_max = strftime("%G-%m-%d", strtotime("-12 years"));

		$table = 'initial';
		$id = -1;
		$towns = Db::getInstance()->select_all_towns();
		
		// if(!empty($_POST)){
		// 	echo "<pre>";
		// 	print_r($_POST);
		// 	echo "</pre>";
		// }

		if(!empty($_POST)){
			if(!empty($_POST['submit']) && $_POST['submit'] == 'add'){
				if($_POST['table'] == 'user'){
					Db::getInstance()->insert_user($_POST['name'], $_POST['first_name'], $_POST['birthdate'], $_POST['email'], $_POST['login'], $_POST['pwd']);
				} else if($_POST['table'] == 'association'){
					Db::getInstance()->insert_address($_POST['street'], $_POST['number'], substr($_POST['town'], 0, 4), null);
					Db::getInstance()->insert_association($_POST['name'], $_POST['description'], $_POST['phone'], $_POST['website'], $_POST['latitude'], $_POST['longitude'], $_POST['theme']);
				} else if ($_POST['table'] == 'event') {
					Db::getInstance()->insert_address($_POST['street'], $_POST['number'], substr($_POST['town'], 0, 4), null);
					Db::getInstance()->insert_event($_POST['name'], $_POST['date'], $_POST['description'], $_POST['image'], 0/*$_POST['priority']*/);
				}
			} else if(!empty($_POST['submit']) && $_POST['submit'] == 'edit'){
				if($_POST['table'] == 'user'){
					Db::getInstance()->update_user($_POST['id'], $_POST['name'], $_POST['first_name'], $_POST['birthdate'], $_POST['email'], $_POST['login']);
				} else if($_POST['table'] == 'association'){
					Db::getInstance()->update_address($_POST['address_id'], $_POST['street'], $_POST['number'], substr($_POST['town'], 0, 4), null);
					Db::getInstance()->update_association($_POST['id'], $_POST['name'], $_POST['description'], $_POST['address_id'], $_POST['phone'], $_POST['website'], $_POST['latitude'], $_POST['longitude'], $_POST['theme']);
				} else if ($_POST['table'] == 'event') {
					Db::getInstance()->update_address($_POST['address_id'], $_POST['street'], $_POST['number'], substr($_POST['town'], 0, 4), null/*$_POST['post_box']*/);
					Db::getInstance()->update_event($_POST['id'], $_POST['name'], $_POST['date'], $_POST['description'], $_POST['image'], 0/*$_POST['priority']*/, $_POST['address_id']);
				}
			}
		}

/*
		// NOTE: Updates the db if submitted
		if(isset($_POST['edit_submit'])){

			// NOTE: Gets the current table
			$table = $_POST['table'];

			// NOTE: Inserts elements in db
			if (isset($_POST['add_lines'])&&isset($_POST['add0'])) {
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
		if(isset($_POST['delete_submit']) && isset($_POST['delete'])){
			// NOTE: Gets the current table
			$table = $_POST['table'];

			$delete_table = $_POST['delete'];
			foreach ($delete_table as $value) {
				if($table == 'user') Db::getInstance()->delete_user($value);
				if($table == 'association') Db::getInstance()->delete_association($value);
				if($table == 'event') Db::getInstance()->delete_event($value);
			}
		}
*/
		// NOTE: Selects all the users and stocks them in an array
		$tab_users = Db::getInstance()->select_all_users();
		// NOTE: Selects all the associations and stocks them in an array
		$tab_associations = Db::getInstance()->select_all_associations();
		// NOTE: Selects all the events and stocks them in an array
		$tab_events = Db::getInstance()->select_all_events();




		require_once VIEWS . 'administration.php';
		

	}
	private function check_user_input_data($name, $first_name, $birthdate, $email, $login, $pwd, $confirm_pwd){
		return true;
	}
	private function check_association_input_data($name, $description, $phone, $website, $theme){

	}
	private function check_event_input_data($name){

	}
}
?>
