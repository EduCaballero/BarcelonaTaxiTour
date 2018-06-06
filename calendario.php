<?php include_once 'includes/templates/header.php'; ?>




<section class="seccion contenedor">
  <h2>Calendario de Eventos</h2>

  <?php
  try {
    require_once('includes/funciones/bd_conexion.php');
    $sql = "SELECT `servicio_id`, `nombre_servicio`, `fecha_servicio`, `hora_servicio`, `cat_servicio`, `nombre_taxi`, `apellido_taxi` ";
    $sql .= "FROM `servicios` ";
    $sql .= "INNER JOIN `categoria_servicio` ";
    $sql .= "ON servicios.id_cat_servicio=categoria_servicio.id_categoria ";
    $sql .= "INNER JOIN `taxis` ";
    $sql .= "ON servicios.id_taxi=taxis.taxi_id ";
    $sql .= "ORDER BY `servicio_id`;";
    $resultado = $conn->query($sql);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
  ?>
  <div class="calendario">


    <?php while($eventos = $resultado->fetch_all(MYSQLI_ASSOC) ) { ?>

    <?php $dias = array(); ?>
    <?php foreach($eventos as $evento) {
      $dias[] = $evento['fecha_servicio'];
    } ?>


    <?php $dias = array_values(array_unique($dias)) //esto es para que no haya duplicados?>
    <?php $contador = 0; ?>
    <?php foreach($eventos as $evento): ?>

      <?php $dia_actual = $evento['fecha_servicio']; ?>
      <?php if($dia_actual == $dias[$contador]): ?>
        <h3>
          <i class="fa fa-calendar" aria-hidden="true"></i>
          <?php echo $evento['fecha_servicio']; ?>
        </h3>
        <?php $contador++; ?> <!-- hay que resetear el contador para evitar el error Notice: Undefined offset: 3, porque sólo están los tres tipos de servicio: ruta, traslado, día completo -->
        <?php if($contador==3): ?> <!-- me dejo esto aquí por si pongo más de tres en un futuro, para acordarme de por qué era el error < ?php if($contador== count($dias)): ?> -->
          <?php $contador =0; ?>
        <?php endif; ?>
      <?php endif; ?>

      <div class="dia">
        <p class="titulo"><?php echo utf8_encode($evento['nombre_servicio']); ?></p>
        <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $evento['fecha_servicio'] . " " . $evento['hora_servicio'] . " hrs"; ?>
        <p>
          <?php $categoria_evento = $evento['cat_servicio']; ?>

          <?php
          switch ($categoria_evento) {
            case 'Rutas':
              echo '<i class="fa fa-taxi" aria-hidden="true"></i> Rutas';
              break;
            case 'Dia completo':
              echo '<i class="fa fa-calendar-o" aria-hidden="true"></i> Dia completo';
              break;
            case 'Traslado':
              echo '<i class="fa fa-plane" aria-hidden="true"></i> Traslado';
              break;
            default:
              echo "";
              break;
          }
          ?>
        </p>
        <p><i class="fa fa-user" aria-hidden="true"></i>
          <?php echo $evento['nombre_taxi'] . " " . $evento['apellido_taxi']; ?>
        </p>

      </div>

    <?php endforeach; ?>
  </div> <!--.calendario-->
<?php } ?>

  <?php
  $conn->close();
  ?>


</section>


<?php include_once 'includes/templates/footer.php'; ?>
