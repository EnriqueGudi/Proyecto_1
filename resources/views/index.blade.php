<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hutchinson</title>
    
    <!-- Bootstrap 5 +js bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <!-- jquey-->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
   
    <!-- datatables--> 
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.5/af-2.6.0/b-2.4.1/b-colvis-2.4.1/b-html5-2.4.1/b-print-2.4.1/datatables.min.js"></script>
  
    <!-- icons bootstrap--> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- moment.js requerido si se desea usar datatimepicker--> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- validate js--> 
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- sweetAlert--> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Generar tokens--> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <!-- Estilos generales--> 
    <link rel="icon" type="image/x-icon" href={{asset('images/plantilla/icon.ico')}}>
    <link rel="stylesheet" href={{asset('css/plantilla/style.css')}}>
    <script src={{asset('js/plantilla/script.js')}}></script>
    

  </head>

<body class="gray container-fluid" style="background-image: url({{asset('imagenes/plantilla/fondo.png')}}); background-repeat: no-repeat; background-color: #cccccc;  background-position: center;  background-size: cover; /* Resize the background image to cover the entire container */">
<!-- div  de lluvia
<div id="rain-container"></div>
-->


<div>
    <div class="row flex-nowrap">
        <div id="menu_2" class="col-auto px-sm-2 px-0 bg-dark" style="padding: 0px !important; min-width: 160px;">
            <div class="d-flex flex-column align-items-center align-items-sm-start text-white min-vh-100" style="background-color: #464e54; max-width: 160px;">
                <div id="head_menu" style="width:100%; display: flex; justify-content: center; align-items: center">

                    <img id="img_logo" src={{asset('imagenes/plantilla/logo.png')}} style="max-width: 100%; scale:.8;">

                </div>
                <span class="ms-1 etiqueta" style="font-size: 10px; padding-top: 5px;"><b>¡BIENVENIDO!</b></span>

                <hr style="background-color: white;align-self: center;width:90%;opacity: 1; margin-bottom: 0;">
                <div id="div-persona" class="item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="{{ Auth::user()->name }}" style="font-size: xx-small;padding: 10px 2px; width:100%;">
                    <i class=" bi-person-circle"></i> <span class="ms-1 etiqueta">{{ Auth::user()->name }}</span>
                </div>

                <div style="width: 100%;padding: 5px 10px;font-size: xx-small;background-color: #192227;color: #364b56;">
                    Menú
                </div>
                
                <ul id="menu" class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" style="width: 100%; font-size: x-small;">
                    @if(Auth::check() && Auth::user()->role === 'Administrador')
                        <li id="opcion_ubicaciones" class="nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="Ubicaciones">
                            <a href="#" class="nav-link align-middle px-0" style="color: white;">
                                <i class=" bi-pin-map-fill"></i> <span class="ms-1 etiqueta">Ubicaciones</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <div class="nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="infraestructura">
                            <a href="#infraestructura" data-bs-toggle="collapse" class="nav-link px-0 align-middle" style="color: white;">
                                <i class="bi-building-fill-gear"></i> <span class="ms-1 etiqueta">Infraestructura</span> </a>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="infraestructura" data-bs-parent="#menu" style="margin-left: 0px !important;background-color: rgb(65, 65, 65);">
                            <li id="opciones_usuarios_vpn" class="w-100 nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="UsuariosVPN">
                                <a href="#" class="nav-link align-middle px-0" style="color: white;">
                                <i class="bi-shield-lock-fill"></i> <span class="ms-1 etiqueta">Usuarios VPN</span>
                                </a>
                            </li>
                            <li class="nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="Aire">
                                <a href="#" class="nav-link align-middle px-0" style="color: white;">
                                <i class=" bi-wind"></i> <span class="ms-1 etiqueta">Aire</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="Orders">
                        <a href="#" class="nav-link px-0 align-middle" style="color: white;">
                            <i class=" bi-table"></i> <span class="ms-1 etiqueta">Orders</span></a>
                    </li>
                    <li>
                        <div class="item-tooltip nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="Bootstrap">
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle" style="color: white;">
                            <i class=" bi-bootstrap"></i> <span class="ms-1 etiqueta">Bootstrap</span></a>
                        </div>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu" style="margin-left: 0px !important;background-color: rgb(65, 65, 65);">
                            <li class="w-100 nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="CSS">
                                <a href="#" class="nav-link align-middle px-0" style="color: white;">
                                <i class=" bi-filetype-css"></i> <span class="ms-1 etiqueta">CSS</span>
                                </a>
                            </li>
                            <li class="nav-item item-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="HTML">
                                <a href="#" class="nav-link align-middle px-0" style="color: white;">
                                <i class=" bi-filetype-html"></i> <span class="ms-1 etiqueta">HTML</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <hr>

                <div style="width: 100%;">
                    <ul id="cerrar_sesion" class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" style="width: 100%; font-size: x-small;">
                        <li  class="nav-item item-tooltip" style="width: 100%;" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-title="Cerrar Sesión">
                            <a href="{{ route('logout') }}" class="nav-link align-middle px-0" style="color: white; padding-left: 10px !important;">
                                <i class="bi-door-closed"></i> <span class="ms-1 etiqueta">Cerrar Sesión</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col p-0">
            <div id="header-main" class="p-1" style="background: linear-gradient(90deg,#2b93dd 0%,#fff 50%,#002b66 100%);">
                <div id="boton_menu" style="width: min-content;">
                    <img src={{asset('imagenes/plantilla/menu_icon.png')}} style="width: 15px; height: 15px; vertical-align: initial;">
                </div>
            </div>
            <!-- AQUI TODO EL CONTENIDO PRINCIPAL DE LA PAGINIA-->
            <div id="contenido-dinamico"></div>
            <!-- FIN CONTENIDO PRINCIPAL DE LA PAGINA-->
        </div>
    </div>
</div>

</body>

</html>

<script src={{asset('js/plantilla/link.js')}}></script>
<script src={{asset('js/plantilla/init.js?v=2')}}></script>
<script src={{asset('js/plantilla/dao.js?v=1')}}></script>
<script src={{asset('js/plantilla/function.js?v=1')}}></script>