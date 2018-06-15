<?php
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Listado de servicios
          <small>Aquí podrás editar o borrar los servicios</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los servicios en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoría</th>
                  <th>taxi</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                $sql = "SELECT servicio_id, nombre_servicio, fecha_servicio, hora_servicio, cat_servicio, nombre_taxi, apellido_taxi ";
                                $sql .= " FROM servicios ";
                                $sql .= " INNER JOIN categoria_servicio ";
                                $sql .= " ON  servicios.id_cat_servicio=categoria_servicio.id_categoria ";
                                $sql .= " INNER JOIN taxis ";
                                $sql .= " ON servicios.id_taxi=taxis.taxi_id ";
                                $sql .= " ORDER BY servicio_id ";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($servicios = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $servicios['nombre_servicio']; ?></td>
                                    <td><?php echo $servicios['fecha_servicio']; ?></td>
                                    <td><?php echo $servicios['hora_servicio']; ?></td>
                                    <td><?php echo $servicios['cat_servicio']; ?></td>
                                    <td><?php echo $servicios['nombre_taxi'] . " " . $servicios['apellido_taxi']; ?></td>
                                    <td>
                                        <a href="editar-servicio.php?id=<?php echo $servicios['servicio_id'] ?>" class="btn bg-orange btn-flat margin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" data-id="<?php echo $servicios['servicio_id']; ?>" data-tipo="servicios" class="btn bg-maroon bnt-flat margin borrar_registro">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoría</th>
                    <th>taxi</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>

