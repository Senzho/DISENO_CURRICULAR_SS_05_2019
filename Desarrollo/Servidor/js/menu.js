$.fn.manejarMenu = function(bloque) {
    $(bloque).toggleClass("invisible");
}

$(document).ready(function(event) {
    var bloque = $("#bloqueMenu");
    $(bloque).toggleClass("invisible");
    $("#menu").click(function() {$(this).manejarMenu(bloque)});
    $("#menuEnMenu").click(function() {$(this).manejarMenu(bloque)});
});