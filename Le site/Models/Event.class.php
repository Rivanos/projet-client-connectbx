<?php
class Event{

	private $_id;
	private $_name;
	private $_date;
	private $_description;
	private $_image;
	private $_nEvent;

	private $_address;

	public function __construct($id, $name, $date, $description, $image, $nEvent, $address){
		$this->_id=$id;
		$this->_name=$name;
		$this->_date=$date;
		$this->_description=$description;
		$this->_image=$image;
		$this->_nEvent=$nEvent;

		$this->_address=$address;
	}

	public function id(){
		return $this->_id;
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
		return $this->_nEvent;
	}

	//getter address
	public function address(){
		return $this->_address;
	}
	

	// ajout setters plus tard

}
?>
