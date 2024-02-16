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
                                        <label for="new_empleado"> Empleado </label>
                                        <input type="text" name="new_empleado" id="new_empleado" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_user_login"> User Login </label>
                                        <input type="text" name="new_user_login" id="new_user_login" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_bu"> BU </label>
                                        <select class="form-control" name="new_bu" id="new_bu">
                                            <option value>Seleccione...</option>
                                            <option value="LCT">LCT</option>
                                            <option value="LCMT">LCMT</option>
                                            <option value="HK">HK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_area"> Area </label>
                                        <select class="form-control" name="new_area" id="new_area">
                                            <option value>Seleccione...</option>
                                            <option value="Sistemas">Sistemas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_puesto"> Puesto </label>
                                        <input type="text" name="new_puesto" id="new_puesto" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_correo"> Correo </label>
                                        <input type="text" name="new_correo" id="new_correo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_serv_puer_form"> Servicios, Puertos, Formatos </label>
                                        <input type="text" name="new_serv_puer_form" id="new_serv_puer_form" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_megavpv"> Mega VPV(Grupo) </label>
                                        <input type="text" name="new_megavpv" id="new_megavpv" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_autenthication"> Autentificación </label>
                                        <select class="form-control" name="new_autenthication" id="new_autenthication">
                                            <option value>Seleccione...</option>
                                            <option value="Checkpoint">Checkpoint</option>
                                            <option value="Radius">Radius</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_comentarios"> Comentarios </label>
                                        <input type="text" name="new_comentarios" id="new_comentarios" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_formato"> Formato Digital/Fisico </label>
                                        <select class="form-control" name="new_formato" id="new_formato">
                                            <option value>Seleccione...</option>
                                            <option value="Fisico">Fisico</option>
                                            <option value="Digital">Digital</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 cont-input">
                                    <div class="form-group">
                                        <label for="new_estado"> Estado</label>
                                        <select class="form-control" name="new_estado" id="new_estado">
                                            <option value>Seleccione...</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Expirado">Expirado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="new_fecha_exp" class="control-label">Fecha de Expiración</label>
                                    <div class="input-group">
                                        <input type="date" name="new_fecha_exp" id="new_fecha_exp" class="form-control class_aux">
                                    </div>
                                </div>
                                <div class="offset-md-8" style="padding-bottom: 20px;">
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    IP´s
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary mb-1" type="button" id="add_ip" style="max-width: 125px;" ><i class="bi bi-plus-lg"></i> Agregar IP</button>
                                    <button class="btn btn-danger mb-1" type="button" id="remove_ip" style="max-width: 125px;" ><i class="bi bi-plus-lg"></i> Quitar IP</button>
                                </div>
                                <div id="div_ips" class="row">

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