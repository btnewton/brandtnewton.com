/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

$(document).ready(function() {
    var toast = document.querySelector('#toast');

    // Modal links
	var url = window.location.href;
	var target = url.substring(url.indexOf("#"));
	if (target.substring(1, 8) === "project"){
		$(target).modal('show');
	} else {
        $('.modal').modal('hide');
    }
});

var $root = $('html, body');
$('a.page-scroll').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {});
    return false;
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});