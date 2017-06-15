<!DOCTYPE HTML>
<html>
	<head>
		<title>ConnectBX</title>
		<link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>css/carte-style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>css/events.css">
		<link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>css/style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?php echo VIEWS;?>js/script.js"></script>
    <script type="text/javascript" src="<?php echo VIEWS;?>js/admin.js"></script>
		<script type="text/javascript" src="<?php echo VIEWS;?>bootsrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo VIEWS;?>js/jquery-2.2.4.js"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img alt="logo" src="<?php echo VIEWS;?>Images/logo-01.png" height="30px">
          </a>
        </div>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left" id="searchNavBar">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?action=home">Accueil</a></li>
					<li><a href="index.php?action=admin">Administration</a></li>
          <li><a href="index.php?action=contact">Contact</a></li>
          <li><a href="index.php?action=event">Evenement</a></li>
          <li><a href="index.php?action=aPropos">A propos</a></li>
          <li><a href="index.php?action=map">Map</a></li>
					<!-- Rajouter le lien vers votre page ici -->
					<!-- ex: <li><a href="index.php?action=(le nom que vous voulez)">(Le contenu de la balise a)</a></li> -->
					<?php if(!empty($_SESSION['authentifie'])){?>
					<li><a href="index.php?action=logout">Déconnexion</a></li>
					<?php }?>
				</ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
		</header>
