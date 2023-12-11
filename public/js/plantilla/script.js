function swal(title, text, type) {
    Swal.fire({
      title: title,
      text: text,
      icon: type,
      confirmButtonText: 'Aceptar'
    });
  }
$(document).ready(function() {

    //tooltip
    tooltip=false;
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    //tooltip end

  
    $(".item-tooltip").tooltip('dispose');
    $('#img_logo').attr('height', $('#header-main').outerHeight());
    
    $('#boton_menu').click(function() {
        $('.etiqueta').toggleClass('d-none');
        
        if(tooltip==false){
          $('#img_logo').attr('src', 'imagenes/plantilla/logo_min.png');          
            $('#img_logo').attr('height', $('#header-main').outerHeight()/1.1);
            $('#img_logo').attr('scale', '1');
            $('#menu').css('font-size', '');
            $('#menu_2').css('min-width', '');
            $('#cerrar_sesion').css('font-size', '');
            $("#div-persona").css('text-align', 'center');
            $(".item-tooltip").tooltip();
            tooltip=true;
        }else{
            $('#img_logo').attr('src', 'imagenes/plantilla/logo.png');
            $('#img_logo').attr('height', $('#header-main').outerHeight());
            $('#menu').css('font-size', 'x-small');
            $('#menu_2').css('min-width', '160px');
            $('#cerrar_sesion').css('font-size', 'x-small');
            $("#div-persona").css('text-align', '');
            $(".item-tooltip").tooltip('dispose');
            tooltip=false;
        }
    });
    
    $(".nav-item").click(function(){
        $(".nav-item").removeClass("nav-item-selected");
        $(this).addClass("nav-item-selected");

        $("#display_bienvenida").hide();
    });
    
    $('#head_menu').height($('#header-main').outerHeight());   


    
//lluvia
    // Función para crear una gota de lluvia
    function createRainDrop() {
    var drop = document.createElement('div');
    drop.className = 'rain-drop';
    drop.style.left = Math.random() * 100 + '%';
    drop.style.animationDuration = Math.random() * 2 + 1 + 's';
    document.getElementById('rain-container').appendChild(drop);
    
    // Eliminar la gota de lluvia después de la animación
    setTimeout(function() {
      drop.remove();
    }, 3000);
  }
  
  // Generar gotas de lluvia cada 100 milisegundos
  setInterval(createRainDrop, 100);
//lluvia  

});