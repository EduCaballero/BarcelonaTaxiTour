<?php
include_once 'funciones/funciones.php';

$nombre_categoria = $_POST['nombre_categoria'];
$icono = $_POST['icono'];
$date = date('Y-m-d H:i:s');

$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    try {
        $stmt = $conn->prepare('INSERT INTO categoria_servicio (cat_servicio, icono, actualizado) VALUES (?, ?, ?) ');
        $stmt->bind_param("sss", $nombre_categoria, $icono, $date);
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
        $stmt = $conn->prepare('UPDATE categoria_servicio SET cat_servicio = ?, icono = ?, actualizado = NOW() WHERE id_categoria = ? ');
        $stmt->bind_param('ssi', $nombre_categoria, $icono, $id_registro );
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
        $stmt = $conn->prepare('DELETE FROM categoria_servicio WHERE id_categoria = ? ');
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

