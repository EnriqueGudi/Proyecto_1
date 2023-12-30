$(function() {

    link_ubicaciones.function.get_lugares();

    $("#new_lugar").on("change", function(){
        link_ubicaciones.function.get_areas();
    });

    $("#save_ubicacion").on("click", function(){
        if($('#formuUbicaciones').valid()){
            link_ubicaciones.function.set_sub_area();
        }
    });


    $('#formuUbicaciones').validate({
        rules: {
            new_lugar:'required',
            new_area: 'required',
            new_subarea: 'required',
            new_url_maps: 'required',
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