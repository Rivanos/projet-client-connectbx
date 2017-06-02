<?php
class Association{
	private $_name;
	private $_description;
	private $_address;
	private $_phone;
	private $_website;
	private $_localisation;
	private $_categorie;
	
	public function __construct($name, $description, $address, $phone, $website, $localisation, $categorie){
		$this->_name = $name;
		$this->_description = $description;
		$this->_address = $address;
		$this->_phone = $phone;
		$this->_website = $website;
		$this->_localisation = $localisation;
		$this->_categorie = $categorie;
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

	public function categorie(){
		return $this->_categorie;
	}
	
	public function setName($name){
		$this->_name=$name;
	}
	
	public function setDescription($description){
		$this->_description=$description;
	}
	
	public function setAddress($address){
		$this->_address=$address;
	}
	
	public function setPhone($phone){
		$this->_phone=$phone;
	}
	
	public function setWebsite($website){
		$this->_website=$website;
	}
	
	public function setLocalisation($localisation){
		$this->_localisation=$localisation;
	}
	
	public function setCategorie($categorie){
		$this->_categorie=$categorie;
	}
}
?>