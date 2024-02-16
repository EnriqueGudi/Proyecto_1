$(function() {

    ips_count=0;

    $("#save_usuario_VPN").on('click',function(){
        if($('#formuUsuarioVPN').valid()){
        
        }else{console.log("no");}
    }); 
    
    $("#add_ip").on('click',function(){
        ips_count++;
        link_usuarios_vpn.function.add_ip();
    }); 

    $("#remove_ip").on('click',function(){
        if(ips_count>0){
            ips_count--;
            $("#div_ips").find('.cont-input').last().remove();
        }

    });

    $('#formuUsuarioVPN').validate({
        rules: {
            new_empleado:'required',
            new_user_login:'required',
            new_bu:'required',
            new_area:'required',
            new_puesto:'required',
            new_correo:'required',
            new_serv_puer_form:'required',
            new_megavpv:'required',
            new_autenthication:'required',
            new_comentarios:'required',
            new_formato:'required',
            new_estado:'required',
            new_fecha_exp: {
                required: true,
                date: true // Assuming it's a date field
            }
        },
    
        highlight: function(element) {     
            $(element).closest('.form-group').addClass('has-error'); 
        },
        unhighlight: function(element) {      
            $(element).closest('.form-group').removeClass('has-error');   
        },
        success: function(label, element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {      
            if (element.attr('type') === 'date') {
                //error.insertAfter(element.closest('.input-group'));
            } else {
                //error.insertAfter(element);
            }
        }

        });
    


});