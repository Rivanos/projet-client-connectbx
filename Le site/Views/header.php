<!DOCTYPE HTML>
<html>
<head>

  <title>ConnectBx, recherche ton association</title>
  <link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo VIEWS;?>css/style.css">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo VIEWS;?>Images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo VIEWS;?>Images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo VIEWS;?>Images/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php echo VIEWS;?>Images/favicon/manifest.json">
  <link rel="mask-icon" href="<?php echo VIEWS;?>Images/favicon/safari-pinned-tab.svg" color="#2daf37">
  <meta name="theme-color" content="#ffffff">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Content-Type" content="UTF-8">
  <meta name="Content-Language" content="fr">
  <meta name="Description" content="||| ConnectBX |||
  La Porte Principale des jeunes vers le monde associatif bruxellois.">
  <meta name="Keywords" content="Jeunesse, jeune, association, recherche, bénévolat, évenements, blog">
  <meta name="Subject" content="Monde associatif">
  <meta name="Author" content="Becode.org">
  <meta name="Publisher" content="ConnectBx">
  <meta name="Identifier-Url" content="http://www.connectbx.be/">
  <!-- Newsletter MailChimp -->
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/facdb990651a80ea47a373e93/bd9198f17e0d25266fb53acd7.js");</script>

</head>
<body>
  <header id="header">
    <nav id="menu-nav" class="navbar navbar-default navbar-fixed-top
    <?php if (isset($_GET['action']) && $_GET['action'] === 'map') {
      echo "header_animate";
    } ?>
    ">
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
          <a class="navbar-brand" href="home">
            <img alt="logo" src="<?php echo VIEWS;?>Images/logo-01.png" height="35px" id="logo-navbar">
          </a>
        </div>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left" id="searchNavBar">
          <div class="form-group">
            <input type="text" id="recherche" class="form-control" placeholder="Rechercher l'association..." autocomplete="off">
          </div>
          <?php

          include 'searchview.php';

          ?>
        </form>
        <ul class="nav navbar-nav navbar-right">

          <li><a href="home">Accueil</a></li>
          <!-- index.php?action=home -->
          <li><a href="map">Map</a></li>
          <!-- index.php?action=map -->
          <li><a href="event">Evenement</a></li>
          <!-- index.php?action=event -->
          <li><a href="activities">Organisation</a></li>
          <!-- index.php?action=activities -->
          <li><a href="aPropos">A propos</a></li>
          <!-- index.php?action=aPropos -->
          <li><a href="contact">Contact</a></li>
          <!-- index.php?action=contact -->
          <li><a href="admin">Administration</a></li>
          <!-- index.php?action=admin -->

          <?php if(!empty($_SESSION['logged'])){?>
            <li><a href="logout">Déconnexion</a></li>
            <?php }?>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
  <div id="frame">
