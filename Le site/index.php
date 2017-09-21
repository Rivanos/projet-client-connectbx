<?php

// commence une session utilisateur
session_start();

// déclaration de variables globales
define ('VIEWS', 'Views/');
define ('CONTROLLER', 'Controllers/');
define ('SESSION_ID', session_id());

// charge les modèles
function loadClass($class){
	require_once ('Models/' . $class . '.class.php');
}
spl_autoload_register('loadClass');

// affiche le header
require_once VIEWS . 'header.php';

$action = (isset($_GET['action'])) ? htmlentities($_GET['action']) : 'default';

// si authentifié => charge le controleur de la page demandée (admin)
if(isset($_SESSION['authentifie'])){
	// quelle action ?
	switch($action){
		case 'admin' :
			require_once (CONTROLLER . 'AdministrationController.php'); // appelle le fichier du controleur
			$controller = new AdministrationController(); // crée un nouveau controleur du fichier chargé et le stocke dans une variable
			break;
		case 'logout' :
			require_once (CONTROLLER . 'LogoutController.php');
			$controller = new LogoutController();
			break;
		default:
			require_once (CONTROLLER . 'AdministrationController.php');
			$controller = new AdministrationController();
			break;
	}

// sinon (pas authentifié) => charge le controleur de la page demandée (user)
} else {
	switch($action){
		case 'home' :
			require_once (CONTROLLER . 'HomeController.php');
			$controller = new  HomeController();
			break;
		case 'admin' :
			require_once (CONTROLLER . 'LoginController.php');
			$controller = new LoginController();
			break;
     case 'map' :
			require_once (CONTROLLER . 'MapController.php');
			$controller = new MapController();
			break;
     case 'contact':
			require_once (CONTROLLER . 'ContactController.php');
			$controller = new ContactController();
			break;
    case 'event' :
			require_once (CONTROLLER . 'EventController.php');
			$controller = new EventController();
			break;
    case 'aPropos' :
			require_once (CONTROLLER . 'aProposController.php');
			$controller = new aProposController();
			break;
    case 'activities' :
			require_once (CONTROLLER . 'activitiesController.php');
			$controller = new activitiesController();
			break;			
      /*
		case '(le nom que vous avez donné à votre lien dans le header)' :
			require_once (CONTROLLER . '(le nom de votre fichier controller)');
			$controller = new (le controleur)();
			break;	*/
	 default:
			require_once (CONTROLLER .'HomeController.php');
			$controller = new  HomeController();
			break;
	}
}

// Lance la méthode run() du controleur appelé dans le switch case
// la méthode run affichera la vue demandée (le contenu quoi)
$controller->run();

// affiche le footer
require_once VIEWS . 'footer.php';

?>
