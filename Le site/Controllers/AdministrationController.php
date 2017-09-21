<?php
class AdministrationController{
	public function __construct(){
	}
	public function run(){
		// Met à jour les dates
		$table = 'initial';
		$success = '';
		$error = '';
		$id = -1;
		$admin = isset($_SESSION['admin']) && $_SESSION['admin'] ? true : false;
		$towns = Db::getInstance()->select_all_towns();
		



		// A FAIRE :
		// quand edit -> affiche l'entité modifiée x
		// gérer les mdp (confirmation et edit) x
		// required latitude/longitude x
		// gérer les adresses x
		// gérer les catégories d'associations x
		// gérer upload image : changement de droits x
		// gérer heure event x
		// droits user et admins
		if(!empty($_POST['table']) && !empty($_POST['submit'])){
			// Secures XSS attacks
			$inputs = $this->_secure_xss($_POST);

			$table = $inputs['table'];
			$action = $inputs['submit'];

			/*
			*
			*		USERS
			*
			*/

			if($table == 'user' && $admin){
		
				$name = !empty($inputs['name']) ? $inputs['name'] : null;
				$first_name = !empty($inputs['first_name']) ? $inputs['first_name'] : null;
				$birthdate = !empty($inputs['birthdate']) ? $inputs['birthdate'] : null;
				$email = !empty($inputs['email']) ? $inputs['email'] : null;
				$login = $inputs['login'];
				$pwd = '';
				$confirm_pwd = '';
				if(!empty($inputs['pwd']) && !empty($inputs['pwd-confirm'])){
					$pwd = $inputs['pwd'];
					$confirm_pwd = $inputs['pwd-confirm'];
				}

				if($action == 'add'){ // ADD USER
					if(!empty($pwd) && !empty($confirm_pwd) && $pwd == $confirm_pwd){
						Db::getInstance()->insert_user($name, $first_name, $birthdate, $email, $login, $pwd);
					}
				} elseif ($action == 'edit') { // ADD EDIT
					$id = $inputs['id'];
					if(!empty($pwd) && !empty($confirm_pwd) && $pwd == $confirm_pwd){
						Db::getInstance()->update_user_with_pwd($id, $name, $first_name, $birthdate, $email, $login, $pwd);
					} else {
						Db::getInstance()->update_user($id, $name, $first_name, $birthdate, $email, $login);
					}
				}

			/*
			*
			*		ASSOCIATIONS
			*
			*/

			}else if($table == 'association'){

				$latitude = $inputs['latitude'];
				$longitude = $inputs['longitude'];

				if($longitude>4.22 && $longitude<4.5 && $latitude>50.75 && $latitude<50.92){

					$name = $inputs['name'];
					$description = !empty($inputs['description']) ? $inputs['description'] : null;
					$phone = !empty($inputs['phone']) ? $inputs['phone'] : null;
					$website = !empty($inputs['website']) ? $inputs['website'] : null;
					$theme = $inputs['theme'];

					$street = $inputs['street'];
					$number = $inputs['number'];
					$town = substr($inputs['town'], 0, 4);
					$post_box = !empty($inputs['post_box']) ? $inputs['post_box'] : null;

					// ADD ASSOCIATION
					if($action == 'add'){ 
						Db::getInstance()->insert_address($street, $number, $town, $post_box);
						Db::getInstance()->insert_association($name, $description, $phone, $website, $latitude, $longitude, $theme);

					// EDIT ASSOCIATION
					} elseif ($action == 'edit') { 
						$id = $inputs['id'];
						$address_id = $inputs['address_id'];
						Db::getInstance()->update_address($address_id, $street, $number, $town, $post_box);
						Db::getInstance()->update_association($id, $name, $description, $address_id, $phone, $website, $latitude, $longitude, $theme);
					}
				} else {
					$error = "Problème d'adresse, latitude et/ou longitude incorrecte(s)\n";
				}

			/*
			*
			*		EVENTS
			*
			*/

			}else if($table == 'event'){ 

				// Manage the file upload for event's image
				$uploadOk = 0;
				if(isset($_FILES["image"]) && $_FILES["image"]['error'] != 4){
					$target_dir = VIEWS . "Images/event/";
					$target_file = $target_dir . basename($_FILES["image"]["name"]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

					// Check if image file is a actual image or fake image
					$check = getimagesize($_FILES["image"]["tmp_name"]);
					if($check !== false) {
						$uploadOk = 1;
					} else {
						$uploadOk = 0;
					}
					// Check if file already exists
					if (file_exists($target_file)) {
					    echo "Sorry, file already exists.";
					    $uploadOk = 0;
					}
					// Check file size
					if ($_FILES["image"]["size"] > 1000000) {
					    echo "Sorry, your file is too large.";
					    $uploadOk = 0;
					}
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					    $uploadOk = 0;
					}
				}

				$name = $inputs['name'];
				$date = $inputs['date'] . ' ' . $inputs['time'];
				$description = !empty($inputs['description']) ? $inputs['description'] : null;
				$priority = isset($inputs['priority']) ? 1 : 0;
				$street = $inputs['street'];
				$number = $inputs['number'];
				$town = substr($inputs['town'], 0, 4);
				$post_box = !empty($inputs['post_box']) ? $inputs['post_box'] : null;

				// ADD EVENT
				if($action == 'add'){

					if($_FILES['image']['error'] !== 4){
						// if everything is ok, try to upload file
						if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					      //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
							Db::getInstance()->insert_address($street, $number, $town, $post_box);
							Db::getInstance()->insert_event_with_image($name, $date, $description, $target_file, $priority);
						} else {
				      	//echo "Sorry, there was an error uploading your file.";
					   }
					} else {
						Db::getInstance()->insert_address($street, $number, $town, $post_box);
						Db::getInstance()->insert_event($name, $date, $description, $priority);
					}
				// EDIT EVENT
				} elseif ($action == 'edit') { 
					$id = $inputs['id'];
					$address_id = $inputs['address_id'];

					if($_FILES['image']['error'] !== 4){
						// if everything is ok, try to upload file
						if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					      //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
							Db::getInstance()->update_address($address_id, $street, $number, $town, $post_box);
							Db::getInstance()->update_event_with_image($id, $name, $date, $description, $target_file, $priority, $address_id);
						} else {
				      	echo "Sorry, there was an error uploading your file.";
					   }
					} else {
						Db::getInstance()->update_address($address_id, $street, $number, $town, $post_box);
						Db::getInstance()->update_event($id, $name, $date, $description, $priority, $address_id);
					}
				}
			}
		}

		// NOTE: Selects all the users and stocks them in an array
		$tab_users = Db::getInstance()->select_all_users();
		// NOTE: Selects all the associations and stocks them in an array
		$tab_associations = Db::getInstance()->select_all_associations();
		// NOTE: Selects all the events and stocks them in an array
		$tab_events = Db::getInstance()->select_all_events();

		

		if($table == 'initial'){
			$view_admin = CONTROLLER . 'AjaxControllers/AddAssociationController.php';
		} else {
			if($id >= 0){
				$view_admin = CONTROLLER . 'AjaxControllers/Edit' . ucfirst($table) . 'Controller.php';
			} else {
				$view_admin = CONTROLLER . 'AjaxControllers/Add' . ucfirst($table) . 'Controller.php';
			}
		}

		require_once VIEWS . 'administration.php';
		
	}
	
	private function _secure_xss($array_inputs){
		foreach ($array_inputs as $key => $value) {
			$array_inputs[$key] = htmlspecialchars($value);
		}
		return $array_inputs;
	}
}
?>