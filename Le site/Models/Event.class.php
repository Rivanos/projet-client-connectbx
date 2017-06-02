<?php
class Event{
	
	private $_name;
	private $_date;
	private $_description;
	private $_image;
	private $_nEvent;
	
	public function __construct($name, $date, $description, $image){
		$this->_name=$name;
		$this->_date=$date;
		$this->_description=$description;
		$this->_image=$image;
	}
	
	public function name(){
		return $this->_name;
	}
	
	public function date(){
		return $this->_date;
	}
	
	public function description(){
		return $this->_description;
	}
	
	public function image(){
		return $this->_image;
	}
	
	public function nEvent(){
		return $this->nEvent();
	}
	
	// ajout setters plus tard
	
}
?>