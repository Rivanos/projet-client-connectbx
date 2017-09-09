$(document).ready(function() {
	$(window).scroll(function () {
		var scrollTop = $(window).scrollTop();
		var imgPos = -scrollTop / 2 + 'px';
		$('.fond').css('background-position', 'center ' + imgPos);
	});
	/*header caché home*/
	$('#jumbotron').hover(function() {
		$('.fond').css('height', '100vh')
		$('body').css('padding', '0')
		$('#menu-nav').css('top', '-43px')
	},function() {
		$('.fond').css('height', 'calc( 100vh - 50px)')
		$('body').css('padding', '50px 0 0 0')
		$('#menu-nav').css('top', '0px')
	});
});
