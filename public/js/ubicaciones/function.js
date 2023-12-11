link_ubicaciones.function = {


    fill_table_ubicaciones: function (data2) {
        var data = [
            { organizacion: 'LCT', area: 'Sica', algo: '2 cocas' },
            { organizacion: 'LCMT', area: 'CCTV', algo: '1 coca' },
            // Agrega más objetos según sea necesario
        ];

        link_ubicaciones.tabla_ubicaciones = $('#table_ubicaciones').DataTable( {
            data: data,
            columns: [
                { data: 'organizacion' },
                { data: 'area' },
                { data: 'algo' },
             
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
                    $("#delete_cam").show();
                    $(".btn-cam-select").hide();
                    link_ubicaciones.function.modal_cam_per();
                    $("#modal_camara_per").modal("show");
                }
            }
        });
    },

    botones_cam_dis:function(){
        $("#instalar_camara").show();
        $("#mantenimiento_camara").show();
    },

    botones_cam_oper:function(){
        $("#mantenimiento_camara").show();
    },

    botones_cam_mant:function(){
        $("#mantenimiento_camara_fin").show();
    },

    set_camara:function(){

        var ajax = link_camaras.dao.set_camara();
        ajax.done(function(response){
            swal("Aviso",response.message,response.type);
            if(response.type=="success"){
                link_camaras.tabla_camaras.row.add({
                    "no_serie": response.no_serie,
                    "modelo": {
                        "marca": {
                            "nombre_marca": response.marca
                        }
                    },
                    "estatus": response.estatus,
                    "foto_cam": response.foto_cam,
                    }).draw()
                
                $("#formucams")[0].reset();
                $("#modal_camara_nueva").modal("hide");
            }
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

    delete_camara:function(){

        var ajax = link_camaras.dao.delete_camara();
        ajax.done(function(response){
            swal("Aviso",response.message,response.type);
            if(response.type=="success"){
                link_camaras.tabla_camaras.row('.selected-gudi').remove().draw();
            }
        }).fail(function (){
            swal("Aviso!", "Hubo algun error", "error");
        });

    },

    get_marcas:function(){

        let template ='<option value>Seleccione...</option>';
        marcas.forEach(marca => {
            template +=`
            <option value="${marca.id}">
                ${marca.nombre_marca}
            </option>`
        });
        $('#cam_marca').html(template);
       
    },

    get_modelos:function(modelosfiltrados){

        let template ='<option value>Seleccione...</option>';
        modelosfiltrados.forEach(modelosfiltrados => {
            template +=`
            <option value="${modelosfiltrados.id}">
                ${modelosfiltrados.nombre_modelo}
            </option>`
        });
        $('#cam_modelo').html(template);
   
    },

    get_areas:function(){

        let template ='<option value>Seleccione...</option>';
        areas.forEach(area => {
            template +=`
            <option value="${area.id}">
                ${area.nombre_area}
            </option>`
        });
        $('#area_ins').html(template);
       
    },

    get_sitios:function(sitiosfiltrados){

        let template ='<option value>Seleccione...</option>';
        sitiosfiltrados.forEach(sitiosfiltrados => {
            template +=`
            <option value="${sitiosfiltrados.id}">
                ${sitiosfiltrados.nombre_sitio}
            </option>`
        });
        $('#sitio_ins').html(template);
   
    },

    modal_cam_per:function(){  
        $('#save_foto_cam').hide();
        $('#form_foto_cam').hide();
        $("#display_mant_cam").hide();
        $("#display_baja_cam").hide();
        $("#display_ins_cam").hide(); 
        $("#baja_camara").show();
        if(link_camaras.data.estatus=="operando"){
            $('#img_foto_cam_per').attr('src', "fotos/camaras/"+link_camaras.data.foto);
            link_camaras.function.botones_cam_oper();
            $("#mot_per_cam").text(link_camaras.data.motivo_instalacion);
            
        }else{
            if(link_camaras.data.foto_cam==null){
                $("#form_foto_cam").trigger("reset");
                $('#save_foto_cam').show();
                $('#form_foto_cam').show();
                $('#img_foto_cam_per').attr('src', "");
            }else{
                
                $('#img_foto_cam_per').attr('src', baseUrl + link_camaras.data.foto_cam);
            }
            
            if(link_camaras.data.estatus=="disponible"){
                link_camaras.function.botones_cam_dis();
                $("#mot_per_cam").text("");
            }else if(link_camaras.data.estatus=="mantenimiento"){
                link_camaras.function.botones_cam_mant();
                $("#mot_per_cam").text(link_camaras.data.motivo_mantenimiento);
            }else if(link_camaras.data.estatus=="baja"){
                $("#baja_camara").hide();
                $("#mot_per_cam").text(link_camaras.data.motivo_baja);
            }
        }
    },

    
};