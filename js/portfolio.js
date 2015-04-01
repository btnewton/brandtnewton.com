// Written by Brandt Newton for brandtnewton.com -2014

$( document ).ready(function() {
	hitbox = $( ".portfolio-item-container" );
	content = $(".portfolio-hover-content");
	hover_box = $(".portfolio-hover");

	content.hide();
	hover_box.css("opacity", "0");

	hitbox.hover(
		function() {
			$( this ).find(content).stop(true).fadeIn();
			$( this ).find(".portfolio-hover").stop(true).animate({opacity: "1" });
		},
		function() {
			$( this ).find(content).stop(true).fadeOut();
			$(this).find(".portfolio-hover").stop(true).animate({opacity: "0"});
		}
	);
});