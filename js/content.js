$(document).ready(function() {

	$('#brand').click(function() {
		scrollToTop();
	    return false;
	});

	$('[data-target]').click(function() {
		if (!$(this).hasClass('active')) {
			var target = extractTarget($(this));
			setContent(target);	
		} else {
			scrollToTop();
		}
	});

	var defaultContent = extractTarget($('nav a.active'));
	setContent(defaultContent);
});

function extractTarget(htmlElement) {
	var target = htmlElement.data('target');
	target = "pages/" + target + ".html";
	return target;
}

function scrollToTop() {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
}

// TODO remove cache: false for prod
function setContent(target) {
	$.ajax({
        url: target,
        success: function (result) {
            $("#content-holder").html(result);
        },
        cache: false
    });
}