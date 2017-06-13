<!DOCTYPE HTML>
<html>
	<head>
		<title>ConnectBX</title>
		<link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>css/bootstrap/css/bootstrap.min.css?">
		<link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>css/style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="Views/js/admin.js"></script>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li><a href="index.php?action=home">Accueil</a></li>
					<li><a href="index.php?action=admin">Administration</a></li>
					<li><a href="index.php?action=contact">Contact</a></li>
					<!-- Rajouter le lien vers votre page ici -->

					<!-- ex: <li><a href="index.php?action=(le nom que vous voulez)">(Le contenu de la balise a)</a></li> -->
					<?php if(!empty($_SESSION['authentifie'])){?>
					<li><a href="index.php?action=logout">Déconnexion</a></li>
					<?php }?>
				</ul>
			</nav>
		</header>
