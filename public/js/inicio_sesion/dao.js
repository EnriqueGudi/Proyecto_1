inicio_sesion.dao = {

    inicio_sesion: function(){
        var data = new FormData($("#form_inicio")[0]);
        data.append("_token",$('input[name="_token"]').val());
        console.log($('input[name="_token"]').val());
        return $.ajax({
           type:"POST",
           url:"/login",
           dataType:"JSON",
           data: data,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
       });
    },


};