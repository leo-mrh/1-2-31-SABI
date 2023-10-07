<?php 

include_once('funciones/funciones.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$cp = $_POST['cp'];
$id_mun = $_POST['municipio'];
$id_edo = $_POST['estado'];
$id_registro = $_POST['id_registro'];
echo $nombre;
//$activo = $_POST['activo'];

if($_POST['registro'] == 'nuevo'){
    $opciones = array(
        'cost' => 12
    );

//Insert
try {
    $stmt = $conn->prepare("INSERT INTO clientes (nombre, apellido, telefono, email, direccion, cp, id_edo, id_mun) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
    $stmt->bind_param("ssssssii", $nombre, $apellido, $telefono, $email, $direccion, $cp, $id_mun, $id_edo);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_clientes' => $id_registro,
            header("Location: lista-clientes.php")
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

//Update
if($_POST['registro'] == 'actualizar'){
    $opciones = array(
        'cost' => 12
    );
    
    try {
        $stmt = $conn->prepare('UPDATE clientes SET nombre = ?, apellido = ?, telefono = ?, email = ?, direccion = ?, cp = ?, id_edo = ?, id_mun = ? WHERE id_clientes = ? ');
        $stmt->bind_param('ssssssiii', $nombre, $apellido, $telefono, $email, $direccion, $cp, $id_edo, $id_mun, $id_registro);
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

//Delete
if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    
    try {
        $stmt = $conn->prepare('DELETE FROM clientes WHERE id_clientes = ? ');
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


?>