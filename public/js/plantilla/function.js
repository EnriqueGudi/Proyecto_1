link_plantilla.function = {


    cargarContenido:function(ruta){

        var ajax = link_plantilla.dao.cargarContenido(ruta);
        ajax.done(function(response){
            $('#contenido-dinamico').html(response);
            if(ruta=="camaras"){
            $.when($("#display_camaras").show("slow")).done(function(){
                link_camaras.function.fill_table_camaras(camaras);
            });
                
            }
            
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

};