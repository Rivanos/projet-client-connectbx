<?php 
class Address {
	private $_id;
	private $_street;
	private $_number;
	private $_town;
	private $_post_box;

	public function __construct($id, $street, $number, $town, $post_box){
		$this->_id = $id;
		$this->_street = $street;
		$this->_number = $number;
		$this->_town = $town;
		$this->_post_box = $post_box;
	}

	public function id(){
		return $this->_id;
	}
	public function street(){
		return $this->_street;
	}
	public function number(){
		return $this->_number;
	}
	public function town(){
		return $this->_town;
	}
	public function post_box(){
		return $this->_post_box;
	}
	public function to_string(){
		return $this->_street . ' ' . $this->_number . ', ' . $this->_town;
	}
}
 ?>