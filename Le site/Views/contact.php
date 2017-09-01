<div id ="container">
  <div class="row">
    <div class="col-md-2 col-md-offset-2 " id="sectionTitle">
      <h2>CONTACT</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2 col-md-offset-2">
      <span id="assosName">ConnectBX</span>
      <h6 class="emptySpace">o</h6>
    </div>
    <div class="col-md-6 col-md-offset-1">
      <p id="contactWelcomeMsg">Dans l'attente de répondre à votre message</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2 col-md-offset-2">
      <p class="contactpInfoStyle">152, rue des Goujons
        <br>
        1070 Anderlecht
      </p>
      <p class="emptySpace"> o</p>
      <p class="contactpInfoStyle">
        Tel: +321-100-0000
        <!--br>
        Fax: +321-100-0001-->
      </p>
      <p class="emptySpace">o</p>
      <p class="contactpInfoStyle">Email:&nbsp;<span id="assosEmail">info@connectbx.com</span></p>
      <ul class="socialNetworkContactBody">
			<li class="socialNetworkContactBodyLi"><a href="https://www.facebook.com/connectbx"><img src="<?php echo VIEWS;?>Images/SocialNetwork/facebook-gray.png"  alt="logoFacebook"/></a></li>
			<li class="socialNetworkContactBodyLi"><a href="3"><img src="<?php echo VIEWS;?>Images/SocialNetwork/twitter-gray.png"  alt="logoTwitter" /></a></li>
			<li class="socialNetworkContactBodyLi"><a href="3"><img src="<?php echo VIEWS;?>Images/SocialNetwork/linkedin-gray.png"  alt="logoLinkedIn"/></a></li>
			<li class="socialNetworkContactBodyLi"><a href="3"><img src="<?php echo VIEWS;?>Images/SocialNetwork/google-gray.png"  alt="logoGoogle+"/></a></li>
			</ul>
    </div>
    <div class="col-md-6 col-md-offset-1">
      <form>
    <div class="arroundInput">
      <input type="text" class="insideInput" placeholder="Nom, Prénom" name="Nom"
      pattern="[a-zA-Z0-9]+\,+[a-zA-Z0-9]" value="">
    </div>
    <div class="arroundInput">
      <input
      type="text" class="insideInput"
      placeholder="Email" name="email"
      pattern="[a-z0-9+.%_-]+@[a-z0-9+.%_-]+\.[a-z{2,3}$]"
      title="Votre adresse mail doit etre sous la forme : johndoe@site.domain" 
      value="">
    </div>
    <div class="arroundInput">
      <input type="text" class="insideInput" placeholder="Sujet" name="sujet" value="">
    </div>
    <div class="arroundInput">
      <textarea class="insideInput" name="message" placeholder="Message" id="comments" rows="5">
      </textarea>
    </div>
    <div class="arroundInput" id="btnPosition">
      <button type="submit" name="envoyer" class="btnStyle">Envoyer</button>
    </div>
  </form>
    </div>
</div>
<p class="emptySpaceEnd"></p>
