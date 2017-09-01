$(document).ready(function() {
	$(window).scroll(function () {
	var scrollTop = $(window).scrollTop();
	var imgPos = -scrollTop / 2 + 'px';
	$('.fond').css('background-position', 'center ' + imgPos);
	});

	$("#title-jumbotron").hide().fadeIn(3000);

});