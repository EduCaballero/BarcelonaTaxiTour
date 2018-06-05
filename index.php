<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>La mejor forma de visitar Barcelona</h2><!-- cambiar -->
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut velit eleifend, lobortis neque at, lacinia tellus. Vivamus ultrices tellus sed condimentum dapibus. Morbi in mi fringilla, lobortis mi in, mollis nunc. Ut vel sem vitae risus ornare cursus at et dui. Vestibulum malesuada eros sed lorem commodo lacinia. Morbi eleifend est neque, eu convallis dolor luctus non. Donec ac ante nec sem placerat laoreet. Duis vel nibh vel erat iaculis luctus.</p><!-- cambiar -->
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


  <section class="conductores contenedor seccion">
    <h2>Nuestros conductores/Taxis</h2><!-- cambiar /se puede poner conductores o coches, por si el cliente quiere escoger-->
    <ul class="lista-conductores clearfix">
      <li>
        <div class="conductor">
          <img src="img/conductor1.jpg" alt="imagen conductor">
          <p>Nombre Apellido</p><!--cambiar-->
        </div>
      </li>
      <li>
        <div class="conductor">
          <img src="img/conductor2.jpg" alt="imagen conductor">
          <p>Nombre Apellido</p><!--cambiar-->
        </div>
      </li>
      <li>
        <div class="conductor">
          <img src="img/conductor3.jpg" alt="imagen conductor">
          <p>Nombre Apellido</p><!--cambiar-->
        </div>
      </li>
      <li>
        <div class="conductor">
          <img src="img/conductor4.jpg" alt="imagen conductor">
          <p>Nombre Apellido</p><!--cambiar-->
        </div>
      </li>
      <li>
        <div class="conductor">
          <img src="img/conductor5.jpg" alt="imagen conductor">
          <p>Nombre Apellido</p><!--cambiar-->
        </div>
      </li>
      <li>
        <div class="conductor">
          <img src="img/conductor6.jpg" alt="imagen conductor">
          <p>Nombre Apellido</p><!--cambiar-->
        </div>
      </li>
    </ul>
  </section>

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
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum eget.</p>
          <footer class="info-biografia clearfix">
            <img src="img/biografia.jpg" alt="imagen biografia">
            <cite>Nombre Apellido Apellido2 <span>Conductor en blabla</span></cite>
          </footer>
        </blockquote>
      </div><!--.biografia-->
      <div class="biografia">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum eget.</p>
          <footer class="info-biografia clearfix">
            <img src="img/biografia.jpg" alt="imagen biografia">
            <cite>Nombre Apellido Apellido2 <span>Conductor en blabla</span></cite>
          </footer>
        </blockquote>
      </div><!--.biografia-->
      <div class="biografia">
        <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget tempor libero. Praesent ut ullamcorper nisl. Morbi fringilla volutpat felis in mattis. Donec egestas augue risus, in mollis dui dictum eget.</p>
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
      <a href="#" class="button transparente">Registrarse</a>
    </div>
  </div><!--.newsletter-->

  <section class="seccion">
    <h2>Próximo evento en Barcelona:</h2>
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
