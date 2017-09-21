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

	// SELECT USER WITH ID
	public function select_user_with_id($id){
		$query = "SELECT * FROM users WHERE user_id=$id";
		$result = $this->_db->query($query)->fetch();
		return new User($result->user_id, $result->user_name, $result->user_firstname, $result->user_birthdate, $result->user_email, $result->user_login, $result->user_pwd);
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

	// UPDATE USER without pwd
	public function update_user($id, $name, $first_name, $birthdate, $email, $login){
		$query = 'UPDATE users SET user_name=' . $this->_db->quote($name) . ', user_firstname=' . $this->_db->quote($first_name) . ', user_birthdate=' . $this->_db->quote($birthdate) . ', user_email=' . $this->_db->quote($email) . ', user_login=' . $this->_db->quote($login) . ' WHERE user_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// UPDATE USER with pwd
	public function update_user_with_pwd($id, $name, $first_name, $birthdate, $email, $login, $pwd){
		$query = 'UPDATE users SET user_name=' . $this->_db->quote($name) . ', user_firstname=' . $this->_db->quote($first_name) . ', user_birthdate=' . $this->_db->quote($birthdate) . ', user_email=' . $this->_db->quote($email) . ', user_login=' . $this->_db->quote($login) . ', user_pwd=' . $this->_db->quote(sha1($pwd)) . ' WHERE user_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// DELETE USER
	public function delete_user($id){
		$query = 'DELETE FROM users WHERE user_id=' . $id;
		$this->_db->prepare($query)->execute();
	}

	// NOTE: INSERT ASSOCIATION
	public function insert_association($name, $description, $phone, $website, $latitude, $longitude, $theme){
		$address = $this->_db->lastInsertId();
		$query='INSERT INTO associations(`assoc_name`, `assoc_descri`, `assoc_address`, `assoc_phone`, `assoc_website`, `assoc_latitude`, `assoc_longitude`, `assoc_theme`) VALUES (:name, :description, :address, :phone, :website, :latitude, :longitude, :theme)';
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

	// NOTE: SELECT ASSOCIATION WITH ID
	public function select_association_with_id($id){
		$query = "SELECT * FROM associations WHERE assoc_id = $id";
		$result = $this->_db->query($query)->fetch();
		$address = Db::getInstance()->select_address_with_id($result->assoc_address);
		return new Association($result->assoc_id, $result->assoc_name, $result->assoc_descri, $address, $result->assoc_phone, $result->assoc_website, $result->assoc_latitude, $result->assoc_longitude, $result->assoc_theme);
	}

	// NOTE: SELECT ALL ASSOCIATIONS
	public function select_all_associations(){
		$query = 'SELECT * FROM associations';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while ($row = $result->fetch()){
				$address = Db::getInstance()->select_address_with_id($row->assoc_address);
				$tab[] = new Association($row->assoc_id, $row->assoc_name, $row->assoc_descri, $address, $row->assoc_phone, $row->assoc_website, $row->assoc_latitude, $row->assoc_longitude, $row->assoc_theme);
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

	// NOTE: INSERT EVENT without image
	public function insert_event($name, $event_date, $description, $priority){
		$address = $this->_db->lastInsertId();
		$query = 'INSERT INTO events(`event_name`, `event_date`, `event_descri`, `event_priority`, `event_address`) VALUES (:name, :event_date, :description, :priority, :address)';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':name', $name);
		$qp->bindValue(':event_date', $event_date);
		$qp->bindValue(':description', $description);
		$qp->bindValue(':priority', $priority);
		$qp->bindValue(':address', $address);
		$qp->execute();
	}

	// NOTE: INSERT EVENT with image
	public function insert_event_with_image($name, $event_date, $description, $image, $priority){
		$address = $this->_db->lastInsertId();
		$query = 'INSERT INTO events(`event_name`, `event_date`, `event_descri`, `event_image`, `event_priority`, `event_address`) VALUES (:name, :event_date, :description, :image, :priority, :address)';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':name', $name);
		$qp->bindValue(':event_date', $event_date);
		$qp->bindValue(':description', $description);
		$qp->bindValue(':image', $image);
		$qp->bindValue(':priority', $priority);
		$qp->bindValue(':address', $address);
		$qp->execute();
	}

	// NOTE: SELECT EVENT WITH ID
	public function select_event_with_id($id){
		$query = "SELECT * FROM events WHERE event_id = $id";
		$result = $this->_db->query($query)->fetch();
		$address = Db::getInstance()->select_address_with_id($result->event_address);
		return new Event($result->event_id, $result->event_name, $result->event_date, $result->event_descri, $result->event_image, $result->event_priority, $address);
	}

	// NOTE: SELECT ALL EVENTS
	public function select_all_events(){
		$query = 'SELECT * FROM events';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$address = Db::getInstance()->select_address_with_id($row->event_address);
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $address);
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
				$address = Db::getInstance()->select_address_with_id($row->event_address);
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $address);
			}
		}
		return $tab;
	}

	// NOTE: UPDATE EVENT
	public function update_event($id, $name, $date, $description, $priority, $address){
		$query = 'UPDATE events SET event_name=' . $this->_db->quote($name) . ', event_date=' . $this->_db->quote($date) . ', event_descri=' . $this->_db->quote($description) . ', event_priority=' . $this->_db->quote($priority) . ', event_address=' . $address . ' WHERE event_id=' . $id;
		$this->_db->prepare($query)->execute();
	}

	// NOTE: UPDATE EVENT 
	public function update_event_with_image($id, $name, $date, $description, $image, $priority, $address){
		$query = 'UPDATE events SET event_name=' . $this->_db->quote($name) . ', event_date=' . $this->_db->quote($date) . ', event_descri=' . $this->_db->quote($description) . ', event_image=' . $this->_db->quote($image) . ', event_priority=' . $this->_db->quote($priority) . ', event_address=' . $address . ' WHERE event_id=' . $id;
		$this->_db->prepare($query)->execute();
	}

	// NOTE: Select only 3 events with the priority egal to 1
	public function select_priority_events(){
		$query = 'SELECT *
				  FROM events
				  WHERE event_priority = 1
				  AND event_date >= NOW()
				  ORDER BY event_date
				  LIMIT 3';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$address = Db::getInstance()->select_address_with_id($row->event_address);
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $address);
			}
		}
		return $tab;
	}

	// SELECT ALL ASSOC_NAME FROM ASSOC (Zone de recherche navbar)
	public function select_all_assoc__name($keyword){
		$query = 'SELECT assoc_name FROM associations WHERE assoc_name LIKE '.$this->_db->quote($keyword.'%').'LIMIT 0,5';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while ($row = $result->fetch()) {
				$tab[] = ($row->assoc_name);
			}
		}
		return $tab;
	}

	// NOTE: Select all events in present + in future
	public function select_all_events_to_come(){
		$query = 'SELECT * FROM events WHERE event_date >= NOW()';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				$address = Db::getInstance()->select_address_with_id($row->event_address);
				$tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $address);
			}
		}
		return $tab;
	}

	// NOTE: Select an address
	private function select_address_by_id($id){
		$query = 'SELECT * FROM address WHERE  event_address='.$this->$id;
		$result = $this->_db->query($query);

		return $result;
	}


	// NOTE: Select event's address. Passed the event's id in parameter
	/*public function select_address_event($id){
		$query = 'SELECT address_street FROM address, events WHERE events.event_address = address.address_id AND events.event_id ='.$this->_db->quote($id);
		$result = $this->_db->query($query);

		//$address = new Address

		//return $address;
	}*/

	// NOTE: SELECT PRIMARY EVENTS
	public function select_primary_events(){

	}



	// NOTE: DELETE EVENT
	public function delete_event($id){
		$query = 'DELETE FROM events WHERE event_id=' . $this->_db->quote($id);
		$this->_db->prepare($query)->execute();
	}

	// NOTE: INSERT ADDRESS
	public function insert_address($street, $number, $post_code, $post_box){
		$query = 'INSERT INTO address(address_street, address_number, address_post_code, address_post_box) VALUES (:street, :numb, :post_code, :post_box)';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':street', $street);
		$qp->bindValue(':numb', $number);
		$qp->bindValue(':post_code', $post_code);
		$qp->bindValue(':post_box', $post_box, PDO::PARAM_INT);
		$qp->execute();
	}

	// NOTE: SELECT ADDRESS ==> besoin ou pas ?
	private function select_all_address(){

	}

	// NOTE: SELECT AN ADDRESS WITH AN ID
	private function select_address_with_id($id){
		$query = 'SELECT * FROM address WHERE address_id=' . $id;
		$result = $this->_db->query($query)->fetch();
		$town = Db::getInstance()->select_town_with_post_code($result->address_post_code);
		return new Address($result->address_id, $result->address_street, $result->address_number, $town, $result->address_post_box);
	}

	public function update_address($id, $street, $number, $post_code, $post_box){
		$query = 'UPDATE address SET address_street=:street, address_number=:numb, address_post_code=:post_code, address_post_box=:post_box WHERE address_id=:id';
		$qp = $this->_db->prepare($query);
		$qp->bindValue(':id', $id);
		$qp->bindValue(':street', $street);
		$qp->bindValue(':numb', $number);
		$qp->bindValue(':post_code', $post_code);
		$qp->bindValue(':post_box', $post_box, PDO::PARAM_INT);
		$qp->execute();
	}

	// NOTE: SELECT ASSOCIATION AND ADDRESS WITH CHECKED
	public function search_assoc_by_towns_themes($tab_towns, $tab_themes){
		$where_town = Db::getInstance()->where_table($tab_towns, 't.town_post_code'); // clause
		$where_theme = Db::getInstance()->where_table($tab_themes, 'ass.assoc_theme');
		$juncture = 'ass.assoc_address=ad.address_id AND ad.address_post_code=t.town_post_code';
		$query = '	SELECT DISTINCT ass.*, ad.*, t.* FROM associations ass, address ad, towns t
						WHERE ' . $juncture . ' AND ' . $where_town /*. ' AND ' . $where_theme*/;
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while($row = $result->fetch()){
				print_r($row->assoc_address);
				$address = Db::getInstance()->select_address_with_id($row->assoc_address);
				$tab[] = new Association($row->assoc_id, $row->assoc_name, $row->assoc_descri, $address, $row->assoc_phone, $row->assoc_website, $row->assoc_latitude, $row->assoc_longitude, $row->assoc_theme);
			}
		}
		return $tab;
	}

	// SELECT ALL COMMUNE FROM TOWN
	public function select_all_towns(){
		$query = 'SELECT * FROM towns';
		$result = $this->_db->query($query);
		$tab = array();
		if ($result->rowcount() != 0) {
			while ($row = $result->fetch()) {
				$tab[] = new Town($row->town_name, $row->town_post_code);
			}
		}
		return $tab;
	}

	// SELECT ALL COMMUNE FROM TOWN
	public function select_all_themes(){
		$query = 'SELECT assoc_theme FROM associations';
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


	public function select_town_with_post_code($post_code){
		$query = 'SELECT * FROM towns WHERE town_post_code=' . $post_code;
		$result = $this->_db->query($query)->fetch();
		return new Town($result->town_name, $result->town_post_code);
	}
}

?>
