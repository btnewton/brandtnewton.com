// Written by Brandt Newton for brandtnewton.com -2014

var modalOpen = false;
var modalBtn;
var navBtn;

$( document ).ready(function() {

	navBtn = $("#nav-drawer-toggle");
	modalBtn = $("#return-button");
	modalBtn.hide();

	$(".portfolio-link").click(function() {
		toggleActionButton();
	});

	modalBtn.click(function() {
		$('.modal').modal('hide');
		toggleActionButton();
	});

	$(".swap-modal").click(function() {
		$('.modal').modal('hide');
		$($(this).attr('href')).modal('show');
	});
});


function toggleActionButton() {
	if (modalOpen) {
		modalBtn.hide();
		navBtn.show();
		modalOpen = false;
	} else {
		navBtn.hide();
		modalBtn.show();
		modalOpen = true;
	}

}