$(function() {




    $("#add_camera").on("click", function(){
        $('#cam_modelo').html("<option value>Seleccione...</option>");
        $("#formucams").trigger("reset");
    });


    $('#formuUbicaciones').validate({
        rules: {
            cam_marca:'required',
            cam_modelo: 'required',
            cam_no_serie: 'required',
            cam_name: 'required',
            cam_mac: 'required',
            file1: 'required',
            foto_ins_cam: 'required',
        },

        highlight: function(element) {     
            $(element).closest('.cont-input').addClass('has-error'); 
        },
        unhighlight: function(element) {      
           $(element).closest('cont-input').removeClass('has-error');   
        },
        success: function(label, element) {
            $(element).closest('.cont-input').removeClass('has-error');
        },
        //errorElement: 'span',
        errorPlacement: function(element) {      
           if(element.parent('.input-group').length) {         
               if(element.parent('cont-input').children('.error').length<=0){           
                    //error.insertAfter(element.parent());         
               }      
           } else {
               if(element.parent('cont-input').children('.error').length<=0) {            
                   //error.insertAfter(element);         
               }      
           }   
       }

        });
    


});