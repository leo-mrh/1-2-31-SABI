<?php 

include_once('funciones/funciones.php');

$codigo = $_POST['codigo'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$id_tipo_producto = $_POST['descripcion'];
$id_registro = $_POST['id_registro'];

//$activo = $_POST['activo'];

if($_POST['registro'] == 'nuevo'){
    $opciones = array(
        'cost' => 12
    );

//Insert
try {
    $stmt = $conn->prepare("INSERT INTO producto (codigo, nombre, precio_venta, stock, id_tipo_producto) VALUES (?, ?, ?, ?, ?) ");
    $stmt->bind_param("ssssi", $codigo, $producto, $precio, $cantidad, $id_tipo_producto);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_registro,
            header("Location: lista-productos.php")
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
        $stmt = $conn->prepare('UPDATE producto SET codigo = ?, nombre = ?, precio_venta = ?, stock = ?, id_tipo_producto = ? WHERE id_producto = ? ');
        $stmt->bind_param('ssssii', $codigo, $producto, $precio, $cantidad, $id_tipo_producto, $id_registro);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_registro
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
        $stmt = $conn->prepare('DELETE FROM producto WHERE id_producto = ? ');
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