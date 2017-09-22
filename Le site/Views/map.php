<section id="cartePage">


  <!-- if query from home => gets the response in input -->
  <?php if(isset($_GET['search']) || isset($_POST['town']) || isset($_POST['theme'])){ ?>
    <input type="hidden" id="json" value="<?=$json?>">
    <?php } ?>
    <div class="content">
      <div class="content-inside">
        <div id='association' class="affichage_resultat_recherche">
          <div id='affichage_association' class="container-fluid affichage_association">
            <div class="container-fluid">
              <button class="btn-filtre" data-toggle="collapse" data-target="#filtre">
                <span id="arrow" class="glyphicon glyphicon-search"></span>Filtre
              </button>
            </div>
            <div id="filtre" class="collapse">
              <div class="menuLeft" >
                <form id="recherche_on_map" action="index.php?action=map" method="post">
                  <div id="commune_list" class="scrollbar col-md-6">
                    <h3>Communes</h3>
                    <?php
                    $tab_towns = Db::getInstance()->select_all_towns();

                    $i=0;
                    foreach ($tab_towns as $town) {
                      $i++;


                      ?>
                      <div class='checkbox'>
                        <label>
                          <input type='checkbox' name='communeCheckbox' value='<?= $town->post_code()?>' id='commune".$i."' <?php if(!empty($_GET['town']) && $town->post_code()==$_GET["town"]){ echo "checked";} ?>> <?=$town->name()?>
                        </label>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                  <div id="category_list" class="col-md-6">
                    <h3 class='category'>Catégories</h3>
                    <?php
                    $tab_themes = Db::getInstance()->select_all_themes();
                    $i = 0;
                    foreach ($tab_themes as $key => $theme) {

                      $i++;
                      echo  "<div class='checkbox'><label><input type='checkbox' name='themesCheckbox' value='".$theme."' id='commune".$i."'> ".$theme."</label></div>";
                    }
                    ?>
                  </div>
                  <!-- <input type="submit" id="submit" value="Rechercher"> -->
                  <button type="submit" name="envoyer" id="submitMap" class="btnStyle">Rechercher</button>
                </form>
              </div>
            </div>
            <?php
            $tableau_association = array();
            $tableau_association = Db::getInstance()->select_all_associations();

            foreach ($tableau_association as $key => $association) { ?>
              <a class="website" href="<?= $association->website(); ?>">
                <div class="offer offer-danger">
                  <div class="shape">
                    <div class="shape-text">
                      <span class="glyphicon glyphicon glyphicon-eye-open"></span>
                    </div>
                  </div>
                  <div class="offer-content">
                    <h1 class="nom_association"><?= $association->name(); ?></h1>
                    <p class="description"><?= $association->description(); ?></p>
                    <p class="numero_phone"><?= $association->phone(); ?></p>
                    <p class="adresse"><?= $association->address()->to_string(); ?></p>
                  </div>
                </div>
              </a>

              <?php } ?>


            </div>
          </div>

          <div id="map" class="hidden-sm-down"></div>

        </div>
      </div>
    </section>
