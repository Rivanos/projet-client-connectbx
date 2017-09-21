<section id="cartePage">
  <div class="content">
    <div class="content-inside">
      <div id='association' class="affichage_resultat_recherche close">
        <div class="container-fluid affichage_association">
          <button id="revealed" class="zone_affichage_association_revealed" >
            <span id="arrow" class="glyphicon glyphicon-arrow-right"></span>
          </button>
          <?php

          $tableau_association = Db::getInstance()->select_all_associations();

          foreach ($tableau_association as $key => $association) { ?>
            <div class="resultat_map">
              <h1 class="nom_association"><?= $association->name(); ?></h1>
              <p class="description"><?= $association->description(); ?></p>
              <a href="becode.org"><p class="website"><?= $association->website(); ?></p></a>
              <p class="numero_phone"><?= $association->phone(); ?></p>
              <p class="adresse"><?= $association->address()->to_string(); ?></p>
            </div>

            <?php } ?>

          </div>
        </div>
        <div class="menuLeft" >
          <h3>Communes</h3>
          <form action="index.php?action=map" method="post">
            <div id="commune_list">
              <?php
              $tab_towns = Db::getInstance()->select_all_towns();
              $i=0;
              foreach ($tab_towns as $town) {
                $i++;
                echo  "<div class='checkbox'><label><input type='checkbox' name='check' value='".$town->name()."' id='commune".$i."'> ".$town->name()."</label></div>";
              }
              ?>
            </div>
            <h3 class='category'>Catégories</h3>
            <div id="category_list">
              <?php
              $tab_themes = Db::getInstance()->select_all_themes();
              $i = 0;
              foreach ($tab_themes as $key => $theme) {
                $i++;
                echo  "<div class='checkbox'><label><input type='checkbox' name='check' value='".$theme."' id='commune".$i."'> ".$theme."</label></div>";
              }
              ?>
            </div>
            <input type="submit" id="submit" value="Rechercher">
          </div>
        </form>
        <div id="map">
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="<?php echo VIEWS;?>js/header-animate.js"></script>
