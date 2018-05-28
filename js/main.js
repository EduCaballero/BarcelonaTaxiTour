(function () {
  "use strict";

  document.addEventListener('DOMContentLoaded', function () {
    //console.log("empezamos");
    //Datos de usuario
    var nombre=document.getElementById('nombre');
    var apellido=document.getElementById('apellido');
    var email=document.getElementById('email');

    //Campos servicios
    var dia_completo=document.getElementById('dia_completo');
    var traslados=document.getElementById('traslados');
    var rutas=document.getElementById('rutas');

    //Botones y divs
    var calcular=document.getElementById('calcular');
    var errorDiv=document.getElementById('error');
    var botonRegistro=document.getElementById('btnRegistro');
    var resultado=document.getElementById('lista_productos');


  }); //DOM CONTENT LOADED
})();
