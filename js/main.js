var api = 'AIzaSyCDN4YMqg5TctNBSJfJJju41wNryzL_8Cs';

/*@41.3947688,2.0787279,12z*///latitud y longitud bcn
/*@41.3870154,2.1678584,17z plç Catalunya*/
function initMap() {
  var latLng = {
    /*lat: 41.3947688, //barcelona
    lng: 2.0787279*/
    lat: 41.3870154, //plç Cat
    lng: 2.1678584
  }

  var map = new google.maps.Map(document.getElementById('mapa'), {
    'center': latLng, //center: {lat: -34.397, lng: 150.644},
    'zoom': 12,
    'mapTypeId': google.maps.MapTypeId.ROADMAP
  });

  var contenido = '<h2>BCN Taxi Tour</h2>'+
    '<p>Tu servicio de Taxi en Barcelona</p>'+
    '<p>¡No te arrepentirás!</p>';

  var informacion = new google.maps.InfoWindow({
    content: contenido
  });

  var marker = new google.maps.Marker({
    position:latLng,
    map: map,
    title: 'BCN Taxi Tour'
  });

  marker.addListener('click', function(){
    informacion.open(map, marker);
  });

}

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

    if (document.getElementById('calcular')){ //quitar el peo de uncaught type error

      calcular.addEventListener('click', calcularPrecio);

      dia_completo.addEventListener('input', mostrarServicios);
      rutas.addEventListener('input', mostrarServicios);
      traslados.addEventListener('input', mostrarServicios);

      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarMail);

    }




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

    function validarCampos() {
      if(this.value == '') {
        errorDiv.style.display= 'block';
        errorDiv.innerHTML ="Este campo es obligatorio";
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
        errorDiv.innerHTML ="Por favor, introduce una dirección de correo electrónico válida";
        this.style.border = '1px solid red';
        errorDiv.style.border = '1px solid red';
      }
    }


  }); //DOM CONTENT LOADED
})();

$(function () {

  //lettering plugin
  $('.nombre-sitio').lettering();//esto aplica a cada una de las letras un span, para poder trabajar individualmente con ellas

  // Agregar clase a Menú -- la rallita debajo que indica dónde estamos
  $('body.ruta .navegacion-principal a:contains("Rutas")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.taxis .navegacion-principal a:contains("Taxistas/taxis")').addClass('activo');

  //fijar menú
  var windowHeight = $(window).height();//altura de la ventana
  var barraAltura = $('.barra').innerHeight();//altura barra a fijar

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    //console.log(scroll);
    if (scroll>windowHeight){
      $('.barra').addClass('fixed');
      $('body').css({'margin-top':barraAltura+'px'});//para que el fijado sea suave y no de un salto feo
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({'margin-top':'0'+'px'});
    }
  });

  //menú responsive
  $('.menu-movil').on('click', function () {
    $('.navegacion-principal').slideToggle();//en lugar de utilizar hide y show, además da efecto chulo
  });

  //info rutas
  $('.informacion-servicio .info-ruta:first').show();//para que sólo muestre uno
  $('.menu-informacion a:first').addClass('activo');//para que el selector por defecto cuando recarga la página esté activo

  $('.menu-informacion a').on('click', function () {
    $('.menu-informacion a').removeClass('activo');//para que al clickar uno debajo, no se mantengan los otros también activos
    $(this).addClass('activo');
    $('.ocultar').hide();
    var enlace = $(this).attr('href');
    //console.log(enlace);
    $(enlace).fadeIn(750);
    return false; //para que no de el salto ese de mierda, horrible
  });

  //animaciones para los números //añado waypoint para animación cuando llegas a ellos
  var resumenLista = jQuery('.resumen-servicio');//añadir un booleano si quiero que sólo se haga la animación una vez
  if (resumenLista.length>0){
    $('.resumen-servicio').waypoint(function () {
      $('.resumen-servicio li:nth-child(1) p').animateNumber({number: 6}, 1200);
      $('.resumen-servicio li:nth-child(2) p').animateNumber({number: 15}, 1200);
      $('.resumen-servicio li:nth-child(3) p').animateNumber({number: 3}, 600);
      $('.resumen-servicio li:nth-child(4) p').animateNumber({number: 9}, 1500);
    }, {
      offset: '60%' //para que empeice la animación, siempre, cuando empiezas a verlo, no cuando está a punto de salir de la vista
    });
  }



  //countdown
  $('.cuenta-atras').countdown('2018/12/10 00:00:00', function (event) { /* cambiar - poner cuándo termina una oferta o una promoción*/
    $('#dias').html(event.strftime('%D'));//strftime pasa a string el tiempo
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  })

  // Colorbox - taxis/taxistas. Info cuando haces click
  $('.conductor-info').colorbox({inline:true, width:"50%"});
  $('.boton_newsletter').colorbox({inline:true, width:"50%"});





});
