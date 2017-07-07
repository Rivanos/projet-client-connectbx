<?php

	class User{

		private $_id;
		private $_name;
		private $_first_name;
		private $_birthdate;
		private $_email;
		private $_login;
		private $_pwd;

		public function __construct($id, $name, $first_name, $birthdate, $email, $login, $pwd){
			$this->_id = $id;
			$this->_name = $name;
			$this->_first_name = $first_name;
			$this->_birthdate = $birthdate;
			$this->_email = $email;
			$this->_login = $login;
			$this->_pwd = $pwd;
		}

		public function id(){
			return $this->_id;
		}

		public function name(){
			return $this->_name;
		}
		
		public function first_name(){
			return $this->_first_name;
		}
		
		public function birthdate(){
			return $this->_birthdate;
		}
		
		public function email(){
			return $this->_email;
		}
		
		public function login(){
			return $this->_login;
		}
		
		public function pwd(){
			return $this->_pwd;
		}

	}

?>