$(document).ready(function() {
    $(".tipo").click(function() {
        var tipo = $(this).attr("name");
        var hidden = $("input[name='tipo']");
        $(hidden).attr("value", (tipo == "diseño" ? "diseño" : "actualizacion"));
    });
});