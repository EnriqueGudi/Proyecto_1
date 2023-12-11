$(function() {

    $('#opcion_ubicaciones').click(function() {
        link_plantilla.function.cargarContenido('ubicaciones');
    });

    $('#opcion_elementos').click(function() {
        cargarContenido('/ruta-elementos');
    });

});