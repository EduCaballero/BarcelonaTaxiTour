(function () {
  "use strict";

  var regalo=document.getElementById('regalo');

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
    var lista_productos=document.getElementById('lista-productos');
    var suma = document.getElementById('suma-total');

    // Extras
    var sagrada =document.getElementById('entrada_sagrada');
    var guell = document.getElementById('entrada_guell');

    //botonRegistro.disabled = true;

    calcular.addEventListener('click', calcularPrecio);

    dia_completo.addEventListener('input', mostrarServicios);
    rutas.addEventListener('input', mostrarServicios);
    traslados.addEventListener('input', mostrarServicios);


    function  calcularPrecio(event) {
      event.preventDefault();
      //console.log(regalo.value);
      if (regalo.value === ''){
        alert("Escoge un regalo");
        regalo.focus();
      } else {
        //console.log('regalo escogido: '+ regalo.value);
        var serviciosDia = dia_completo.value, //TODO quizá añadir un parseInt
          serviciosTraslados = traslados.value,
          serviciosRutas = rutas.value,
          entradasSagrada = sagrada.value,
          entradasGuell = guell.value;

        //sólo para debug
        /*console.log("servicios dia: " + serviciosDia);
        console.log("servicios traslado: " + serviciosTraslados);
        console.log("servicios rutas: " + serviciosRutas);*/

        var totalPagar = (serviciosDia * 200) + (serviciosTraslados * 30) + (serviciosRutas * 50) + ((entradasSagrada * 12) * .93) + (entradasGuell * 10);
        //console.log("Total: " + totalPagar)

        var listadoProductos = [];
        if(serviciosDia >= 1) {
          listadoProductos.push(serviciosDia + ' Dia completo');
        }
        if(serviciosTraslados >= 1) {
          listadoProductos.push(serviciosTraslados + ' Traslados');
        }
        if(serviciosRutas >= 1) {
          listadoProductos.push(serviciosRutas + ' Rutas');
        }
        if(entradasSagrada >= 1) {
          listadoProductos.push(entradasSagrada + ' Entradas Sagrada Familia');
        }
        if(entradasGuell >= 1) {
          listadoProductos.push(entradasGuell + ' Entradas Parc Guell');
        }
        //ahora imprimir la lista de pedidos en el html
        lista_productos.style.display = "block";//con esto y el css para que no salga recuadro gris cuando no hay nada.
        lista_productos.innerHTML = '';
        for(var i = 0; i< listadoProductos.length; i++) {
          lista_productos.innerHTML += listadoProductos[i] + '<br/>';//a cada vuelta lo saca
        }

        suma.innerHTML = "$ " + totalPagar.toFixed(2);//IMPORTANTíSIMO, recortar decimales con esto o la pasarela de pago da error si hay más decimales

        /*botonRegistro.disabled = false;
        document.getElementById('total_pedido').value = totalPagar;*/

      }
    }

    function mostrarServicios() {
      /*console.log(dia_completo.value)
      console.log(rutas.value)
      console.log(traslados.value)*/
      var serviciosDia = dia_completo.value,
        serviciosTraslados = traslados.value,
        serviciosRutas = rutas.value;

      var serviciosElegidos = [];

      if (serviciosDia > 0){
        serviciosElegidos.push('seleccion-ruta', 'seleccion-traslado');
        console.log(serviciosElegidos)
      }
      if (serviciosTraslados > 0){
        serviciosElegidos.push('seleccion-traslado');
        console.log(serviciosElegidos)
      }
      if (serviciosRutas > 0){
        serviciosElegidos.push('seleccion-ruta');
        console.log(serviciosElegidos)
      }

      for(var i = 0; i < serviciosElegidos.length; i++) {
        document.getElementById(serviciosElegidos[i]).style.display = 'block';
      }

      if(serviciosElegidos.length == 0 ) {
        var todosDias = document.getElementsByClassName('contenido-dia');
        for(var i = 0; i < todosDias.length; i++) {
          todosDias[i].style.display = 'none';
        }
      }
      //FIX para ocultar uno de los dos, que se quedaba enganchado
      if (serviciosElegidos.includes('seleccion-ruta') && !serviciosElegidos.includes('seleccion-traslado')){
        var ocultar = document.getElementById('seleccion-traslado');
        ocultar.style.display = 'none';
      }
      if (!serviciosElegidos.includes('seleccion-ruta') && serviciosElegidos.includes('seleccion-traslado')){
        var ocultar = document.getElementById('seleccion-ruta');
        ocultar.style.display = 'none';
      }

    }


  }); //DOM CONTENT LOADED
})();
