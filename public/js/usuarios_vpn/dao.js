link_usuarios_vpn.dao = {

    set_usuarioVPN: function(){
        var data = new FormData($("#formuUsuarioVPN")[0]);
        data.append("_token",$('input[name="_token"]').val());
        
        return $.ajax({
           type:"POST",
           url:"set_usuarioVPN",
           dataType:"JSON",
           data: data,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
       });
    },


};