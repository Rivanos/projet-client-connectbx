$('#menu-nav').css('top', '-43px')
$('body').css('padding', '0')
$('#menu-nav').hover(function() {
  $('#menu-nav').css('top', '0')
  $('body').css('padding', '50px 0 0 0')
  $('affichage_association').css('height', 'calc(100vh - 50px)')
  $('.menuLeft').css('height', 'calc(100vh - 50px)')
  $('#map').css('height', 'calc(100vh - 50px)')
  $('.affichage_resultat_recherche').css('height', 'calc(100vh - 50px)')
},function() {
  $('#menu-nav').css('top', '-43px')
  $('body').css('padding', '0')
  $('affichage_association').css('height', '100vh')
  $('.menuLeft').css('height', '100vh')
  $('#map').css('height', '100vh')
  $('.affichage_resultat_recherche').css('height', '100vh')
});
