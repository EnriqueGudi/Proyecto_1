link_ubicaciones.function = {


    fill_table_ubicaciones: function (data) {
        
        link_ubicaciones.tabla_ubicaciones = $('#table_ubicaciones').DataTable( {
            data: data,
            columns: [
                { data: 'area.lugar.nombre_lugar' },
                { data: 'area.nombre_area' },
                { data: 'nombre_sub_area' },
             
            ],
            dom: 'Bfrtip', // Agrega los botones al contenedor dom
            buttons: [
                {
                    extend: 'excelHtml5', // Habilita el botón de exportación a Excel
                    filename: 'Reporte_camaras', // Cambia el nombre del archivo a "Reporte_camaras"
                    title: 'Reporte de Cámaras', // Cambia el titulo a "Reporte de camaras"
                },
                {
                    extend: 'pdfHtml5', // Habilita el botón de exportación a PDF
                    filename: 'Reporte_camaras', // Cambia el nombre del archivo a "Reporte_camaras"
                    title: 'Reporte de Cámaras', // Cambia el titulo a "Reporte de camaras"
                }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            destroy: true, // Destruye la tabla antes de crear una nueva
            scrollY: '200px', // Altura fija para el cuerpo de la tabla
            scrollCollapse: true, // Hace que la tabla se encoja en lugar de expandirse
            paging: false, // Deshabilita la paginación
            info: false, // Deshabilita la información de la tabla
            scrollX: true,
            scrollXInner: "100%",
            responsive: true,
        
        } );
        link_ubicaciones.function.selected_row("#table_ubicaciones");
        
    },

    selected_row: function (id_table) {
        $(id_table + " tbody").off().on("click", "tr", function () {
          
            rowData = $(id_table).DataTable().row($(this));
            if (rowData.data() !== undefined) {
                link_ubicaciones.data = rowData.data();
                r = link_ubicaciones.data;
                
                if (!$(this).hasClass('selected-gudi')) {
                    $('tr.selected-gudi').removeClass('selected-gudi');
                    $(this).addClass('selected-gudi');
                }

                if(id_table=="#table_ubicaciones"){

                    $.when(link_ubicaciones.function.modal_ubi_per()).done(function(){
                        $("#modal_ubi_per").modal("show");
                    });

                }
            }
        });
    },

    modal_ubi_per:function(){  
        $("#mapa").html("");
        $("#mapa").html(r.ubicacion_maps);
    },

    get_lugares:function(){

    let template ='<option value>Seleccione...</option>';
    lugares.forEach(lugar => {
        template +=`
            <option value="${lugar.id}">
                ${lugar.nombre_lugar}
            </option>`
    });
    $('#formuUbicaciones #new_lugar').html(template);
      
    },

    get_areas:function(){

        let template ='<option value>Seleccione...</option>';
        areas.forEach(area => {
            if(area.lugar_id==$("#new_lugar").val()){
            template +=`
                <option value="${area.id}">
                    ${area.nombre_area}
                </option>`
            }
        });
        $('#formuUbicaciones #new_area').html(template);
          
    },

    set_sub_area:function(){

        var ajax = link_ubicaciones.dao.set_sub_area();
        ajax.done(function(response){
            swal("Aviso",response.message,response.type);
            if(response.type=="success"){
               
                link_ubicaciones.tabla_ubicaciones.row.add({
                    "area": {
                        "lugar": {
                        "nombre_lugar": response.lugar},
                        "nombre_area": response.area,
                    },
                    "nombre_sub_area": response.sub_area,
                    "ubicacion_maps":response.ubicacion_maps
                    }).draw()
                
                $("#formuUbicaciones")[0].reset();
                $("#modal_ubicacion_nueva").modal("hide");
            }
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

    
};