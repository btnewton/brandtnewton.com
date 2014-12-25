// Written by Brandt Newton for brandtnewton.com -2014

$( document ).ready(function() {
	hitbox = $( ".portfolio-item-container" );
	content = $(".portfolio-hover-content");
	hover_box = $(".portfolio-hover");

	content.hide();
	hover_box.css("height", "0");

	hitbox.hover(
		function() {
			$( this ).find(content).stop(true).fadeIn();
			$( this ).find(".portfolio-icon").stop(true).animate({ opacity: "0.3"});
			$( this ).find(".portfolio-hover").stop(true).animate({ height: "100%" });
		},
		function() {
			$( this ).find(content).stop(true).fadeOut();
			$(this).find(".portfolio-hover").stop(true).animate({ height: "0" });
			$(this ).find(".portfolio-icon").stop(true).animate({ opacity: "1"});
		}
	);
});