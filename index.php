<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>La mejor forma de visitar Barcelona</h2><!-- cambiar -->
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut velit eleifend, lobortis neque at, lacinia
    tellus. Vivamus ultrices tellus sed condimentum dapibus. Morbi in mi fringilla, lobortis mi in, mollis nunc. Ut vel
    sem vitae risus ornare cursus at et dui. Vestibulum malesuada eros sed lorem commodo lacinia. Morbi eleifend est
    neque, eu convallis dolor luctus non. Donec ac ante nec sem placerat laoreet. Duis vel nibh vel erat iaculis
    luctus.</p><!-- cambiar -->
</section> <!--seccion quick info-->

<section class="informacion">
  <div class="contenedor-video">
    <video autoplay loop poster="img/bg-informacion.jpg" muted><!-- cambiar -->
      <source src="video/video.mp4" type="video/mp4"><!--compatibilidad con varios navegadores-->
      <source src="video/video.webm" type="video/webm">
      <source src="video/video.ogv" type="video/ogg">
    </video>
  </div> <!-- .contenedor-video -->

  <div class="contenido-informacion">
    <div class="contenedor">
      <div class="informacion-servicio"><!-- cambiar -->
        <h2>Información del Servicio</h2>

        <?php
        try {
          require_once('includes/funciones/bd_conexion.php');
          $sql = "SELECT * FROM `categoria_servicio` ";
          $resultado = $conn->query($sql);
        } catch (Exception $e) {
          $error = $e->getMessage();
        }
        ?>
        <nav class="menu-informacion">
          <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoria = $cat['cat_servicio']; ?>
            <a href="#<?php echo strtolower($categoria) ?>">
              <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
            </a>
          <?php } ?>
        </nav>

        <?php
        try {
          require_once('includes/funciones/bd_conexion.php');
          $sql = "SELECT `servicio_id`, `nombre_servicio`, `fecha_servicio`, `hora_servicio`, `cat_servicio`, `nombre_taxi`, `apellido_taxi` ";
          $sql .= "FROM `servicios` ";
          $sql .= "INNER JOIN `categoria_servicio` ";
          $sql .= "ON servicios.id_cat_servicio=categoria_servicio.id_categoria ";
          $sql .= "INNER JOIN `taxis` ";
          $sql .= "ON servicios.id_taxi=taxis.taxi_id ";
          $sql .= "AND servicios.id_cat_servicio = 1 ";
          $sql .= "ORDER BY `servicio_id` LIMIT 2;";
          $sql .= "SELECT `servicio_id`, `nombre_servicio`, `fecha_servicio`, `hora_servicio`, `cat_servicio`, `nombre_taxi`, `apellido_taxi` ";
          $sql .= "FROM `servicios` ";
          $sql .= "INNER JOIN `categoria_servicio` ";
          $sql .= "ON servicios.id_cat_servicio=categoria_servicio.id_categoria ";
          $sql .= "INNER JOIN `taxis` ";
          $sql .= "ON servicios.id_taxi=taxis.taxi_id ";
          $sql .= "AND servicios.id_cat_servicio = 2 ";
          $sql .= "ORDER BY `servicio_id` LIMIT 2;";
          $sql .= "SELECT `servicio_id`, `nombre_servicio`, `fecha_servicio`, `hora_servicio`, `cat_servicio`, `nombre_taxi`, `apellido_taxi` ";
          $sql .= "FROM `servicios` ";
          $sql .= "INNER JOIN `categoria_servicio` ";
          $sql .= "ON servicios.id_cat_servicio=categoria_servicio.id_categoria ";
          $sql .= "INNER JOIN `taxis` ";
          $sql .= "ON servicios.id_taxi=taxis.taxi_id ";
          $sql .= "AND servicios.id_cat_servicio = 3 ";
          $sql .= "ORDER BY `servicio_id` LIMIT 2;";
        } catch (Exception $e) {
          $error = $e->getMessage();
        }
        ?>


        <?php $conn->multi_query($sql); ?> <!--multi consulta de arriba -->

        <?php
        do {
          $resultado = $conn->store_result();
          $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

          <?php $i = 0; ?> <!--contador para que no repita el class "info-ruta ocultar"-->
          <?php foreach ($row as $servicio): ?>
            <?php if ($i % 2 == 0) { ?> <!--cuando sea número par-->
              <div id="<?php echo strtolower($servicio['cat_servicio']) ?>" class="info-ruta ocultar clearfix">
            <?php } ?>
            <div class="detalle-servicio">
              <h3><?php echo html_entity_decode($servicio['nombre_servicio']) ?></h3>
              <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $servicio['hora_servicio']; ?></p>
              <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $servicio['fecha_servicio']; ?></p>
              <p><i class="fa fa-info"
                    aria-hidden="true"></i> <?php echo $servicio['nombre_taxi'] . " " . $servicio['apellido_taxi']; ?>
              </p>
            </div>
            <?php if ($i % 2 == 1): ?> <!--cuando sean impares-->
              <a href="calendario.php" class="button float-right">Ver todos</a>
              </div> <!--#rutas-->
            <?php endif; ?>
            <?php $i++; ?>
          <?php endforeach; ?>
          <?php $resultado->free(); ?> <!--necesario con las multiconsultas, liberar memoria-->
        <?php } while ($conn->more_results() && $conn->next_result()); ?>

        <!--
        <nav class="menu-informacion">
          <a href="#rutas"><i class="fa fa-taxi" aria-hidden="true"></i>Rutas</a>
          <a href="#dia-completo"><i class="fa fa-calendar-o" aria-hidden="true"></i>Día completo</a>
          <a href="#traslados"><i class="fa fa-plane" aria-hidden="true"></i>Traslados</a>
        </nav>

        <div id="rutas" class="info-ruta ocultar clearfix">
          <div class="detalle-servicio">
            <h3>Arc de Triomf, Parc de la Ciutadella, el Born</h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i>3h de duración</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i>Fecha en las que se realiza</p>
            <p><i class="fa fa-info" aria-hidden="true"></i>Pequeña info rápida sobre la ruta</p>
          </div>
          <div class="detalle-servicio">
            <h3>Sagrada Familia, Hospital de Sant Pau, Parc Güell</h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 5h de duración</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> Fecha en las que se realiza</p>
            <p><i class="fa fa-info" aria-hidden="true"></i> Pequeña info rápida sobre la ruta</p>
          </div>
          <a href="#" class="button float-right">Ver todos</a>
        </div><!-- #rutas -->
        <!--
        <div id="traslados" class="info-ruta ocultar clearfix">
          <div class="detalle-servicio">
            <h3>Aeropuerto <i class="fa fa-arrows-h" aria-hidden="true"></i> Barcelona</h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 30 min de duración</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> Disponible los 365 días</p>
            <p><i class="fa fa-info" aria-hidden="true"></i> Pequeña info rápida sobre la ruta</p>
          </div>
          <div class="detalle-servicio">
            <h3>Cruceros <i class="fa fa-arrows-h" aria-hidden="true"></i> Barcelona</h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 20min de duración</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> Disponible los 365 días</p>
            <p><i class="fa fa-info" aria-hidden="true"></i> Pequeña info rápida sobre la ruta</p>
          </div>
          <a href="#" class="button float-right">Ver todos</a>
        </div><!-- #traslados -->
        <!--
        <div id="dia-completo" class="info-ruta ocultar clearfix">
          <div class="detalle-servicio">
            <h3>Aeropuerto <i class="fa fa-arrows-h" aria-hidden="true"></i> Barcelona</h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 30 min de duración</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> Disponible los 365 días</p>
            <p><i class="fa fa-info" aria-hidden="true"></i> Pequeña info rápida sobre la ruta</p>
          </div>
          <div class="detalle-servicio">
            <h3>Sagrada Familia, Hospital de Sant Pau, Parc Güell</h3>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 5h de duración</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> Fecha en las que se realiza</p>
            <p><i class="fa fa-info" aria-hidden="true"></i> Pequeña info rápida sobre la ruta</p>
          </div>
          <a href="#" class="button float-right">Ver todos</a>
        </div><!-- #dia-completo -->

      </div><!-- .informacion-servicio -->
    </div><!-- .contenedor -->
  </div><!-- .contenido-informacion -->
