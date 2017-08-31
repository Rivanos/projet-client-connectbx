<?php

class Db {

	// variables de classe
	private static $instance = null;
	private $_db;

	// constructeur
	private function __construct(){
		try{
			$this->_db = new PDO('mysql:host=localhost;dbname=connectbx;charset=utf8', 'root', 'user');
			$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}

	// pattern singleton
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new Db();
		}
		return self::$instance;
	}

	// NOTE: LOGIN AND CONNECTIONS
	// VALIDATE LOGIN
	public function validate_user($login, $password){
		$query = 'SELECT * FROM users WHERE user_login=' . $this->_db->quote($login) . ' AND user_pwd=' . $this->_db->quote(sha1($password));
		$result = $this->_db->query($query);
		if($result->rowcount()!=0){
			return true;
		}
		return false;
	}

	// CHECK IF THE LOGIN ALREADY EXISTS
	public function login_exists($login){
		$query = 'SELECT * from users WHERE user_login='.$this->_db->quote($login);
		$result = $this->_db->query($query);
		if ($result->rowcount()!=0) {
			return true;
		}
		return false;
	}

	// INSERT USER
	public function insert_user($lastName, $firstName, $birthdate, $email, $login, $password){
		$query='INSERT INTO users(`user_name`, `user_firstname`, `user_birthdate`, `user_email`, `user_login`, `user_pwd` ) VALUES (:lastName, :firstName, :birthdate, :email, :login, :password)';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':lastName', $lastName);
		$qp->bindValue(':firstName', $firstName);
		$qp->bindValue(':birthdate', $birthdate);
		$qp->bindValue(':email', $email);
		$qp->bindValue(':login', $login);
		$qp->bindValue(':password', sha1($password));
		$qp->execute();
	}

	// SELECT ALL USERS
	public function select_all_users(){
		$query = 'SELECT user_id, user_name, user_firstname, user_birthdate, user_email, user_login, user_pwd FROM users';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while ($row = $result->fetch()) {
				$tab[] = new User($row->user_id, $row->user_name, $row->user_firstname, $row->user_birthdate, $row->user_email, $row->user_login, $row->user_pwd);
			}
		}
		return $tab;
	}

	// UPDATE USER
	public function update_user($id, $name, $first_name, $birthdate, $email, $login){
		$query = 'UPDATE users SET user_name=' . $this->_db->quote($name) . ', user_firstname=' . $this->_db->quote($first_name) . ', user_birthdate=' . $this->_db->quote($birthdate) . ', user_email=' . $this->_db->quote($email) . ', user_login=' . $this->_db->quote($login) . ' WHERE user_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// DELETE USER
	public function delete_user($id){
		$query = 'DELETE FROM users WHERE user_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// NOTE: INSERT ASSOCIATION
	public function insert_association($name, $description, $address, $phone, $website, $latitude, $longitude, $theme){
		$query='INSERT INTO associations(`assoc_name`, `assoc_descri`, `assoc_address`, `assoc_phone`, `assoc_website`, `assoc_local`, `assoc_theme`) VALUES (:name, :description, :address, :phone, :website, :latitude, :longitude, :theme)';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':name', $name);
		$qp->bindValue(':description', $description);
		$qp->bindValue(':address', $address);
		$qp->bindValue(':phone', $phone);
		$qp->bindValue(':website', $website);
		$qp->bindValue(':latitude', $latitude);
		$qp->bindValue(':longitude', $longitude);
		$qp->bindValue(':theme', $theme);
		$qp->execute();
	}

	// NOTE: SELECT ALL ASSOCIATIONS
	public function select_all_associations(){
		$query = 'SELECT * FROM associations';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while ($row = $result->fetch()){
				$tab[] = new Association($row->assoc_id, $row->assoc_name, $row->assoc_descri, $row->assoc_address, $row->assoc_phone, $row->assoc_website, $row->assoc_latitude, $row->assoc_longitude, $row->assoc_theme);
			}
		}
		return $tab;
	}

	// NOTE: UPDATE ASSOCIATION
	public function update_association($id, $name, $description, $address, $phone, $website, $latitude, $longitude, $theme){
		$query = 'UPDATE associations SET assoc_name=' . $this->_db->quote($name) . ', assoc_descri=' . $this->_db->quote($description) . ', assoc_address=' . $this->_db->quote($address) . ', assoc_phone=' . $this->_db->quote($phone) . ', assoc_website=' . $this->_db->quote($website) . ', assoc_latitude=' . $this->_db->quote($latitude) . ', assoc_longitude=' . $this->_db->quote($longitude) . ', assoc_theme=' . $this->_db->quote($theme) . ' WHERE assoc_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// NOTE: DELETE ASSOCIATION
	public function delete_association($id){
		$query = 'DELETE FROM associations WHERE assoc_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// NOTE: INSERT EVENT
	public function insert_event($name, $event_date, $description, $image, $priority){
		$query = 'INSERT INTO events(`event_name`, `event_date`, `event_descri`, `event_image`, `event_priority`) VALUES (:name, :event_date, :description, :image, :priority)';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':name', $name);
		$qp->bindValue(':event_date', $event_date);
		$qp->bindValue(':description', $description);
		$qp->bindValue(':image', $image);
		$qp->bindValue(':priority', $priority);
		$qp->execute();
	}

	// NOTE: SELECT ALL EVENTS
	public function select_all_events(){
		$query = 'SELECT * FROM events';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority,
					$row->event_address);
			}
		}
		return $tab;
	}

	// NOTE: Select all events with a date passed
	public function select_all_events_passed(){
		$query = 'SELECT * FROM events WHERE event_date < NOW()';
		$result = $this->_db->query($query);
		$tab = array();

		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $row->event_address);
			}
		}

		return $tab;
	}

	// NOTE: Select all events in present + in future
	public function select_all_events_to_come(){
		$query = 'SELECT * FROM events WHERE event_date > NOW()';
		$result = $this->_db->query($query);
		$tab = array();

		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $row->event_address);
			}
		}
		return $tab;
	}

	// NOTE: SELECT PRIMARY EVENTS
	public function select_primary_events(){
	}

	// NOTE: UPDATE EVENT
	public function update_event($id, $name, $date, $description, $image, $priority){
		$query = 'UPDATE events SET event_name=' . $this->_db->quote($name) . ', event_date=' . $this->_db->quote($date) . ', event_descri=' . $this->_db->quote($description) . ', event_image=' . $this->_db->quote($image) . ', event_priority=' . $this->_db->quote($priority) . ' WHERE event_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();

	}

	// NOTE: DELETE EVENT
	public function delete_event($id){
		$query = 'DELETE FROM events WHERE event_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// NOTE: INSERT ADDRESS
	private function insert_address($street, $number, $post_code, $post_box){
		$query = 'INSERT INTO address(address_street, address_number, address_post_code, address_post_box) VALUES (:street, :numb, :post_code, :post_box)';
		$qp->$this->_db->prepare($query);
		$qp->bindValue(':street', $street);
		$qp->bindValue(':numb', $number);
		$qp->bindValue(':post_code', $post_code);
		$qp->bindValue(':post_box', $post_box);
		$qp->execute();
	}

	// NOTE: SELECT ADDRESS
	private function select_all_address(){

	}

	// NOTE: SELECT AN ADDRESS WITH AN ID
	private function select_address_with_id($id){
		$query = 'SELECT * FROM address WHERE address_id=' . $id;
		$result = $this->_db->prepare($query)->execute()->fetch();
		return new Address($result->address_id, $result->address_street, $result->address_number, $result->address_post_code, $result->address_post_box);
	}

	// NOTE: SELECT ASSOCIATION AND ADDRESS WITH CHECKED
	public function search_assoc_by_towns_themes($tab_towns, $tab_themes){
		$where_town = where_table($tab_towns, 't.town_name');
		$where_theme = where_table($tab_themes, 'ass.assoc_theme');
		$juncture = 'ass.assoc_address=ad.address_id AND ad.address_post_code=t.town_post_code';
		$query = '	SELECT ass.*, ad.*, t.* FROM associations ass, adress ad, towns t
						WHERE ' . $juncture . ' AND ' . $where_town . ' AND ' . $where_theme;
		$result = $this->_db->prepare($query)->execute();
		$tab = array(); 
		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$town = new Town($result->town_name, $result->town_post_code);
				$address = new Address($result->address_id, $result->address_street, $result->address_number, $town, $result->address_post_box);
				$tab[] = new Association($result->assoc_id, $result->assoc_name, $result->assoc_descri, $address, $result->assoc_phone, $result->assoc_website, $result->assoc_latitude, $result->assoc_longitude, $result->assoc_theme);
			}
		}
		return $tab;
	}

	// SELECT ALL COMMUNE FROM TOWN
	public function select_all_commune(){
		$query = 'SELECT * FROM town';
		$result = $this->_db->query($query);
		$tab = array();
			if ($result->rowcount() != 0) {
				while ($row = $result->fetch()) {
					$tab[] = ($row->town_name);
				}
			}
			return $tab;
	}

	// SELECT ALL COMMUNE FROM TOWN
	public function select_all_theme(){
		$query = 'SELECT * FROM associations';
		$result = $this->_db->query($query);
		$tab = array();
			if ($result->rowcount() != 0) {
				while ($row = $result->fetch()) {
					$tab[] = ($row->assoc_theme);
				}
			}
			return $tab;
	}
  
	private function where_table($content_table, $table_column){
		if(count($content_table) == 0) return '';
		$where = '(';
		foreach ($content_table as $index => $value) {
			if($index == 0){
				$where .= $table_column . '=' . $this->_db->quote($value);
			} else {
				$where .= ' OR ' . $table_column . '=' . $this->_db->quote($value);
			}
		}
		return $where . ')';
	}

	/* SELECT ASSOCIATION.*, ADDRESS.*
		FROM ASSOCIATION, ADRESSE, COMMUNE 
		WHERE (COMMUNE = 'VALEUR CHECKBOX' OR COMMUNE = 'VALEUR CHECKBOX' OR ENZ...) AND (THEME = 'VALEUR CHECKBOX' OR THEME = 'VALEUR CHECKBOX' OR ETC...) AND ASSOCIATION.ADDR_ID = ADDRESS.ID AND ADDRESS.TOWN_post_code = TOWN.ID



	*/
}

?>
