<?php
class Event{

	private $_id;
	private $_name;
	private $_date;
	private $_description;
	private $_image;
	private $_nEvent;

	public function __construct($id, $name, $date, $description, $image, $nEvent){
		$this->_id=$id;
		$this->_name=$name;
		$this->_date=$date;
		$this->_description=$description;
		$this->_image=$image;
		$this->_nEvent=$nEvent;
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

	// ajout setters plus tard

}
?>
