
jQuery(document).ready(function () {
    jQuery("#formID").validationEngine();
});
$(document).ready(function () {
    $(".btnEliminarItem").click(function () {
        var idCompleto = $(this).attr("id");
        var id = idCompleto.split("-")[1];
        $("#btnEliminar").attr("href", urlDelete + id);
    });
});