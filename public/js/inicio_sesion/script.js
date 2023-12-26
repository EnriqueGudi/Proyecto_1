function swal(title, text, type) {
    Swal.fire({
      title: title,
      text: text,
      icon: type,
      confirmButtonText: 'Aceptar',
      allowOutsideClick: false,
    });
  }
$(document).ready(function() {

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