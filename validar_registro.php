<!--<pre> para debug
  <?php //var_dump($_POST); ?>
</pre>-->
<?php
if (isset($_POST['submit'])):
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $fecha = date('Y-m-d H:i:s');
  // Pedidos
  $pases = $_POST['pases'];
  $entrada_sagrada = $_POST['pedido_sagrada'];
  $entrada_guell = $_POST['pedido_guell'];
  include_once 'includes/funciones/funciones.php';
  $pedido = productos_json($pases, $entrada_sagrada, $entrada_guell);
  $eventos = $_POST['registro'];//esto son las rutas actualmente, pero al ser ampliable y no ser sólo servicios lo dejo como eventos
  $registro = eventos_json($eventos);
  $pagado = 0;

  try {
    require_once('includes/funciones/bd_conexion.php');
    //$conn = mysqli_connect('localhost', 'root', '', 'taxi_tour');
    //al utilizar los statement de MySQLI, en lugar de enviarlo como una consulta normal, se previenen ataques de sql injection
    $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, servicios_registrados, regalo, total_pagado, pagado) VALUES (?,?,?,?,?,?,?,?,?)");
    //ssssssis -> string,...int, string
    $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total, $pagado);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    //$result = mysqli_query($conn, "INSERT registrados VALUES(null, 'a', 'a', 'a', 'a', 'a', 'a', 1, 'a')");
    //esto siempre antes de que se mande cualquier cosa al navegador o no funciona
    header('Location: validar_registro.php?correcto=1');//con esto hago que, si recargo la página, no se inserten en la BBDD varias veces.
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
  ?>
<?php endif; ?>
<?php include_once 'includes/templates/header.php'; ?>
<section class="seccion contenedor">
  <h2>Resumen Registro</h2>
  <?php if (isset($_GET['correcto'])):
    if ($_GET['correcto'] == "1"):
      echo "Registro correcto"; // TODO cambiar a algo más bonito
    endif;
  endif; ?>
</section>
<?php include_once 'includes/templates/footer.php'; ?>
