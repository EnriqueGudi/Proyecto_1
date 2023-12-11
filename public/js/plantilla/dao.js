link_plantilla.dao = {

    cargarContenido: function(ruta){

        return $.ajax({
           type:"GET",
           url:ruta,
       });
    },

};