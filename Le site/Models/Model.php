<?php
	
function getBdd(){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=connectbx;charset=utf8', 'root', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));	
	} catch(Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	return $bdd;
}

function getUsers(){
	$bdd = getBdd();
	$users = $bdd->prepare('SELECT * FROM users');
	$users->execute(array($idUser));
	return 
}
	$reponse = $bdd->query('SELECT * FROM jeux_video');

	while($donnees = $reponse->fetch()){
		//echo $donnees['possesseur'];
	}

	$reponse->closeCursor();
?>