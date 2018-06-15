<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
// pases
$pases_adquiridos = $_POST[pases];
// pedido_sagrada y pedido_guell
$pedido_sagrada = $_POST['pedido_extra']['pedido_sagrada']['cantidad'];
$pedido_guell = $_POST['pedido_extra']['pedido_guell']['cantidad'];

$pedido = productos_json($pases_adquiridos, $pedido_sagrada, $pedido_guell);

$total = $_POST['total_pedido'];
$regalo = $_POST['regalo'];

$servicios = $_POST['registro_servicios'];
$registro_servicios = servicios_json($servicios);

$fecha_registro = $_POST['fecha_registro'];
$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){


    try {
        $stmt = $conn->prepare('INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, servicios_registrados, regalo, total_pagado, pagado ) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1 ) ');
        $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_servicios, $regalo, $total);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));

}

if($_POST['registro'] == 'actualizar'){

    try {
        $stmt = $conn->prepare('UPDATE registrados SET nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, servicios_registrados = ?, regalo = ?, total_pagado = ?, pagado = 1 WHERE ID_Registrado = ? ');
        $stmt->bind_param('ssssssisi', $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_servicios, $regalo, $total, $id_registro );
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));

}

if($_POST['registro'] == 'eliminar'){


    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM registrados WHERE ID_Registrado = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

