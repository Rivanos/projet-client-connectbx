<?php
class HomeController{ // le nom de votre controller
	
	public function __construct(){ // permet de créer le controller
		
	}
	
	public function run(){ // la méthode appelée dans index.php
		
		require_once VIEWS . 'home.php'; // affiche la vue (votre page html)
	}
	
}
?>