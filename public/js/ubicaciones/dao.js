link_ubicaciones.dao = {

    set_camara: function(){
        var data = new FormData($("#formucams")[0]);
        data.append("function", "set_camara");
        data.append("_token",$('input[name="_token"]').val());
        
        return $.ajax({
           type:"POST",
           url:"InsertController/camaras",
           dataType:"JSON",
           data: data,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
       });
    },

    delete_camara: function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        return $.ajax({
           type:"POST",
           url:"DeleteController/camaras",
           dataType:"JSON",
           data:{'no_serie' : link_camaras.data.no_serie,
                 '_token': csrfToken},
       });
    },

};