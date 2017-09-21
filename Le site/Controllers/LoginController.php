<?php

class LoginController{

	public function __construct(){

	}

	public function run(){
		

		// if (!empty($_SESSION['logged']) && $_SESSION['logged']) {
		// 	header("Location: index.php?action=home"); # redirection HTTP vers l'action login
		// 	die();
		// }

		$notification="";
		if (empty($_POST['login'])) {
			# L'utilisateur doit remplir le formulaire
			$notification='Vous êtes sur un espace sécurisé, veuillez vous authentifier';
		} elseif (!Db::getInstance()->validate_user($_POST['login'], $_POST['password'])) {
			# L'authentification n'est pas correcte
			$notification='Vos données d\'authentification ne sont pas correctes.';
		} else {
			# L'utilisateur est bien authentifié
			# Une variable de session $_SESSION['authenticated'] 	est créée
			$_SESSION['logged'] = true;
			$_SESSION['login'] = $_POST['login'];
			if($_SESSION['login'] == "admin"){
				$_SESSION['admin'] = true;
 			}
			# Redirection HTTP pour demander la page admin
			header("Location: index.php?action=admin");
			die();
		}

		require_once (VIEWS . 'login.php');

	}

}