</section><!-- .informacion -->


<?php include_once 'includes/templates/taxistas.php'; ?>

<div class="contador parallax">
  <div class="contenedor">
    <ul class="resumen-servicio clearfix"><!--cambiar-->
      <li><p class="numero">0</p>Conductores</li>
      <li><p class="numero">0</p>Rutas</li>
      <li><p class="numero">0</p>Días</li>
      <li><p class="numero">0</p>Traslados</li>
    </ul>
  </div>
</div> <!--.contador parallax-->

<section class="precios seccion">
  <h2>Precios</h2>
  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>Día completo</h3>
          <p class="numero">200€</p>
          <ul>
            <li>Incluye bla bla bla</li>
            <li>Todas las rutas</li>
            <li>Traslados incluídos</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Traslado Aeropuerto</h3>
          <p class="numero">30€</p>
          <ul>
            <li>Incluye bla bla bla</li>
            <li>Desde/hasta Barcelona Ciudad</li>
            <li>Equipaje incluído</li>
          </ul>
          <a href="#" class="button">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Ruta Eixample</h3>
          <p class="numero">50€</p>
          <ul>
            <li>Incluye bla bla bla</li>
            <li>Recogida en hotel</li>
            <li>Sin esperas</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
    </ul>
  </div>
</section><!--.precios-seccion-->

