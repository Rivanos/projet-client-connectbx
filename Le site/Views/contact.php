<section id="contact">
        <div class="container">
          <h2>Contact</h2>
          <div class="col-sm-12">
            <p><span class="glyphicon glyphicon-map-marker">Bruxelles</span></p>
            <p><span class="glyphicon glyphicon-phone"><em>A renseigner</em></span></p>
            <p><span class="glyphicon glyphicon-envelope">info@connectbx.com</span></p>
          </div>
          <form class="form-horizontal" action="/action_page.php">
            <!--Nom et prénoms-->
            <div class="form-group">
              <label class="control-label col-sm-3" for="Name">Nom :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="nom" placeholder="Enter your name" name="nom">
              </div>
              <label class="control-label col-sm-3" for="firstName">Prénom :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="prenom" placeholder="Enter your firstname" name="nom">
              </div>
            </div>
            <!--email -->
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Email :</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
            </div>
            <!--div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password :</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>
        </div-->
            <!--Multiple select list-->
            <div class="form-group">
              <label class="control-label col-sm-3" for="sel1">Sujet de votre message :</label>
              <div class="col-sm-9">
                <select class="form-control">
            <option>Votre avis sur connectBX</option>
            <option>Potins sur votre conjoint</option>
            <option>Tintin ou Milou</option>
            <option>Le bénévolat</option>
          </select>
              </div>
            </div>
            <!--comments area-->

            <div class="form-group">
              <label class="control-label col-sm-3" for="comment">Laissez votre avis :</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="comment"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3"> Envoyer : </label>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-default btn-sm ">
              <span class="glyphicon glyphicon-envelope"></span>  Submit
              </button>
              </div>
            </div>
          </form>
        </div>
      </section>
