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

    registrar_usuario:function(){

        var ajax = inicio_sesion.dao.registrar_usuario();
        ajax.done(function(response){
            if (response.type == 'success') {
                Swal.fire({
                    title: 'Se ah enviado un correo de verificación a su correo.',
                    icon: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonText: 'Aceptar',
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = response.redirect;
                    }
                  });
            }else if(response.type=="warning"){
                swal("Aviso!", response.message, response.type);
            }
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

};