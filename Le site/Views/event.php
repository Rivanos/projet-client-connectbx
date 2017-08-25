
<div class="container-fluid">
  <br/><br/><br/>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#aVenir">Evénements à venir</a></li>
    <li><a data-toggle="tab" href="#passee">Evénements passés</a></li>
  </ul>

  <div class="tab-content">
    <div id="aVenir" class="tab-pane fade in active">

      <div class="container-fluid text-center">

      <br/><br/><br/>
      <div class="container">
        <div class="row" id="row-events">
<!--       <div style="width:340px; height:200px" class="jumbotron"></div> -->

          <div class="col-md-3 offset-md-1 thumbnail event-box">
            <img src="#" class="img-events"/>            
            <h3>Nom de l'event I</h3>
            <p><strong>Date de l'event</strong><br />Lieu de l'événement</p>
            <p><strong>Description de l'event:</strong><br/>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem..</p>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Lire plus</button>
          </div>

          <div class="col-md-3 offset-md-1 thumbnail event-box">
            <img src="#" class="img-events"/>            
            <h3>Nom de l'event II</h3>
            <p><strong>Date de l'event</strong><br />Lieu de l'événement</p>
            <p><strong>Description de l'event:</strong><br/>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem..</p>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Lire plus</button>
          </div>

          <div class="col-md-3 offset-md-1 thumbnail event-box">
            <img src="#" class="img-events"/>            
            <h3>Nom de l'event III</h3>
            <p><strong>Date de l'event</strong><br />Lieu de l'événement</p>
            <p><strong>Description de l'event:</strong><br/>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem..</p>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Lire plus</button>
          </div>

        </div> <!-- ROW -->
    </div>

</div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nom de l'événement</h4>
        </div>
        <div class="modal-body">
          <img src="" style="background-color:silver;" width="550px" height="300px"><br/><br/>
          <p><u>Description de l'event:</u><br/><br/>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

    </div>

    <div id="passee" class="tab-pane fade">
      <?php

        if(sizeof($tableauEvenementsPassed) == 0 ){
            echo "<p>"."Actuellement, il n'y a pas d'événements passés"."</p>";
        }else{
            //echo "Il y a des événements.. ".sizeof($tableauEvenementsPassed);
        } ?>

        <div class="container-fluid">
          <div class="row">

              <?php
                  foreach ($tableauEvenementsPassed as $key => $value) {
                  echo '<div class="col-md-3 thumbnail event-box">';
                  echo '<img src="#" class=" img-events" />'; ?>

                  <?php echo "<h1>".$value->name()."</h1>" ?>
                  <p style="text-align:left">
                    <?php echo $value->date()." - ".$value->address() ?>
                  </p>
                  <p>Description de l'événement:<br/>
                    <?php echo $value->description();
                          echo '<button type="button" id="boutonId" class="btn btn-link" data-toggle="modal" data-target="#myModal">Lire plus</button> ';
                    ?>

              <?php echo '</div>' ;} ?> <!-- Fermeture du foreach -->

                  </p>
            </div>
        </div>
        </div>
    </div>

</div>
