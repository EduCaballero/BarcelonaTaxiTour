<?php
include_once 'funciones/funciones.php';

$nombre = $_POST['nombre_taxi'];
$apellido = $_POST['apellido_taxi'];
$biografia = $_POST['biografia_taxi'];

$id_registro = $_POST['id_registro'];

if($_POST['registro'] == 'nuevo'){
    /*
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta));
    */

    $directorio = "../img/taxis/";

    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        $stmt = $conn->prepare('INSERT INTO taxis (nombre_taxi, apellido_taxi, descripcion, url_imagen, editado) VALUES (?, ?, ?, ?, now()) ');
        $stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url );
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_imagen' => $imagen_resultado
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

    $directorio = "../img/taxis/";

    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        if($_FILES['archivo_imagen']['size'] > 0 ) {

            // con imagen
            $stmt = $conn->prepare('UPDATE taxis SET nombre_taxi = ?, apellido_taxi = ?, descripcion = ?, url_imagen = ? WHERE taxi_id = ? ');
            $stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url,  $id_registro);

        } else {
            // sin imagen
            $stmt = $conn->prepare('UPDATE taxis SET nombre_taxi = ?, apellido_taxi = ?, descripcion = ? WHERE taxi_id = ? ');
            $stmt->bind_param("sssi", $nombre, $apellido, $biografia,  $id_registro);
        }
        $estado = $stmt->execute();

        if($estado == true) {
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
        $stmt = $conn->prepare('DELETE FROM taxis WHERE taxi_id = ? ');
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

