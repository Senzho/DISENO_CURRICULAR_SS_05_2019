$.fn.verificarSeleccionPrevia = function (tipo) {
    var otro = $("div[name='" + (tipo == "diseño" ? "actualizacion" : "diseño") + "']");
    if ($(otro).hasClass("seleccion")) {
        $(otro).toggleClass("seleccion");
    }
}
$.fn.mostrarParrafo = function (parrafoDiseño, parrafoActualizacion, tipo) {
    if (tipo == "diseño") {
        $(parrafoDiseño).toggleClass("invisible");
        if (!$(parrafoActualizacion).hasClass("invisible")) {
            $(parrafoActualizacion).toggleClass("invisible");
        }
    } else {
        $(parrafoActualizacion).toggleClass("invisible");
        if (!$(parrafoDiseño).hasClass("invisible")) {
            $(parrafoDiseño).toggleClass("invisible");
        }
    }
}

$(document).ready(function() {
    var parrafoDiseño = $("#pDiseño").toggleClass("parrafo");
    var parrafoActualizacion = $("#pActualizacion").toggleClass("parrafo");
    $(parrafoDiseño).toggleClass("invisible");
    $(parrafoActualizacion).toggleClass("invisible");
    $(".tipo").click(function() {
        $(this).toggleClass("seleccion");
        var tipo = $(this).attr("name");
        $(this).verificarSeleccionPrevia(tipo);
        $(this).mostrarParrafo(parrafoDiseño, parrafoActualizacion, tipo);
        var hidden = $("input[name='tipo']");
        $(hidden).attr("value", (tipo == "diseño" ? "diseño" : "actualizacion"));
    });
});