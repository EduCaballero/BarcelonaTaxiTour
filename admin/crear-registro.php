<?php
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
        Crear Registro de Usuario Manual
        <small>llena el formulario para crear un usuario registrado</small>
      </h1>
    </section>

        <div class="row">
                <div class="col-md-8">
                <!-- Main content -->
                <section class="content">

                  <!-- Default box -->
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Crear Usuario</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form  role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
                              <div class="box-body">
                                    <div class="form-group">
                                          <label for="nombre_registrado">Nombre:</label>
                                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                          <label for="apellido">Apellido:</label>
                                          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                    </div>
                                    <div class="form-group">
                                          <label for="email">Email:</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <div id="paquetes" class="paquetes">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Elige el número de pases</h3>
                                            </div>
                                          <ul class="lista-precios clearfix row">
                                              <li class="col-md-4">
                                                    <div class="tabla-precio text-center">
                                                        <h3>Pase por día (viernes)</h3>
                                                        <p class="numero">$30</p>
                                                        <ul>
                                                          <li>Bocadillos Gratis</li>
                                                          <li>Todas las conferencias</li>
                                                          <li>Todos los talleres</li>
                                                        </ul>
                                                        <div class="orden">
                                                            <label for="pase_dia">pases deseados:</label>
                                                            <input type="number" class="form-control" min="0" id="pase_dia" size="3" name="pases[un_dia][cantidad]" placeholder="0">
                                                            <input type="hidden" value="30" name="pases[un_dia][precio]">
                                                        </div>
                                                    </div>
                                              </li>
                                              <li class="col-md-4">
                                                    <div class="tabla-precio text-center">
                                                        <h3>Todos los días</h3>
                                                        <p class="numero">$50</p>
                                                        <ul>
                                                          <li>Bocadillos Gratis</li>
                                                          <li>Todas las conferencias</li>
                                                          <li>Todos los talleres</li>
                                                        </ul>
                                                        <div class="orden">
                                                            <label for="pase_completo">pases deseados:</label>
                                                            <input type="number" class="form-control" min="0" id="pase_completo" size="3" name="pases[completo][cantidad]" placeholder="0">
                                                            <input type="hidden" value="50" name="pases[completo][precio]">
                                                        </div>
                                                    </div>
                                              </li>

                                              <li class="col-md-4">
                                                    <div class="tabla-precio text-center">
                                                        <h3>Pase por 2 días (viernes y sábado)</h3>
                                                        <p class="numero">$45</p>
                                                        <ul>
                                                          <li>Bocadillos Gratis</li>
                                                          <li>Todas las conferencias</li>
                                                          <li>Todos los talleres</li>
                                                        </ul>
                                                        <div class="orden">
                                                            <label for="pase_dosdias">pases deseados:</label>
                                                            <input type="number" class="form-control" min="0" id="pase_dosdias" size="3" name="pases[2dias][cantidad]" placeholder="0">
                                                            <input type="hidden" value="45" name="pases[2dias][precio]">
                                                        </div>
                                                    </div>
                                              </li>
                                          </ul>
                                        </div><!--#paquetes-->
                                    </div> <!--.form-group-->

                                    <div class="form-group">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Elige los talleres</h3>
                                        </div>
                                        <div id="servicios" class="servicios clearfix">
                                                 <div class="caja ">
                                                        <?php
                                                            try {
                                                                $sql = "SELECT servicios.*, categoria_servicio.cat_servicio, taxis.nombre_taxi, taxis.apellido_taxi ";
                                                                $sql .= " FROM servicios ";
                                                                $sql .= " JOIN categoria_servicio ";
                                                                $sql .= " ON servicios.id_cat_servicio = categoria_servicio.id_categoria ";
                                                                $sql .= " JOIN taxis ";
                                                                $sql .= " ON servicios.id_taxi = taxis.taxi_id ";
                                                                $sql .= " ORDER BY servicios.fecha_servicio, servicios.id_cat_servicio, servicios.hora_servicio ";
                                                                //echo $sql;
                                                                $resultado = $conn->query($sql);
                                                            } catch (Exception $e) {
                                                                echo $e->getMessage();
                                                            }

                                                            $servicios_dias = array();
                                                            while($servicios = $resultado->fetch_assoc()) {

                                                                $fecha = $servicios['fecha_servicio'];
                                                                setlocale(LC_ALL, 'es_ES');
                                                                $dia_semana = strftime("%A", strtotime($fecha));

                                                                $categoria = $servicios['cat_servicio'];
                                                                $dia = array(
                                                                    'nombre_servicio' => $servicios['nombre_servicio'],
                                                                    'hora' => $servicios['hora_servicio'],
                                                                    'id' => $servicios['servicio_id'],
                                                                    'nombre_taxi' => $servicios['nombre_taxi'],
                                                                    'apellido_taxi' => $servicios['apellido_taxi']
                                                                );
                                                                $servicios_dias[$dia_semana]['servicios'][$categoria][] = $dia;
                                                            }


                                                        ?>

                                                        <?php foreach($servicios_dias as $dia => $servicios) { ?>
                                                           <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix row">
                                                               <h4 class="text-center nombre_dia"><?php echo $dia; ?></h4>

                                                               <?php foreach($servicios['servicios'] as $tipo => $servicios_dia): ?>
                                                                   <div class="col-md-4">
                                                                         <p><?php echo $tipo; ?></p>

                                                                         <?php foreach($servicios_dia as $servicios) { ?>
                                                                           <label>
                                                                                <input type="checkbox" class="minimal" name="registro_servicios[]" id="<?php echo $servicios['id']; ?>" value="<?php echo $servicios['id']; ?>">
                                                                                <time><?php echo $servicios['hora']; ?></time> <?php echo $servicios['nombre_servicio']; ?>
                                                                                <br>
                                                                                <span class="autor"><?php echo $servicios['nombre_taxi'] . " "  . $servicios['apellido_taxi']; ?></span>
                                                                           </label>
                                                                        <?php } //foreach ?>
                                                                   </div>
                                                               <?php endforeach; ?>
                                                           </div> <!--.contenido-dia -->
                                                       <?php  } ?>
                                                   </div><!--.caja-->
                                             </div> <!--#servicios-->

                                             <div id="resumen" class="resumen ">
                                                 <div class="box-header with-border">
                                                     <h3 class="box-title">Pagos y Extras</h3>
                                                 </div>
                                                 <br>
                                                <div class="caja clearfix row">
                                                      <div class="extras col-md-6">
                                                            <div class="orden">
                                                                <label for="entrada_sagrada">Entrada Sagrada Familia del servicios $10 <small>(promocion 7% dto.)</small></label>
                                                                <input type="number" class="form-control" min="0" id="entrada_sagrada" name="pedido_extra[pedido_sagrada][cantidad]" size="3" placeholder="0">
                                                                <input type="hidden" value="10" name="pedido_extra[pedido_sagrada][precio]">
                                                            </div> <!--.orden-->
                                                            <div class="orden">
                                                                <label for="pedido_guell">Paquete de 10 pedido_guell $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                                                                <input type="number" class="form-control" min="0" id="pedido_guell" name="pedido_extra[pedido_guell][cantidad]" size="3" placeholder="0">
                                                                <input type="hidden" value="2" name="pedido_extra[pedido_guell][precio]">
                                                            </div> <!--.orden-->
                                                            <div class="orden">
                                                                <label for="regalo">Seleccione un regalo</label> <br>
                                                                <select id="regalo" name="regalo" required class="form-control seleccionar">
                                                                    <option value="">- Seleccione un regalo --</option>
                                                                    <option value="2">pedido_guell</option>
                                                                    <option value="1">mapa_bcn</option>
                                                                    <option value="3">wifi</option>
                                                                </select>
                                                            </div><!--.orden-->
                                                            <br>
                                                            <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                                                      </div> <!--.extras-->

                                                      <div class="total col-md-6">
                                                          <p>Resumen:</p>
                                                          <div id="lista-productos">

                                                          </div>
                                                          <p>Total:</p>
                                                          <div id="suma-total">

                                                          </div>
                                                          <input type="hidden" name="total_pedido" id="total_pedido">
                                                          <input type="hidden" name="total_descuento" id="total_descuento" value="total_descuento">
                                                      </div> <!--.total-->
                                                </div><!--.caja-->
                                             </div> <!--#resumen-->
                                    </div>

                              </div>
                              <!-- /.box-body -->

                              <div class="box-footer">
                                  <input type="hidden" name="registro" value="nuevo">
                                  <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
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
  ?>

