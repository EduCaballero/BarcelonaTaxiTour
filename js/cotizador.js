(function() {
  "use strict";

  var regalo = document.getElementById('regalo');
  document.addEventListener('DOMContentLoaded', function(){

    // Campos Datos usuario
    var nombre = document.getElementById('nombre');
    var apellido =document.getElementById('apellido');
    var email =document.getElementById('email');

    // Campos pases
    var pase_dia =document.getElementById('pase_dia');
    var pase_dosdias =document.getElementById('pase_dosdias');
    var pase_completo =document.getElementById('pase_completo');

    //Botones y divs
    var calcular = document.getElementById('calcular');
    var errorDiv = document.getElementById('error');
    var botonRegistro = document.getElementById('btnRegistro');
    var lista_productos = document.getElementById('lista-productos');
    var suma = document.getElementById('suma-total');

    // Extras
    var pedido_sagrada =document.getElementById('entrada_sagrada');
    var pedido_guell = document.getElementById('pedido_guell');

    botonRegistro.disabled = true;

    if(document.getElementById('calcular')) {



      calcular.addEventListener('click', calcularMontos);

      pase_dia.addEventListener('input', mostrarDias);
      pase_dosdias.addEventListener('input', mostrarDias);
      pase_completo.addEventListener('input', mostrarDias);

      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarMail);

      var formulario_editar = document.getElementsByClassName('editar-registrado');
      if(formulario_editar.length > 0) {
        if(pase_dia.value || pase_dosdias.value || pase_completo.value ) {
          mostrarDias();
        }
      }



      function validarCampos() {
        if(this.value == '') {
          errorDiv.style.display= 'block';
          errorDiv.innerHTML ="este campo es obligatorio";
          this.style.border = '1px solid red';
          errorDiv.style.border = '1px solid red';
        } else {
          errorDiv.style.display = 'none';
          this.style.border = '1px solid #cccccc';
        }
      }

      function validarMail() {
        if(this.value.indexOf("@") > -1) {
          errorDiv.style.display = 'none';
          this.style.border = '1px solid #cccccc';
        } else {
          errorDiv.style.display= 'block';
          errorDiv.innerHTML ="debe tener al menos una @";
          this.style.border = '1px solid red';
          errorDiv.style.border = '1px solid red';
        }
      }



      function calcularMontos(event){
        event.preventDefault();
        if(regalo.value === '') {
          alert("Debes elegir un regalo");
          regalo.focus();
        } else {
          var pasesDia = parseInt(pase_dia.value, 10)|| 0,
            pases2Dias = parseInt(pase_dosdias.value, 10)|| 0,
            boletoCompleto = parseInt(pase_completo.value, 10)|| 0,
            cantpedido_sagrada = parseInt(pedido_sagrada.value, 10)|| 0,
            cantpedido_guell =parseInt(pedido_guell.value, 10)|| 0;


          var totalPagar = (pasesDia * 30) +  (pases2Dias * 45) + (boletoCompleto * 50) + ((cantpedido_sagrada * 10) * .93) + (cantpedido_guell * 2);

          var listadoProductos = [];

          if(pasesDia >= 1) {
            listadoProductos.push(pasesDia + ' Pases por día');
          }
          if(pases2Dias >= 1) {
            listadoProductos.push(pases2Dias + ' Pases por 2 días');
          }
          if(boletoCompleto >= 1) {
            listadoProductos.push(boletoCompleto + ' Pases Completos');
          }
          if(cantpedido_sagrada >= 1) {
            listadoProductos.push(cantpedido_sagrada + ' pedido_sagrada');
          }
          if(cantpedido_guell >= 1) {
            listadoProductos.push(cantpedido_guell + ' pedido_guell');
          }
          lista_productos.style.display = "block";
          lista_productos.innerHTML = '';
          for(var i = 0; i< listadoProductos.length; i++) {
            lista_productos.innerHTML += listadoProductos[i] + '<br/>';
          }
          suma.innerHTML = "$ " + totalPagar.toFixed(2);

          botonRegistro.disabled = false;
          document.getElementById('total_pedido').value = totalPagar;

        }
      }

      function mostrarDias(){
        var pasesDia = parseInt(pase_dia.value, 10)|| 0,
          pases2Dias = parseInt(pase_dosdias.value, 10)|| 0,
          boletoCompleto = parseInt(pase_completo.value, 10)|| 0;

        console.log(boletoCompleto);

        var diasElegidos = [];

        if(pasesDia > 0){
          diasElegidos.push('viernes');
          console.log(diasElegidos);
        }
        if(pases2Dias>0) {
          diasElegidos.push('viernes','sabado');
          console.log(diasElegidos);
        }
        if(boletoCompleto>0) {
          diasElegidos.push('viernes', 'sabado', 'domingo');
          console.log(diasElegidos);
        }
        console.log(diasElegidos.length);

        for(var i = 0; i < diasElegidos.length; i++) {
          document.getElementById(diasElegidos[i]).style.display = 'block';
        }

        if(diasElegidos.length == 0 ) {
          var todosDias = document.getElementsByClassName('contenido-dia');
          for(var i = 0; i < todosDias.length; i++) {
            todosDias[i].style.display = 'none';
          }
        }

      }

    }


  }); // DOM CONTENT LOADED
})();
