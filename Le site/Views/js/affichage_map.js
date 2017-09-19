$('#revealed').click(function(){
  $("#association").toggleClass('close');
    if ($('#arrow').attr('class') == 'glyphicon glyphicon-arrow-right') {
      $('#arrow').removeClass('glyphicon-arrow-right');
      $('#arrow').addClass('glyphicon-arrow-left')
    }
    else {
      $('#arrow').removeClass('glyphicon-arrow-left');
      $('#arrow').addClass('glyphicon-arrow-right')
    }
});
