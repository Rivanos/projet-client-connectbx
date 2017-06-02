<?php
	
	try(){
		$bdd = new PDO('mysql:host=localhost;dbname=connectbx;charset=utf8', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));	
	} catch(Exception $e) {
		die('Erreur : ' . $e.getMessage());
	}
	

?>