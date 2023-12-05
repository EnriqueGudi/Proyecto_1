inicio_sesion.function = {


    inicio_sesion:function(){

        var ajax = inicio_sesion.dao.inicio_sesion();
        ajax.done(function(response){

            if (response.type == 'success') {
                window.location.href = response.redirect;
            }else if(response.type=="warning"){
                swal("Aviso!", response.message, response.type);
            }
            
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

};