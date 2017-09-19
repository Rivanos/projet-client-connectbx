<section id="cartePage">
  <div id="test">

  </div>
  <div class="content">
    <div class="content-inside">
      <div id='association' class="affichage_resultat_recherche close">
        <div class="container-fluid affichage_association">
          <button id="revealed" class="zone_affichage_association_revealed" >
            <span id="arrow" class="glyphicon glyphicon-arrow-right"></span>
          </button>
          <?php
          echo "test";
          $tableau_association = array();
          //$tableau_association = Db::getInstance()->select_all_associations();
          print_r($tableau_association);

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

              $tableau_commune = Db::getInstance()->select_all_towns();
              $i=0;
              foreach ($tableau_commune as $key => $value) {
                $i++;
                echo  "<label><input type='checkbox' name='communeCheckbox[]' value='".$value->post_code()."' id='commune".$i."'> ".$value->name()."</label><br>";
              }

              ?>
            </div>
            <h3 class='category'>Catégories</h3>
            <div id="category_list">
              <?php
              $tableau_theme = Db::getInstance()->select_all_themes();
              $i=0;
              foreach ($tableau_theme as $key => $value) {
                $i++;
                echo  "<input type='checkbox' name='check' value='".$value."' id='category".$i."'> ".$value."<br>";
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
