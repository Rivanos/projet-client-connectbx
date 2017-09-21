<?php
class Event{

	private $_id;
	private $_name;
	private $_date;
	private $_time;
	private $_description;
	private $_image;
	private $_priority;
	private $_address;

	public function __construct($id, $name, $datetime, $description, $image, $priority, $address){
		$this->_id=$id;
		$this->_name=$name;
		$this->_date = date('Y-m-d',strtotime($datetime));
		$this->_time = date('H:i:s',strtotime($datetime));
		$this->_description=$description;
		$this->_image=$image;
		$this->_priority=$priority;
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

	public function time(){
		return $this->_time;
	}

	public function description(){
		return $this->_description;
	}

	public function image(){
		return $this->_image;
	}

	public function priority(){
		return $this->_priority;
	}

	public function address(){
		return $this->_address;
	}
	

	// ajout setters plus tard

}
?>
