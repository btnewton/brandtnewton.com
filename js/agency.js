/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

var navMethod;
var sectionHeaders;
var activeIndex = -1;
var changeHeaderOn;
var navbar;

$(document).ready(function() {
    sectionHeaders = [$('#about'), $('#portfolio'), $('#education'), $('#work'), $('#contact')];
    changeHeaderOn = $('header ul').position().top;
    navbar = $('.navbar');

    // Smooth scroll
    $('a.page-scroll').click(function() {
        var href = $.attr(this, 'href');
        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, 500);
        return false;
    });


    $(window).resize(function() {
        updateNavType();
    });

    $(document).scroll(function() {
        updateNavType();
    });

    updateNavType();
});

function updateNavType() {
    var sy = window.pageYOffset || $(document).scrollTop;
    var navbarBrand = $('.navbar-brand');
    if (sy >= changeHeaderOn) {
        navbarBrand.show();
        navbar.addClass('toolbar-active');

        if (screen.width < 768) {
            hideSideNav();

            var bottomNav = getBottomNav();
            bottomNav.show();
            bottomNav.animate({
                bottom: "0"
            }, "fast");

            updateNav('#bottom-nav ul a');
        } else {
            hideBottomNav();

            var sidebar = getSideBarNav();
            sidebar.show();
            sidebar.animate({
                left: "0"
            }, "fast");

            updateNav('ul#sidebar-nav a');
        }
    } else {
        navbarBrand.hide();
        navbar.removeClass('toolbar-active');

        hideBottomNav();
        hideSideNav();
    }
}

function hideBottomNav() {
    var bottomNav = getBottomNav();
    bottomNav.hide();
    bottomNav.css("bottom", "-100px");
}

function hideSideNav() {
    var sidebar = getSideBarNav();
    sidebar.hide();
    sidebar.css("left", "-100px");
}

function getSideBarNav() {
    return $('#sidebar-nav');
}
function getBottomNav() {
    return $('#bottom-nav');
}

function updateNav(navIdentifier) {
    for (var i = 0; i < sectionHeaders.length; i++) {
        var sectionHeader = sectionHeaders[i];

        if (sectionHeader.offset().top - 10 >= $(document).scrollTop()) {
            var newActiveIndex = i - 1;
            if (activeIndex != newActiveIndex) {
                $(navIdentifier).each( function( index, element ){
                    if (index == newActiveIndex) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });
                activeIndex = newActiveIndex;
            }
            break;
        }
    }
}

