$(document).ready(function() {
    var boton = $("#abrir_solicitudes");
    var modal = $("#myModal");
    $(boton).click(function() {
        $(modal).css("display", "block");
    });
    $(window).click(function(event) {
        if (event.target == modal) {
            $(modal).css("display", "none");
        }
    });
});