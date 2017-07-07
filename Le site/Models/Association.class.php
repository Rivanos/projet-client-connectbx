<?php
class Association{
	private $_id;
	private $_name;
	private $_description;
	private $_address;
	private $_phone;
	private $_website;
	private $_localisation;
	private $_theme;

	public function __construct($id, $name, $description, $address, $phone, $website, $localisation, $theme){
		$this->_id = $id;
		$this->_name = $name;
		$this->_description = $description;
		$this->_address = $address;
		$this->_phone = $phone;
		$this->_website = $website;
		$this->_localisation = $localisation;
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
	public function localisation(){
		return $this->_localisation;
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

	public function set_localisation($localisation){
		$this->_localisation=$localisation;
	}

	public function set_theme($theme){
		$this->_theme=$theme;
	}
}
?>
