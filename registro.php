<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
  <h2>Registro de usuarios</h2>
  <form id="registro" class="registro" action="pagar.php" method="post">
    <div id="datos_usuario" class="registro caja clearfix">
      <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
      </div>
      <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido">
      </div>
      <div class="campo">
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" placeholder="Tu e-mail">
      </div>
      <div id="error"></div>
    </div><!--.#datos_usuario-->

    <div id="paquetes" class="paquetes">
      <h3>Escoge el número de servicios a contratar</h3>
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Día completo</h3>
            <p class="numero">200€</p>
            <ul>
              <li>12h a tu entera disposición</li>
              <li>Todas las rutas</li>
              <li>Traslados incluídos</li>
            </ul>
            <div class="orden">
              <label for="dia_completo">Contratar:</label>
              <input type="number" min="0" id="dia_completo" size="3" name="pases[un_dia][cantidad]" placeholder="0">
              <input type="hidden" value="200" name="pases[un_dia][precio]">
            </div>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Traslados</h3>
            <p class="numero">30€</p>
            <ul>
              <li>Aeropuerto y Cruceros</li>
              <li>Desde/hasta Barcelona Ciudad</li>
              <li>Equipaje incluído</li>
            </ul>
            <div class="orden">
              <label for="traslados">Traslados:</label>
              <input type="number" min="0" id="traslados" size="3" name="pases[traslados][cantidad]" placeholder="0">
              <input type="hidden" value="30" name="pases[traslados][precio]">
            </div>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Rutas por Barcelona</h3>
            <p class="numero">50€</p>
            <ul>
              <li>Sagrada Familia, Parc Guëll...</li>
              <li>Recogida en hotel</li>
              <li>Sin esperas</li>
            </ul>
            <div class="orden">
              <label for="rutas">Rutas:</label>
              <input type="number" min="0" id="rutas" size="3" name="pases[rutas][cantidad]" placeholder="0">
              <input type="hidden" value="200" name="pases[rutas][precio]">
            </div>
          </div>
        </li>
      </ul>
    </div><!--.paquetes-->

    <div id="servicios" class="servicios clearfix">
      <h3>Selecciona entre los servicios disponibles</h3>
      <div class="caja">
        <div id="seleccion-ruta" class="contenido-dia clearfix">
          <h4>Rutas</h4> <!--cambiar-->
          <div>
            <p>Ruta Gaudí:</p>
            <label><input type="checkbox" name="registro[]" id="gaudi_01" value="gaudi_01"><time>10:00</time> Sagrada Familia</label>
            <label><input type="checkbox" name="registro[]" id="gaudi_02" value="gaudi_02"><time>12:00</time> Hospital Sant Pau</label>
            <label><input type="checkbox" name="registro[]" id="gaudi_03" value="gaudi_03"><time>14:00</time> Parc Güell</label>
            <label><input type="checkbox" name="registro[]" id="gaudi_04" value="gaudi_04"><time>17:00</time> Casa Batllò</label>
            <label><input type="checkbox" name="registro[]" id="gaudi_05" value="gaudi_05"><time>19:00</time> La Pedrera</label>
          </div>
          <div>
            <p>Ruta Montjuïc:</p>
            <label><input type="checkbox" name="registro[]" id="montjuic_01" value="montjuic_01"><time>10:00</time> Funicular</label>
            <label><input type="checkbox" name="registro[]" id="montjuic_02" value="montjuic_02"><time>17:00</time> Fira Barcelona</label>
            <label><input type="checkbox" name="registro[]" id="montjuic_03" value="montjuic_03"><time>19:00</time> Plaça Espanya</label>
          </div>
          <!--<div>
            <p>Ruta Tibidabo:</p>
            <label><input type="checkbox" name="registro[]" id="tibidabo_01" value="tibidabo_01"><time>10:00</time> Parc Tibidabo</label>
          </div>-->
          <div>
            <p>Ruta de compras:</p>
            <label><input type="checkbox" name="registro[]" id="compras_01" value="compras_01"><time>10:00</time> tienda1</label>
            <label><input type="checkbox" name="registro[]" id="compras_02" value="compras_02"><time>12:00</time> tienda2</label>
            <label><input type="checkbox" name="registro[]" id="compras_03" value="compras_03"><time>14:00</time> restaurante</label>
            <label><input type="checkbox" name="registro[]" id="compras_04" value="compras_04"><time>17:00</time> tienda3</label>
            <label><input type="checkbox" name="registro[]" id="compras_05" value="compras_05"><time>19:00</time> Centro comercial</label>
            <label><input type="checkbox" name="registro[]" id="compras_06" value="compras_06"><time>21:00</time> restaurante2</label>
          </div>
          <!--<div>
            <p>Ruta Born:</p>
            <label><input type="checkbox" name="registro[]" id="born_01" value="born_01"><time>10:00</time> Barri del Born</label>
            <label><input type="checkbox" name="registro[]" id="born_02" value="born_02"><time>17:00</time> Parc de la Ciutadella</label>
            <label><input type="checkbox" name="registro[]" id="born_03" value="born_03"><time>19:00</time> Arc de Triomf</label>
          </div>
          <div>
            <p>Ruta centro:</p>
            <label><input type="checkbox" name="registro[]" id="centro_01" value="centro_01"><time>10:00</time> Plaça Catalunya</label>
            <label><input type="checkbox" name="registro[]" id="centro_02" value="centro_02"><time>17:00</time> Rambla Catalunya</label>
          </div>-->
        </div> <!--#seleccion-ruta-->
        <div id="seleccion-traslado" class="contenido-dia clearfix">
          <h4>Traslados</h4>
          <div>
            <p>Aeropuerto T1:</p>
            <label><input type="checkbox" name="registro[]" id="traslados_01" value="traslados_01"><time>10:00</time> Barcelona hasta Aeropuerto</label>
            <label><input type="checkbox" name="registro[]" id="traslados_02" value="traslados_02"><time>12:00</time> Aeropuerto hasta Barcelona</label>
          </div>
          <div>
            <p>Aeropuerto T2:</p>
            <label><input type="checkbox" name="registro[]" id="traslados_03" value="traslados_03"><time>10:00</time> Barcelona hasta Aeropuerto</label>
            <label><input type="checkbox" name="registro[]" id="traslados_04" value="traslados_04"><time>12:00</time> Aeropuerto hasta Barcelona</label>
          </div>
          <div>
            <p>Cruceros - Moll de la Fusta:</p>
            <label><input type="checkbox" name="registro[]" id="traslados_07" value="traslados_07"><time>10:00</time> Barcelona hasta zona cruceros</label>
            <label><input type="checkbox" name="registro[]" id="traslados_08" value="traslados_08"><time>17:00</time> Zona cruceros hasta Barcelona</label>
          </div>
        </div> <!--#Traslados-->
        <!--TODO aquí podría poner servicios o dias especiales.-->
        <!--<div id="domingo" class="contenido-dia clearfix">
          <h4>Domingo</h4>
          <div>
            <p>Ruta a:</p>
            <label><input type="checkbox" name="registro[]" id="rutaa_12" value="rutaa_12"><time>10:00</time> sitio1</label>
            <label><input type="checkbox" name="registro[]" id="rutaa_13" value="rutaa_13"><time>12:00</time> sitio2</label>
            <label><input type="checkbox" name="registro[]" id="rutaa_14" value="rutaa_14"><time>14:00</time> sitio3</label>
            <label><input type="checkbox" name="registro[]" id="rutaa_15" value="rutaa_15"><time>17:00</time> sitio4</label>
            <label><input type="checkbox" name="registro[]" id="rutaa_16" value="rutaa_16"><time>19:00</time> sitio5</label>
          </div>
          <div>
            <p>Ruta b:</p>
            <label><input type="checkbox" name="registro[]" id="rutab_07" value="rutab_07"><time>10:00</time> sitio6</label>
            <label><input type="checkbox" name="registro[]" id="rutab_08" value="rutab_08"><time>17:00</time> sitio7</label>
            <label><input type="checkbox" name="registro[]" id="rutab_09" value="rutab_09"><time>19:00</time> sitio8</label>
          </div>
          <div>
            <p>Ruta c:</p>
            <label><input type="checkbox" name="registro[]" id="rutac_04" value="rutac_04"><time>14:00</time> sitio9</label>
            <label><input type="checkbox" name="registro[]" id="rutac_05" value="rutac_05"><time>17:00</time> sitio10</label>
          </div>
        </div>--> <!--#domingo-->
      </div><!--.caja-->
    </div> <!--#servicios-->

    <div id="resumen" class="resumen">
      <h3>Pago y Extras</h3>
      <div class="caja clearfix">
        <div class="extras">
          <div class="orden">
            <label for="entrada_sagrada">Entrada a la Sagrada Familia 12€ <small>(promocion 7% descuento)</small></label>
            <input type="number" min="0" id="entrada_sagrada" name="pedido_extra[pedido_sagrada][cantidad]" size="3" placeholder="0">
            <input type="hidden" value="12" name="pedido_extra[pedido_sagrada][precio]">
          </div><!--.orden-->
          <div class="orden">
            <label for="entrada_guell">Entrada al Parc Güell 10€ <small>(Recinto)</small></label>
            <input type="number" min="0" id="entrada_guell" name="pedido_extra[pedido_guell][cantidad]" size="3" placeholder="0">
            <input type="hidden" value="10" name="pedido_extra[pedido_guell][precio]">
          </div><!--.orden-->
          <div class="orden">
            <label for="regalo">Selecciona un regalo</label><br>
            <select id="regalo" name="regalo" required>
              <option value="">- Seleccione un regalo --</option>
              <option value="2">Guia de Barcelona</option>
              <option value="1">Mapa de Barcelona</option>
              <option value="3">Wifi Gratis</option>
            </select>
          </div><!--.orden-->
          <input type="button" id="calcular" class="button" value="calcular">
        </div><!--.extras-->
        <div class="total">
          <p>Resumen:</p>
          <div id="lista-productos">

          </div>
          <p>Total:</p>
          <div id="suma-total">


          </div>
          <input type="hidden" name="total_pedido" id="total_pedido">
          <input id="btnRegistro" type="submit" name="submit" class="button" value="Pagar">
        </div><!--.total-->
      </div><!--.caja-->
    </div><!--.resumen-->

  </form>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
