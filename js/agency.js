/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

$(document).ready(function() {
    // Modal links
	var url = window.location.href;
	var hostname = window.location.origin;

	console.log(hostname);
	var target = url.substring(hostname.length + 1);
	if (target.substring(1, 8) === "project"){
		$(target).modal('show');
	}

    $("a.portfolio-link").click(function(){
        window.location.hash = $(this).attr("href");
    });

    // $("a.page-scroll").click(function(){
        // window.location.hash = $(this).attr("href");
    // });

    $(window).hashchange();
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
        window.location.hash = $(this).attr("href");

    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});