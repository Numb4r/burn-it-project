/**
 * Created by marco on 15/07/2016.
 */
$(function () {
    $("#menu").load("../objects/menu.php", function () {
        if (window.location.href.toLowerCase().indexOf("dashboard.php") >= 0) {
            var x = document.getElementsByClassName("back");
            x[0].remove();
        }
    });


});