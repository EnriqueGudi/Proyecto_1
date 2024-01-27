link_plantilla.function = {


    cargarContenido:function(ruta){

        var ajax = link_plantilla.dao.cargarContenido(ruta);
        ajax.done(function(response){
            $('#contenido-dinamico').html(response);
            if(ruta=="ubicaciones"){
            $.when($("#display_ubicaciones").show("slow")).done(function(){
                link_ubicaciones.function.fill_table_ubicaciones(ubicacion);
            });
            }else if(ruta=="Usuarios_VPN"){
                $.when($("#display_usuario_vpn").show("slow")).done(function(){
                    link_usuarios_vpn.function.fill_table_usuarios_vpn(usuarios_vpn);
                });
            }
            
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

};