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

    <!-- Datatimepicker--> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <!-- validate js--> 
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- sweetAlert--> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Estilos generales--> 
    <link rel="icon" type="image/x-icon" href={{asset('images/plantilla/icon.ico')}}>
    <link rel="stylesheet" href={{asset('css/inicio_sesion/style.css')}}>
    <script src={{asset('js/inicio_sesion/script.js')}}></script>
    

  </head>

<body class="gray container-fluid" style="background-image: url({{asset('imagenes/plantilla/fondo.jpeg')}}); background-repeat: no-repeat; background-color: #cccccc;  background-position: center;  background-size: cover; /* Resize the background image to cover the entire container */">
    <!-- div de lluvia-->
    <div id="rain-container"></div>
    <div class="container-fluid" style="text-align: right;"><img src="{{asset('imagenes/plantilla/logo.png')}}" style="width: 350px;"></div>
    <div class="container col-md-4 offset-md-4" >
        <div class="card" style="margin-top: 10%">
            <center><h5 class="card-header">Inicio de Sesión</h5></center>
            <div class="card-body m-4">

                <form id="form_inicio" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
                    </div>
                    <center><button id="ingresar_sistema" type="button" class="btn btn-danger mt-4">Ingresar</button></center>
                </form>
                <center class="mt-2"><a href="#" style="text-decoration: none;">¿Olvidaste tu contraseña?</a></center>
                <hr>
                <center><a href=""><button id="nuevo_usuario" type="button" class="btn btn-success">Registrarse</button></a></center>
            </div>
            <div class="card-footer text-center">
                Para cualquier duda comunicarse con Gudiño Portilla Enrique
            </div>
        </div>
    </div> 

    

</body>



</html>

<script src={{asset('js/inicio_sesion/link.js')}}></script>
<script src={{asset('js/inicio_sesion/init.js?v=2')}}></script>
<script src={{asset('js/inicio_sesion/dao.js?v=1')}}></script>
<script src={{asset('js/inicio_sesion/function.js?v=1')}}></script>