$(function() {

    $('#opcion_ubicaciones').click(function() {
        link_plantilla.function.cargarContenido('ubicaciones');
    });

    $('#opciones_usuarios_vpn').click(function() {
        link_plantilla.function.cargarContenido('Usuarios_VPN');
    });

    $('#opcion_elementos').click(function() {
        cargarContenido('/ruta-elementos');
    });

});