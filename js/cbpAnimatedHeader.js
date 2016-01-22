$(document).ready(function() {

	var docElem = $(document); 
	var didScroll = false;
	var changeHeaderOn = $('header ul').position().top;
	var navbar = $('.navbar');
	var navbarBrand = $('.navbar-brand');

	function init() {
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
		if ( sy >= changeHeaderOn ) {
			navbarBrand.show();
			navbar.addClass('toolbar-active');
		}
		else {
			navbarBrand.hide();
			navbar.removeClass('toolbar-active');
		}
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();
	scrollPage();
});