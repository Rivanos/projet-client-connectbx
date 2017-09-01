<?php 
class Town {
	
	private $_name;
	private $_post_code;

	public function __construct($name, $post_code){
		$this->_name = $name;
		$this->_post_code = $post_code;
	}	

	public function name(){
		return $this->_name;
	}
	public function post_code(){
		return $this->_post_code;
	}
}
?>