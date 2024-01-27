link_usuarios_vpn.function = {


    fill_table_usuarios_vpn: function (data) {
        
        link_usuarios_vpn.tabla_usuarios_vpn = $('#table_user_vpn').DataTable( {

            rowCallback:function(row,data){
                if (data['formato'] == "Entregado") {
                    $(row).css("background-color", "green");
                }else 
                if (data['formato'] == "Digital") {
                    $(row).css("background-color", "yellow");
                }else
                if (data['formato'] == "No") {
                    $(row).css("background-color", "red");
                }
            },
          
            data: data,
            columns: [
                { data: 'empleado' },
                { data: 'user_login' },
                { data: 'bu' },
                { data: 'area' },
                { data: 'puesto' },
                { data: 'email' },
                { data:'destino_forma_vpn.[].ip'},//ya que este reemplazarlo por las ip de la tabla destino_forma_vpn
                { data: 'serv_puer_form' },
                { data: 'grupo_mega_vpv' },
                { data: 'autentucacion' },
                { data: 'comentarios' },
                { data: 'formato' },
                { data: 'estado' },
                { data: 'expiracion' },
                { data: 'jefe' },
             
            ],
            dom: 'Bfrtip', // Agrega los botones al contenedor dom
            buttons: [
                {
                    extend: 'excelHtml5', // Habilita el botón de exportación a Excel
                    filename: 'Reporte_usuarios_vpn', // Cambia el nombre del archivo a "Reporte_usuarios_vpn"
                    title: 'Reporte de Usuario VPN', // Cambia el titulo a "Reporte de usuarios_vpn"
                },
                {
                    extend: 'pdfHtml5', // Habilita el botón de exportación a PDF
                    filename: 'Reporte_usuarios_vpn', // Cambia el nombre del archivo a "Reporte_usuarios_vpn"
                    title: 'Reporte de Usuario VPN', // Cambia el titulo a "Reporte de usuarios_vpn"
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
        link_usuarios_vpn.function.selected_row("#table_user_vpn");
        
    },

    selected_row: function (id_table) {
        $(id_table + " tbody").off().on("click", "tr", function () {
          
            rowData = $(id_table).DataTable().row($(this));
            if (rowData.data() !== undefined) {
                link_usuarios_vpn.data = rowData.data();
                r = link_usuarios_vpn.data;
                
                if (!$(this).hasClass('selected-gudi')) {
                    $('tr.selected-gudi').removeClass('selected-gudi');
                    $(this).addClass('selected-gudi');
                }

                if(id_table=="#table_user_vpn"){

                }
            }
        });
    },



    
};