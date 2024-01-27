<script>
    // decodificacion para poder usar los datos
    var usuarios_vpn = JSON.parse(@json($usuarios_vpn));
    var baseUrl = "{{ url('/') }}";
</script>
<div id="display_usuario_vpn" class="container" style="display:none">
    <center><h5 class="mt-4">Usuarios de VPN</h5></center>
    <hr>

    <button class="btn btn-primary mb-1" type="button" id="add_usuario_vpn" data-bs-toggle="modal" data-bs-target="#modal_usuario_vpn_nuevo"><i class="bi bi-plus-lg"></i> Agregar Usuario VPN</button>
    <div class="card">
        <h5 class="card-header">Lista de Usuarios VPN</h5>
        <div class="card-body">
            <button class="btn btn-danger mb-1" type="button" id="delete_usuario_vpn" style="display:none;"><i class="bi bi-plus-lg"></i> Eliminar Usuario VPN</button>
            
            <div class="row mt-2">
                <table id="table_user_vpn">
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>User Login</th>
                        <th>BU</th>
                        <th>Area</th>
                        <th>Puesto</th>
                        <th>Correo</th>
                        <th>Destino Forma</th>
                        <th>Servicios, Puertos, Formatos</th>
                        <th>Mega VPV(Grupo)</th>
                        <th>Authentication</th>
                        <th>Comentarios</th>
                        <th>Formato Digital/Fisico</th>
                        <th>Estado</th>
                        <th>Expiración</th>
                        <th>Jefe</th>
                    </tr>
                </thead>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal Registro nueva -->
    <div class="modal fade" id="modal_usuario_vpn_nuevo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Captura de Usuario VPN Nuevo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row div_form">
                    <div class="col-md-12">
                        <form  id="formuUsuarioVPN">
                            @csrf
                            <div class="row div_captura">
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_lugar"> Lugar </label>
                                        <select class="form-control" name="new_lugar" id="new_lugar">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_area"> Area </label>
                                        <select class="form-control" name="new_area" id="new_area">
                                            <option value>Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_sub_area"> Subarea </label>
                                        <input type="text" name="new_sub_area" id="new_sub_area" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_url_maps"> URL Google Maps </label>
                                        <input type="text" name="new_url_maps" id="new_url_maps" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="save_usuario_VPN" type="button" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
    </div>

</div>

<script src={{asset('js/usuarios_vpn/link.js')}}></script>
<script src={{asset('js/usuarios_vpn/init.js?v=2')}}></script>
<script src={{asset('js/usuarios_vpn/dao.js?v=1')}}></script>
<script src={{asset('js/usuarios_vpn/function.js?v=1')}}></script>