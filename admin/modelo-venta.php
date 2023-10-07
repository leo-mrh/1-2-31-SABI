<?php 

include_once('funciones/funciones.php');

// obtener la fecha
$fecha = $_POST['fecha'];
$fecha_formateada = date('Y-m-d', strtotime($fecha));

// obtener la hora
$hora = $_POST['hora'];
$hora_formateada = date('H:i', strtotime($hora));

$subtotal = $_POST['subtotal'];
$total = $_POST['total'];
$id_clientes = $_POST['nombre'];

$id_registro = $_POST['id_registro'];

//$activo = $_POST['activo'];

if($_POST['registro'] == 'nuevo'){
    $opciones = array(
        'cost' => 12
    );

//Insert
try {
    $stmt = $conn->prepare("INSERT INTO venta (fecha, hora, subtotal, total, id_clientes) VALUES (?, ?, ?, ?, ?) ");
    $stmt->bind_param("ssssi", $fecha_formateada, $hora_formateada, $subtotal, $total, $id_clientes);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_clientes' => $id_registro,
            header("Location: lista-venta.php")
            
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
        $stmt = $conn->prepare('UPDATE venta SET fecha = ?, hora = ?, subtotal = ?, total = ?, id_clientes = ? WHERE id_venta = ? ');
        $stmt->bind_param("ssssii", $fecha_formateada, $hora_formateada, $subtotal, $total, $id_clientes, $id_registro);
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
        $stmt = $conn->prepare('DELETE FROM venta WHERE id_venta = ? ');
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