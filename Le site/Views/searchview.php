  <?php
  $tableauxRecherche = array();
    if (isset($_GET["motclé"])) {
      require_once '../Models/Db.class.php';
      $tableauxRecherche = Db::getInstance()->select_all_assoc__name($_GET['motclé']);
    }
    foreach ($tableauxRecherche as $key => $value) {
      echo  "<a class='result' target='_blank' href='../Le site/index.php?action=map&search=$value'><p class='resultp'>$value</p></a>";
  } ?>
