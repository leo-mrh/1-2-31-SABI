<?php 

include_once('funciones/funciones.php');
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$id_tipo_usuario = $_POST['tipo_usuario'];
$password = $_POST['password'];
$id_registro = $_POST['id_registro'];
//$activo = $_POST['activo'];

//Alta
if ($_POST['registro'] == 'nuevo'){
      $opciones = array(
        'cost' => 12
      );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
            try {
                $stmt = $conn->prepare("INSERT INTO usuario (nombre_usr, nombre, apellido, password, id_tipo_usuario) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssi", $usuario, $nombre, $apellido, $password_hashed,$id_tipo_usuario);
                $stmt->execute();
                $id_registro = $stmt->insert_id;
                if($id_registro > 0) {
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'id_usuario' => $id_registro
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
                $stmt->close();
                $conn->close();
            } catch(Exception $e) {
              echo "Error: " . $e->getMessage();
            }
    die(json_encode($respuesta));
}
// Modificar 
if($_POST['registro'] == 'actualizar'){

    try {
        if(empty($_POST['password']) ) {
            $stmt = $conn->prepare("UPDATE usuario SET nombre_usr = ?, nombre = ?, apellido = ?, id_tipo_usuario WHERE id_usuario = ? ");
            $stmt->bind_param("sssi", $usuario, $nombre, $apellido, $id_tipo_usuario, $id_registro);
        } else {
            $opciones = array(
                'cost' => 12
            );
            
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt = $conn->prepare('UPDATE usuario SET nombre_usr = ?, nombre = ?, apellido = ?, password = ?, id_tipo_usuario WHERE id_usuario = ? ');
            $stmt->bind_param("ssssi", $usuario, $nombre, $apellido, $hash_password, $id_tipo_usuario, $id_registro);
        }

        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $stmt->insert_id
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

//Eliminacion
if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];
    
    try {
        $stmt = $conn->prepare('DELETE FROM usuario WHERE id_usuario = ? ');
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