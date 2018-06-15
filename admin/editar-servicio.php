<?php
        $id = $_GET['id'];

        if(!filter_var($id, FILTER_VALIDATE_INT)):
            die("Error");
        else:
        include_once 'funciones/sesiones.php';
        include_once 'templates/header.php';
        include_once 'funciones/funciones.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';


?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar servicios
        <small>llena el formulario para editar un servicios</small>
      </h1>
    </section>

        <div class="row">
                <div class="col-md-8">
                <!-- Main content -->
                <section class="content">

                  <!-- Default box -->
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Editar servicios</h3>
                    </div>
                    <div class="box-body">
                        <?php
                            $sql = "SELECT * FROM servicios WHERE servicio_id = $id ";
                            $resultado = $conn->query($sql);
                            $servicios = $resultado->fetch_assoc();
                        ?>


                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-servicios.php">
                              <div class="box-body">
                                    <div class="form-group">
                                          <label for="usuario">Titulo servicios:</label>
                                          <input type="text" class="form-control" id="titulo_servicios" name="titulo_servicios" placeholder="Titulo servicios" value="<?php echo $servicios['nombre_servicio']; ?>">
                                    </div>

                                    <div class="form-group">
                                          <label for="nombre">Categoría:</label>
                                          <select name="categoria_servicio" class="form-control seleccionar">
                                              <option value="0">- Seleccione -</option>
                                                    <?php
                                                        try {
                                                            $categoria_actual = $servicios['id_cat_servicio'];
                                                            $sql = "SELECT * FROM categoria_servicio ";
                                                            $resultado = $conn->query($sql);
                                                            while($cat_servicio = $resultado->fetch_assoc()) {
                                                                if($cat_servicio['id_categoria'] == $categoria_actual) { ?>
                                                                    <option value="<?php echo $cat_servicio['id_categoria']; ?>" selected>
                                                                        <?php echo $cat_servicio['cat_servicio']; ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="<?php echo $cat_servicio['id_categoria']; ?>" >
                                                                        <?php echo $cat_servicio['cat_servicio']; ?>
                                                                    </option>
                                                                <?php }
                                                            }
                                                        } catch (Exception $e) {
                                                            echo "Error: " . $e->getMessage();
                                                        }


                                                    ?>
                                          </select>
                                    </div>


                                    <div class="form-group">
                                          <label>Fecha servicios:</label>
                                          <?php
                                                $fecha = $servicios['fecha_servicio'];
                                                $fecha_formato = date('m/d/Y', strtotime($fecha));

                                          ?>

                                          <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="fecha" name="fecha_servicio" value="<?php echo $fecha_formato; ?>">
                                          </div>
                                          <!-- /.input group -->
                                    </div>

                                    <div class="bootstrap-timepicker">
                                          <div class="form-group">
                                                <label>Hora:</label>
                                                <?php
                                                    $hora = $servicios['hora_servicio'];
                                                    $hora_formato = date('h:i a', strtotime($hora));

                                                ?>
                                                <div class="input-group">
                                                      <input type="text" class="form-control timepicker" name="hora_servicio" value="<?php echo $hora_formato; ?>">

                                                      <div class="input-group-addon">
                                                          <i class="fa fa-clock-o"></i>
                                                      </div>
                                                </div>
                                                <!-- /.input group -->
                                              </div>
                                          <!-- /.form group -->
                                    </div>
                                    <div class="form-group">
                                          <label for="nombre">taxi o taxista:</label>
                                          <select name="taxi" class="form-control seleccionar" >
                                              <option value="0">- Seleccione -</option>
                                                    <?php
                                                        try {
                                                            $taxi_actual = $servicios['id_taxi'];
                                                            $sql = "SELECT taxi_id, nombre_taxi, apellido_taxi FROM taxis ";
                                                            $resultado = $conn->query($sql);
                                                            while($taxis = $resultado->fetch_assoc()) {
                                                                if($taxis['taxi_id'] == $taxi_actual) { ?>
                                                                    <option value="<?php echo $taxis['taxi_id']; ?>" selected>
                                                                            <?php echo $taxis['nombre_taxi'] . " " . $taxis['apellido_taxi']; ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option value="<?php echo $taxis['taxi_id']; ?>">
                                                                            <?php echo $taxis['nombre_taxi'] . " " . $taxis['apellido_taxi']; ?>
                                                                    </option>

                                                           <?php } //fin del if
                                                            }     //fin del while
                                                        } catch (Exception $e) {
                                                            echo "Error: " . $e->getMessage();
                                                        }


                                                    ?>
                                          </select>
                                    </div>
                              </div>
                              <!-- /.box-body -->

                              <div class="box-footer">
                                  <input type="hidden" name="registro" value="actualizar">
                                  <input type="hidden" name="id_registro" value="<?php  echo $id; ?>">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                              </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

                </section>
                <!-- /.content -->

                </div>
        </div>
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
      endif;
  ?>

