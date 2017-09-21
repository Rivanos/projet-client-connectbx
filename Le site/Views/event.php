

<div class="content" >
  <div class="content-inside" >

<div class="container-fluid">
  <h1 class="title-page">Evenements</h1>
  <br/><br/><br/>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#aVenir">Evénements à venir</a></li>
    <li><a data-toggle="tab" href="#passee">Evénements passés</a></li>
  </ul>

  <div class="tab-content">
    <div id="aVenir" class="tab-pane fade in active">

      <div class="container-fluid ">

      <br/><br/><br/>
      <div id="id_container_fluid" class="container-fluid divEventToCome">

        <div class="row" id="row-events">
<!--       <div style="width:340px; height:200px" class="jumbotron"></div> -->

          <?php
            if(sizeof($tableauEvenementsToComed) == 0 ){
              echo "<p>"."Actuellement, il n'y a pas d'événements à venir.."."</p>";
            }

            $clef;
            $compteurPassageLigne=0;
            foreach ($tableauEvenementsToComed as $key => $value){
              $compteurPassageLigne++;
              $clef = $key;
          ?>
              <div class="col-xs-3 col-md-3 offset-md-1 thumbnail event-box">
                <img id="id_image_event" style= "height:auto; width:300px" src="<?= $value->image(); ?>" class="img-events" height="42px" width="42px"/>
                <h3> <?=$value->name()?> </h3>
                <p><strong><?php 
                        $dateEvenement = $value->date();

                        $date = explode("-", $dateEvenement);
                        $annee = $date[0];
                        $mois = $date[1];
                        $jour = $date[2];

                        $date = $jour."/".$mois."/".$annee;

                         echo $date." - "?>

                </strong><?=$value->address()->to_string()?></p>
                <p><strong><p>Description de l'événement:</strong><br/><br/><?= substr($value->description(),0, 140)."...";?><br/></p>
                <!-- <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Lire plus</button>-->
                <a style="text-align:center" name="lien" data-toggle="modal" href="#<?php echo $tableauEvenementsToComed[$key]->id()?>">Lire plus</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="<?php echo $tableauEvenementsToComed[$key]->id() ?>" role="dialog" >
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><?php echo $tableauEvenementsToComed[$key]->name() ?></h4> <!-- <?php //echo $tableauEvenements[$key]["event_name"]?> -->
                    </div>  
                    <div class="modal-body">
                      <img src="<?= $tableauEvenementsToComed[$key]->image(); ?>" style="background-color:silver;" width="550px" height="300px"><br/><br/>
                      <p><u><strong>Description de l'event:</strong></u><br/><br/> <?php echo $tableauEvenementsToComed[$key]->description() ?> </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>

          <?php
            if($compteurPassageLigne == 3){ echo "</div>"; $compteurPassageLigne = 0; echo "<div class='row' id='row-events'>"; } //je ferme ma div Row

        } ?> <!-- Fin Foreach -->

        </div> <!-- ROW -->
    </div>

</div>


    </div> <!-- DIV à venir -->

    <div id="passee" class="tab-pane fade">
      <?php

        if(sizeof($tableauEvenementsPassed) == 0){
            echo "<p>"."Actuellement, il n'y a pas d'événements passés"."</p>";
        }else{
            //echo "Il y a des événements.. ".sizeof($tableauEvenementsPassed);
        } ?>
        
        <br/><br/><br/>
        <div class="container-fluid">
          <div class="row">

              <?php
                  foreach ($tableauEvenementsPassed as $key => $value) { 
                  ?>

                  <div class="col-xs-3 col-md-3 thumbnail event-box"> <!-- col-xs-3 col-lg-6  -->
                  <img style= "height:auto; width:300px" src=<?= $value->image() ?> class="img-events" height="42" width="42"/>   <!-- $value->image() -->

                  <h1> <?=$value->name()?> </h1>
                  <p style="text-align:left"><strong>
                    <?php 

                        $dateEvenement = $value->date();

                        $date = explode("-", $dateEvenement);
                        $annee = $date[0];
                        $mois = $date[1];
                        $jour = $date[2];

                        $date = $jour."/".$mois."/".$annee;

                        echo $date;
                         //echo "ici ".Db::getInstance()->select_address_event($key);  
                        ?>
                  </strong><?php echo $value->address()->to_string() ;?></p>
                  <p><strong>Description de l'événement:</strong><br/><br/>
                    <?= substr($value->description(),0, 140)."...";?>

                  <br/><br/>
                  <!-- <button type="button" id="boutonId" class="btn btn-link" data-toggle="modal" data-target="#myModal">Lire plus</button> -->
                  <a name="lien" data-toggle="modal" href="#<?php echo $tableauEvenementsPassed[$key]->id()?>">Lire plus</a>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="<?php echo $tableauEvenementsPassed[$key]->id() ?>" role="dialog" >
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><?php echo $tableauEvenementsPassed[$key]->name() ?></h4> <!-- <?php //echo $tableauEvenements[$key]["event_name"]?> -->
                    </div>
                    <div class="modal-body">
                      <img src="<?= $tableauEvenementsPassed[$key]->image(); ?>" style="background-color:silver;" width="550px" height="300px"><br/><br/>
                      <p><u><strong>Description de l'event:</strong></u><br/><br/> <?php echo $tableauEvenementsPassed[$key]->description() ?> </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div> <!-- DIV modal -->

              <?php } ?> <!-- Fermeture du foreach -->

            </div> <!-- row -->
        </div> <!-- Container -->

        </div> <!-- DIV passee -->

    </div> <!-- DIV tab-content -->
</div> <!-- DIV container-fluid -->
</div>
</div><!-- DIV peut etre de trop-->
