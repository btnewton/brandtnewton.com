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

function initMaterializeComponents() {
	$('.modal-trigger').leanModal();
	$('.materialboxed').materialbox();

	$('[data-modal-content]').click(function() {
		var target = "pages/projects/" + $(this).data('modal-content') + ".html";
		$("#dynamic-modal").openModal();
		$("#dynamic-modal .modal-content").html('<div id="dynamic-modal-waiting" class="center-align"><div class="preloader-wrapper active"><div class="spinner-layer spinner-red-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></div>');
		$.ajax({
	        url: target,
	        success: function (result) {
	            $("#dynamic-modal .modal-content").html(result);
	            $("#dynamic-modal img").each(function() {
	            	Materialize.fadeInImage($(this));
	            });
	        },
	        cache: false
	    });
	});

	$("img").each(function() {
    	Materialize.fadeInImage($(this));
    });
}

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
            $('html, body').scrollTop(0);
            initMaterializeComponents();
        },
        cache: false
    });
}