<div id="mapa" class="mapa"></div>

<section class="seccion">
  <h2>Información de nuestros conductores</h2>
  <div class="biografias contenedor clearfix">
    <div class="biografia">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut
          ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum
          eget.</p>
        <footer class="info-biografia clearfix">
          <img src="img/biografia.jpg" alt="imagen biografia">
          <cite>Nombre Apellido Apellido2 <span>Conductor en blabla</span></cite>
        </footer>
      </blockquote>
    </div><!--.biografia-->
    <div class="biografia">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut
          ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum
          eget.</p>
        <footer class="info-biografia clearfix">
          <img src="img/biografia.jpg" alt="imagen biografia">
          <cite>Nombre Apellido Apellido2 <span>Conductor en blabla</span></cite>
        </footer>
      </blockquote>
    </div><!--.biografia-->
    <div class="biografia">
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut
          ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum
          eget.</p>
        <footer class="info-biografia clearfix">
          <img src="img/biografia.jpg" alt="imagen biografia">
          <cite>Nombre Apellido Apellido2 <span>Conductor en blabla</span></cite>
        </footer>
      </blockquote>
    </div><!--.biografia-->
  </div>
</section>

<div class="newsletter parallax">
  <div class="contenido contenedor">
    <p>Regístrate a nuestra newsletter:</p>
    <h3>BCN Taxi Tour</h3>
    <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registrarse</a>
  </div>
</div><!--.newsletter-->

<section class="seccion">
  <h2>Próximo servicios en Barcelona:</h2>
  <div class="cuenta-atras contenedor">
    <ul class="clearfix">
      <li><p id="dias" class="numero"></p> días</li>
      <li><p id="horas" class="numero"></p> horas</li>
      <li><p id="minutos" class="numero"></p> minutos</li>
      <li><p id="segundos" class="numero"></p> segundos</li>
    </ul>
  </div><!--.cuenta-atras-->
</section>

<?php include_once 'includes/templates/footer.php'; ?>
