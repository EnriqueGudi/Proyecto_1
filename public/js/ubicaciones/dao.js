link_ubicaciones.dao = {

    set_sub_area: function(){
        var data = new FormData($("#formuUbicaciones")[0]);
        data.append("_token",$('input[name="_token"]').val());
        data.append("id_area",$("#new_area").val());
        return $.ajax({
           type:"POST",
           url:"set_ubicacion",
           dataType:"JSON",
           data: data,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
       });
    },

};