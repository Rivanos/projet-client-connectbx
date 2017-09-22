</div>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<ul class="socialNetwork">
				<li class="socialNetworkLI"><a href="https://www.facebook.com/connectbx/"><img src="<?php echo VIEWS;?>Images/SocialNetwork/facebook-green.png" class="logoSocialNetwork" alt="logoFacebook" width="35"/></a>&nbsp;<a href="https://www.facebook.com/connectbx/"><span class="nameSN">Facebook</span></a></li>
				<li class="socialNetworkLI"><a href="https://twitter.com/Connectbx3"><img src="<?php echo VIEWS;?>Images/SocialNetwork/twitter-green.png" class="logoSocialNetwork" alt="logoTwitter"  width="35"/></a>&nbsp;<a href="https://twitter.com/Connectbx3"><span class="nameSN">Twitter</span></a></li>
				<li class="socialNetworkLI"><a href="#"><img src="<?php echo VIEWS;?>Images/SocialNetwork/instagram-green.png" class="logoSocialNetwork" alt="logoInstagram"  width="35"/></a>&nbsp;<a href="#"><span class="nameSN">Instagram</span></a></li>
			</ul>
		</div>
		<div class="row">
			<div class="newsletter">
				<div class="form-group">
					<form class="form-inline" action="newletters.php">
						<input type="text" class="form-control" placeholder="Votre adresse mail" id="input-newsletter" />
						<button type="button" class="btn btn-default" id="btn-newsletter">Inscription</button>
					</form>
				</div>
			</div>
		</div>

	</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="copyright">
				Copyright © <a href="#">BeCode</a> 2017, tous droits réservés
			</div>
		</div>
	</div>

</footer>
<script type="text/javascript" src="<?php echo VIEWS;?>js/jquery-2.2.4.js"></script>
<script type="text/javascript" src="<?php echo VIEWS;?>bootstrap/js/bootstrap.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPuNlEkwhQVdbWWZ12PyfUubvQ6ABcClg&callback=initMap"></script>
<script type="text/javascript" src="<?php echo VIEWS;?>js/search.js"></script>

<?php if(isset($_SESSION['logged']) && $_SESSION['logged']){ ?>
<script type="text/javascript" src="<?php echo VIEWS;?>js/admin.js"></script>
<?php } else { ?>
<script type="text/javascript" src="<?php echo VIEWS;?>js/script.js"></script>
<?php } ?>
<script src="https://unpkg.com/jquery-aniview@1.0.1/dist/jquery.aniview.js"

	integrity="sha384-zDA6q/t525x7f6KD/OaOe24vCxSPU3eraILc2NU+ZA7ISsc3ExQbj8PB56FRMq6H"
	crossorigin="anonymous"></script>
<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script src="Views/js/animate.js"></script>
<script>
	var config = {
		easing : 'ease',
		duration : '800',
		scale : 0
	};

	window.sr = ScrollReveal();
	sr.reveal(".event2", config,300);
	sr.reveal(".event", config, 500);
</script>
</body>
</html>