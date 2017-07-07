<?php
class Association{
	private $_id;
	private $_name;
	private $_description;
	private $_address;
	private $_phone;
	private $_website;
	private $_latitude;
	private $_longitude;
	private $_theme;

	public function __construct($id, $name, $description, $address, $phone, $website, $latitude, $longitude, $theme){
		$this->_id = $id;
		$this->_name = $name;
		$this->_description = $description;
		$this->_address = $address;
		$this->_phone = $phone;
		$this->_website = $website;
		$this->_latitude = $latitude;
		$this->_longitude = $longitude;
		$this->_theme = $theme;
	}

	public function id(){
		return $this->_id;
	}
	public function name(){
		return $this->_name;
	}
	public function description(){
		return $this->_description;
	}
	public function address(){
		return $this->_address;
	}
	public function phone(){
		return $this->_phone;
	}
	public function website(){
		return $this->_website;
	}
	public function latitude(){
		return $this->_latitude;
	}
	public function longitude(){
		return $this->_longitude;
	}
	public function theme(){
		return $this->_theme;
	}

	public function set_id($id){
		$this->_id=$id;
	}

	public function set_name($name){
		$this->_name=$name;
	}

	public function set_description($description){
		$this->_description=$description;
	}

	public function set_address($address){
		$this->_address=$address;
	}

	public function set_phone($phone){
		$this->_phone=$phone;
	}

	public function set_website($website){
		$this->_website=$website;
	}

	public function set_latitude($latitude){
		$this->_latitude=$latitude;
	}

	public function set_longitude($longitude){
		$this->_longitude=$longitude;
	}

	public function set_theme($theme){
		$this->_theme=$theme;
	}
}
?>
