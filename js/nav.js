/**
 * Created by Brandt on 9/30/2015.
 */
var drawerVisible = false;
$(document).ready(function() {
    $("#nav-drawer-wrapper").hide();

    $("#nav-drawer-toggle").click(function() {
        toggleDrawer();
    });
    $("#nav-shadow").click(function() {
        toggleDrawer();
    });
    $("#nav-drawer .dismiss-drawer").click(function() {
        toggleDrawer();
    });
});

function toggleDrawer() {
    if (drawerVisible) {
        $("#nav-shadow").hide();
        $("#nav-drawer-wrapper").animate({"left": "-=300px"}, "fast", function () {
            $("#nav-drawer-wrapper").hide();
        });
    } else {
        $("#nav-drawer-wrapper").show();
        $("#nav-shadow").show();
        $("#nav-drawer-wrapper").animate({"left": "+=300px"}, "fast");
    }
    drawerVisible = !drawerVisible;
}