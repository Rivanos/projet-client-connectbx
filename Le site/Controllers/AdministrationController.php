<?php
class AdministrationController{
	
	public function __construct(){
		
	}
	
	public function run(){	
		
		for($i=0 ; $i<9 ; $i++) {
		
			$tabAssociations[] = new Association("connect", "description", "rue des goujons 152", "0472281058", "connectbx.be", 123456,"categorie");
		
		}
		
		for($i=0 ; $i<6 ; $i++) {
		
			$tabEvents[] = new Event("MegaParty", "à la saint glinglin", "viens ça va être bien, regarde tout ce qu'on peut faire !", "insérer image ici");
			
		}
		
		require_once VIEWS . 'administration.php';

		/*case 'adminAssociation':
			require_once (CONTROLLER . 'AdminAssociationController.php');
			$controller = new AdminAssociationController();
			break;*/
	}
	
}
?>