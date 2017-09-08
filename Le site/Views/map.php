<section id="cartePage">
<div class="content">
<div class="content-inside">
  <h2>Carte Interactive</h2>
  <p>Retrouvez ci-dessous la carte qui contient les associations</p>
  <div id="test">
            <?php 
            if(isset($_GET["search"])) {
              echo $_GET["search"];
            }

            ?>
          </div>

  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-3 menuLeft">
        <h3>Commune</h3>
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
          
        </form>
          <!--<div class="checkbox">
            <label><input type="checkbox" name="commune"value="Ixelles" id="commune1"  />Ixelles</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="commune"value="Forest, Brussels" id="commune2"/>Forest</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="commune"value="Anderlecht" id="commune3"/>Anderlecht</label>
            <br>

            
          </div>-->

          <h3>Catégories</h3>
          <div class="checkbox">
            <label><input type="checkbox" value=""/>Choix</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value=""/>Choix</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value=""/>Choix</label>
          </div>
          <input type="submit" id="submit" value="Envoyer">
        </div>
      </form>
      <div class="col-md-9 col-sm-9 col-xs-9" id="map">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="associationBox">
          <h3 class="titleAssoc">Association dans la zone recherchée</h3>
          <p class="descriptionAssoc">Association à but non lucratif, nous réparons des droïdes endommagés pour faire des combats
            toujours plus épics.</p>
            <p class="adresseAssoc">Rue des Goujons, 152<br />
              1070 Anderlecht<br />
              +32 1 455 67 19 42<br />
              <a href="#">http://www.sitedelassociation.be</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="associationBox">
              <h3 class="titleAssoc">Association dans la zone recherchée</h3>
              <p class="descriptionAssoc">Association à but non lucratif, nous réparons des droïdes endommagés pour faire des combats
                toujours plus épics.</p>
                <p class="adresseAssoc">Rue des Goujons, 152<br />
                  1070 Anderlecht<br />
                  +32 1 455 67 19 42<br />
                  <a href="#">http://www.sitedelassociation.be</a></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="associationBox">
                  <h3 class="titleAssoc">Association dans la zone recherchée</h3>
                  <p class="descriptionAssoc">Association à but non lucratif, nous réparons des droïdes endommagés pour faire des combats
                    toujours plus épics.</p>
                    <p class="adresseAssoc">Rue des Goujons, 152<br />
                      1070 Anderlecht<br />
                      +32 1 455 67 19 42<br />
                      <a href="#">http://www.sitedelassociation.be</a></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="associationBox">
                      <h3 class="titleAssoc">Association dans la zone recherchée</h3>
                      <p class="descriptionAssoc">Association à but non lucratif, nous réparons des droïdes endommagés pour faire des combats
                        toujours plus épics.</p>
                        <p class="adresseAssoc">Rue des Goujons, 152<br />
                          1070 Anderlecht<br />
                          +32 1 455 67 19 42<br />
                          <a href="#">http://www.sitedelassociation.be</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
</div>
</div>
                </section>
