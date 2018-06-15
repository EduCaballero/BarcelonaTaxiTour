<?php
include_once 'funciones/funciones.php';

$titulo = $_POST['titulo_servicios'];
$categoria_id = $_POST['categoria_servicio'];
$taxi_id = $_POST['taxi'];
// obtener la fecha
$fecha = $_POST['fecha_servicio'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));

// hora
$hora = $_POST['hora_servicio'];
$hora_formateada = date('H:i', strtotime($hora));

$id_registro = $_POST['id_registro'];
$clave = "";


if($_POST['registro'] == 'nuevo'){
    try {
        $stmt = $conn->prepare('INSERT INTO servicios (nombre_servicio, fecha_servicio, hora_servicio, id_cat_servicio, id_taxi, clave, editado) VALUES ( ?, ?, ?, ? , ?, ?, now() )  ');
        $stmt->bind_param('sssiis', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $taxi_id, $clave);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows) {
          $clave = ((string)$categoria_id) . "_" . ((string)$id_insertado);//TODO - optimizar esta ñapa
          $stmt2 = $conn->prepare('UPDATE servicios SET clave = ? WHERE servicio_id = ? ');
          $stmt2->bind_param('si', $clave, $id_insertado);
          $stmt2->execute();
          $stmt2->close();
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
        $stmt = $conn->prepare('UPDATE servicios SET nombre_servicio = ?, fecha_servicio = ?, hora_servicio = ?, id_cat_servicio = ?, id_taxi = ?, editado = NOW() WHERE servicio_id = ? ');
        $stmt->bind_param('sssiii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $taxi_id, $id_registro );
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
        $stmt = $conn->prepare('DELETE FROM servicios WHERE servicio_id = ? ');
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


















