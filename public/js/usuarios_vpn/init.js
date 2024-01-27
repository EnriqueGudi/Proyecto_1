$(function() {




    $('#formuUsuarioVPN').validate({
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