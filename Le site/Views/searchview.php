

<div class="resultat" id="resultat">


  <?php



  $tableauxRecherche = array();
    if (isset($_GET["motclé"])) {
      require_once '../Models/Db.class.php';
      $tableauxRecherche = Db::getInstance()->select_all_assoc__name($_GET['motclé']);
    }
    foreach ($tableauxRecherche as $key => $value) {
      echo  "<a class='result' href='search=$value'><p class='resultp'>$value</p></a>";

      //echo  "<a class='result' href='index.php?action=map&search=$value'><p class='resultp'>$value</p></a>";

      //<li><a href="/public/projet-client-connectbx/Le%20site/home">Accueil</a></li> <!-- index.php?action=home -->
  } ?>


</div>
