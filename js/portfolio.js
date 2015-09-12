// Written by Brandt Newton for brandtnewton.com -2014

$( document ).ready(function() {
	$(".swap-modal").click(function() {
		$('.modal').modal('hide');
		$($(this).attr('href')).modal('show');
	});

	$(".close-modal-btn").click(function() {
		history.pushState('', document.title, window.location.pathname);
	});
});