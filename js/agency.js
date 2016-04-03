/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

$(document).ready(function() {
    var $root = $('html, body');
    $('a.page-scroll').click(function() {
        var href = $.attr(this, 'href');
        $root.animate({
            scrollTop: $(href).offset().top
        }, 500);
        return false;
    });

    var sectionHeaders = [$('#about'), $('#portfolio'), $('#education'), $('#work'), $('#contact')];
    var sectionLinks = $('ul#sidebar-nav a').toArray();
    var activeIndex = -1;


    $(document).scroll(function() {
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
                }
                return;
            }
        }


    });
});

