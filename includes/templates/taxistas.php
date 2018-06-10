<?php
try {
  require_once('includes/funciones/bd_conexion.php');
  $sql = "SELECT * FROM `taxis` ";
  $resultado = $conn->query($sql);
} catch (Exception $e) {
  $error = $e->getMessage();
}
?>

  <section class="conductores contenedor seccion">
    <h2>Nuestros conductores/Taxis</h2><!--cambiar-->
    <ul class="lista-conductores clearfix">

      <?php while($taxis = $resultado->fetch_assoc() ){ ?>

        <li>
          <div class="conductor">
            <a class="conductor-info" href="#conductor<?php echo $taxis['taxi_id']; ?>">
              <img src="img/taxis/<?php echo $taxis['url_imagen'] ?>" alt="Imagen taxi">
              <p><?php echo $taxis['nombre_taxi'] . " " . $taxis['apellido_taxi'] ?></p>
            </a>
          </div> <!-- END .invitado -->
        </li>

        <div style="display:none;"> <!--ocultar-->

          <div class="conductor-info" id="conductor<?php echo $taxis['taxi_id']; ?>">
            <h2><?php echo $taxis['taxi_invitado'] ?></h2>
            <img src="img/<?php echo $taxis['url_imagen'] ?>" alt="">
            <p><?php echo $taxis['descripcion'] ?></p>
          </div>

        </div>

      <?php } ?>

    </ul> <!-- END lista-taxis -->
  </section> <!-- END .taxis -->

<?php
$conn->close();
?>
