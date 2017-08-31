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
    <input class="custom-dropdown__select custom-dropdown__select--white" type="submit" name="button" value="Rechercher" />
  <button type="submit" name="button">Rechercher <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>  
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
        <button type="button" class="btn btn-primary btn-lg" name="carte" id="big-btn-map">Accéder à la carte</button>
      </div>
    </div>
  </div>
</div>
<div class="container text-center container-event">
  <h1>Events</h1>
  <div class="col-md-4 col-md-offset-1 event">
    <img src="#" >
    <h1>Event1</h1>
    <p>Description de L'events:<br/>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <div class="col-md-4 col-md-offset-2 event2">
    <img src="#" >
    <h1>Event2</h1>
    <p>Description de L'events:<br/>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div>
<div class="container ambassadeurs">
  <div class="col-md-8 col-md-offset-2 padding-top">
    <h1>Ambassadeurs</h1>
    <p>4 jeunes activistes représentant chacun une problématique pour lequel ils se sont engagés vont durant toute une année être nos ambassadeurs et vont faire connaître leur travail, ainsi que celui de leur collègues-activistes, au grand public via diverses
      plateformes et divers moyens.</p>
  </div>
</div>
</div>
</div>