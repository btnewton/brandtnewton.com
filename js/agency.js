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

    // Smooth scroll
    $('a.page-scroll').click(function() {
        var href = $.attr(this, 'href');
        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, 500);
        return false;
    });

    navbar = $('.navbar');

    $(document).scroll(function() {
        var sy = scrollY();
        var navbarBrand = $('.navbar-brand');
        if ( sy >= changeHeaderOn ) {
            navbarBrand.show();
            navbar.addClass('toolbar-active');

            if (useBottomNav()) {
  
            } else {
                var sidebar = $('#sidebar-nav');
                sidebar.show();
                sidebar.animate({
                    left: "0"
                }, "fast");
                updateSideNavMethod();
            }
        }
        else {
            navbarBrand.hide();
            navbar.removeClass('toolbar-active');

            if (useBottomNav()) {

            } else {
                var sidebar = $('#sidebar-nav');
                sidebar.hide();
                sidebar.css("left", "-100px");
            }
        }
    });
});

function scrollY() {
    return window.pageYOffset || $(document).scrollTop;
}

function useBottomNav() {
    return screen.width < 768;
}

function setNavMethod() {

    if (useBottomNav()) {
        // hide side nav & show bottom nav
        $('#sidebar-nav').hide();
    } else {
        // hide bottom nav & show side nav
        $('#sidebar-nav').show();
    }

    
}

function updateBottomNavMethod() {

}

function updateSideNavMethod() {
    for (var i = 0; i < sectionHeaders.length; i++) {
        var sectionHeader = sectionHeaders[i];

        if (sectionHeader.offset().top - 5 >= $(document).scrollTop()) {
            var newActiveIndex = i - 1;
            if (activeIndex != newActiveIndex) {
                $('ul#sidebar-nav a').each( function( index, element ){
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

