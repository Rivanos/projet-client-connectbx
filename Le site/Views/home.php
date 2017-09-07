<div class="jumbotron fond text-center">

  <div class="container">
   <span id="title-jumbotron">La Porte principale des jeunes
vers le monde associatif.</span></div>
  <form class="recherche_on_map_of_assoc" action="index.php?action=map" method="get">
    <select class="custom-dropdown__select custom-dropdown__select--white commune">
      <option class="disable">Choisissez votre Commune</option>
      <?php

      $tableau_commune = array();
        require_once 'Models/Db.class.php';
          $tableau_commune = Db::getInstance()->select_all_commune();

        foreach ($tableau_commune as $key => $value) {
          echo  "<option value='".$value."'>".$value."</option>";
      }

      ?>
    </select>
    <select class="custom-dropdown__select custom-dropdown__select--white theme">
      <option class="disable">Choisissez votre Thème</option>

      <?php

      $tableau_theme = array();
        require_once 'Models/Db.class.php';
          $tableau_theme = Db::getInstance()->select_all_theme();

        foreach ($tableau_theme as $key => $value) {
          echo  "<option value=''>".$value."</option>";
      }

      ?>
    </select>
      <span class=""><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></span>
      <input class="custom-dropdown__select custom-dropdown__select--white " type="submit" name="button" value="Rechercher" />  
</form>
</div>
<div class="content">
<div class="content-inside">
<div class="container text-center">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel">
      <div class="panel-heading">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </div>
      <div class="panel-body">
        <a href="index.php?action=map"><button type="button" class="btn btn-default btn-lg" name="carte" id="big-btn-map">Accéder à la carte</button></a>
      </div>
    </div>
  </div>
</div>


<div class="container text-center container-event">
  <h2>Events</h2>
  <div class="row">

  <?php
    $nombreDEvenementPrioritaires = sizeof($tableauEvenementsPrioritaire);

    switch ($nombreDEvenementPrioritaires) {
      case 0: ?>
        <p>Actuellement, il n'y a pas d'événements prioritaires!</p> 
    <?php
      break;
      case 1:
        foreach ($tableauEvenementsPrioritaire as $key => $value){  
    ?>
          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event">
            <h3> <?=$value->name()?> </h3>
            <img src="<?= $value->image(); ?>" class="img-events" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
          </div>   
    <?php }
      break;
      case 2:
        foreach ($tableauEvenementsPrioritaire as $key => $value){  
    ?>
          <div class="col-xs-4  offset-md-4 col-md-4 thumbnail event-box event">
            <h3> <?=$value->name()?> </h3>
            <img src="<?= $value->image(); ?>" class="img-events" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
          </div>   
    <?php }
        break;
      case 3:
        foreach ($tableauEvenementsPrioritaire as $key => $value){
    ?>
          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event">
            <h3> <?=$value->name()?> </h3>
            <img src="<?= $value->image(); ?>" class="img-events" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
          </div>
    <?php } ?>
        </div> <!-- Fin div row -->
        </div> <!-- Fin container -->
        <?php break;
    }?> <!-- Fin case -->

</div>
</div>