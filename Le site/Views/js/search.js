$(document).ready(function(){

  $("#recherche").keyup(function(){
    var recherche = $(this).val();
    var key = 'motclé=' + recherche;
      if (recherche.length >= 0) {

        $.ajax({
          type : "GET",
          url : "Views/searchview.php",
          data : key,
          success : function(server_response){
            $("#resultat").html(server_response).show();
            $("#resultat").addClass("resultat");
          }
        });
      }
  });

  $("#recherche").focusout(function(){
    $("#resultat").empty();
    $("#resultat").removeClass('resultat');

  });
});
