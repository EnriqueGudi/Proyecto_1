$(function() {

    $('#opcion_camaras').click(function() {
        link_plantilla.function.cargarContenido('camaras');
    });

    $('#opcion_elementos').click(function() {
        cargarContenido('/ruta-elementos');
    });

});