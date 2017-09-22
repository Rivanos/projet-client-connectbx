<div id="jumbotron" class="jumbotron fond text-center">

  <div class="container">
    <span id="title-jumbotron">La Porte principale des jeunes
      vers le monde associatif.</span></div>
      <form class="recherche_on_map_of_assoc" action="map" method="get"> <!-- index.php?action= -->  
        <select name="commune" class="custom-dropdown__select custom-dropdown__select--white select-home">
          <option name="com" class="disable">Choisissez votre Commune</option>
          <?php

      foreach ($tab_towns as $town) {
        echo  "<option value='".$town->post_code()."'>".$town->name()."</option>";
      }
          ?>
        </select>
        <select name="themes" class="custom-dropdown__select custom-dropdown__select--white select-home">
          <option class="disable">Choisissez votre Thème</option>

          <?php


        foreach ($tab_themes as $key => $value) {
          echo  "<option value='$value'>".$value."</option>";
      }


          ?>
        </select>
        <input class="custom-dropdown__select custom-dropdown__select--white select-home" type="submit" name="button" value="Rechercher" />
      </form>
      <a href="commune=kykuhykiuy&themes=refer">oskjfposjrpoif</a>
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
                <a href="map"><button type="button" class="btn btn-default btn-lg" name="carte" id="big-btn-map">Accéder à la carte</button></a>
              </div>
            </div>
          </div>
        </div>

<div class="container text-center container-event">
  <h1>Evénements à venir</h1>

  <div class="row">

            <?php
            $nombreDEvenementPrioritaires = sizeof($tableauEvenementsPrioritaire);

    switch ($nombreDEvenementPrioritaires) {
      case 0: ?>
        <p>Actuellement, il n'y a pas d'événements prioritaires!</p> 
    <?php
      break;
      case 1:
        //foreach ($tableauEvenementsPrioritaire as $key => $value){  

    ?>
          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event shadow">
            <h1 style="font-size:24px; color:green"> <?=$tableauEvenementsPrioritaire[0]->name()?> </h1>
            <img src="<?= $tableauEvenementsPrioritaire[0]->image(); ?>" class="img-events" height="42px" width="42px"/>
          </div>   

          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event img-responsive">
              
            <p><br/><br/><br/> <?= $tableauEvenementsPrioritaire[0]->description();?> </p>
            <a href="event" data-target="#myModal">Lire plus</a>





          </div> 

    <?php //}
      break;
      case 2:
        foreach ($tableauEvenementsPrioritaire as $key => $value){  
    ?>
          <div class="col-xs-4  offset-md-4 col-md-4 thumbnail event-box event shadow">
            <h1 style="font-size:24px; color:green"> <?=$value->name()?> </h1>
            <img src="<?= $value->image(); ?>" class="img-events img-responsive" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
            <a href="event">Lien</a>
            <a name="lien" data-toggle="modal" href="#<?php echo $tableauEvenementsPrioritaire[$key]->id()?>">Lire plus</a>
          </div>   
    <?php }
        break;
      case 3:
        foreach ($tableauEvenementsPrioritaire as $key => $value){
    ?>
          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event">
            <h1 style="font-size:24px; color:green"> <?=$value->name()?> </h1>
            <img src="<?= $value->image(); ?>" class="img-events img-responsive shadow" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
            <a href="event">Lien</a>
          </div>
    <?php } ?>
        </div> <!-- Fin div row -->
        </div> <!-- Fin container -->
        <?php break;
    }?> <!-- Fin case -->
              </div>
            </div>
          </div>
