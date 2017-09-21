<div class="jumbotron fond text-center">
  <div class="container">
  <span id="title-jumbotron">La Porte principale des jeunes
vers le monde associatif.</span></div>
  <select class="commune" name="commune">
    <option class="disable" value="">Commune</option>
    <option value="">Anderlecht</option>
    <option value="">Bruxelles</option>
    <option value="">Etterbeek</option>
    <option value="">Jette</option>
    <option value="">Evere</option>
    <option value="">Ganshoren</option>
    <option value="">Ixelles</option>
    <option value="">Koekelberg</option>
    <option value="">Auderghem</option>
    <option value="">Schaerbeek</option>
    <option value="">Berchem-Sainte-Agathe</option>
    <option value="">Saint-Gilles</option>
    <option value="">Molenbeek-end-Saint-Jean</option>
    <option value="">Saint-Josse-ten-Noode</option>
    <option value="">Woluwe-Saint-Lambert</option>
    <option value="">Woluwe-Saint-Pierre</option>
    <option value="">Uccle</option>
    <option value="">Forest</option>
    <option value="">Watermael-Boitsfort</option>
  </select>
  <select class="themes" name="themes">
    <option class="disable" value="">Thématique</option>
    <option value="">Lorem</option>
    <option value="">Ipsum</option>
    <option value="">Lorem</option>
    <option value="">Ipsum</option>
    <option value="">Lorem</option>
  </select>
  <button type="submit" name="button">Rechercher <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
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
        <button type="button" class="btn btn-primary btn-lg" name="carte" id="big-btn-map">Accéder à la carte</button>
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
          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event">
            <h1 style="font-size:24px; color:green"> <?=$tableauEvenementsPrioritaire[0]->name()?> </h1>
            <img src="<?= $tableauEvenementsPrioritaire[0]->image(); ?>" class="img-events" height="42px" width="42px"/>
          </div>   

          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event">
              
            <p><br/><br/><br/> <?= $tableauEvenementsPrioritaire[0]->description();?> </p>
          </div> 

    <?php //}
      break;
      case 2:
        foreach ($tableauEvenementsPrioritaire as $key => $value){  
    ?>
          <div class="col-xs-4  offset-md-4 col-md-4 thumbnail event-box event">
            <h1> <?=$value->name()?> </h1>
            <img src="<?= $value->image(); ?>" class="img-events" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
          </div>   
    <?php }
        break;
      case 3:
        foreach ($tableauEvenementsPrioritaire as $key => $value){
    ?>
          <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box event">
            <h1> <?=$value->name()?> </h1>
            <img src="<?= $value->image(); ?>" class="img-events" height="42px" width="42px"/>
            <p><br/> <?= substr($value->description(),0, 140)."...";?> </p>
          </div>
    <?php } ?>
        </div> <!-- Fin div row -->
        </div> <!-- Fin container -->
        <?php break;
    }?> <!-- Fin case -->

<div class="container ambassadeurs">
  <div class="col-md-8 col-md-offset-2 padding-top">
    <h1>Ambassadeurs</h1>
    <p>4 jeunes activistes représentant chacun une problématique pour lequel ils se sont engagés vont durant toute une année être nos ambassadeurs et vont faire connaître leur travail, ainsi que celui de leur collègues-activistes, au grand public via diverses
      plateformes et divers moyens.</p>
  </div>
</div>

</div>
</div>