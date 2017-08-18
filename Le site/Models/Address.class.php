<?php 
class Address {
	private $_id;
	private $_street;
	private $_number;
	private $_town;
	private $_post_code;
	private $_post_box;

	public function __construct($id, $street, $number, $town, $post_code, $post_box){
		$this->_id = $id;
		$this->_street = $street;
		$this->_number = $number;
		$this->_town = $town;
		$this->_post_code = $post_code;
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
	public function post_code(){
		return $this->_post_code;
	}
	public function post_box(){
		return $this->_post_box;
	}
}
 ?>