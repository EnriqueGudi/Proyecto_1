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
                    link_ubicaciones.function.modal_ubi_per();
                    $("#modal_ubi_per").modal("show");
                }
            }
        });
    },



    modal_ubi_per:function(){  

    },

    
};