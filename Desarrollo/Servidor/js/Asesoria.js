$.fn.obtenerHrefOriginal = function(href) {
    var hrefOriginal;
    for(i = href.length; i > -1; i --) {
        if (href.charAt(i) == "/") {
            hrefOriginal = href.substring(0, i + 1);
            break;
        }
    }
    return hrefOriginal;
}

$(document).ready(function() {
    var bloquePrograma = $(".bloque_programa");
	$(bloquePrograma).contextmenu(function(event) {
        event.preventDefault();
        var id = $(this).attr("id");
        var popup = $("#myPopup");
        var href = $(popup).attr("href");
        $(popup).attr("href", $(this).obtenerHrefOriginal(href) + id);
        $(popup).toggleClass("mostrar");
    });
});