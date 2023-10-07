<?php
if (isset($_POST['login-admin'])){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        include_once('funciones/funciones.php');
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE usuario = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_usuario, $usuario, $nombre, $apellido, $password_usr, $id_tipo_usuario);
        if($stmt->affected_rows){
            $existe = $stmt->fetch();
            if($existe){
               if(password_verify($password, $password_usr)){
                   session_start();
                   $_SESSION['usuario'] = $usuario;
                   $_SESSION['nombre'] = $nombre;
                   $respuesta = array(
                       'respuesta' => 'exitoso',
                       'usuario' => $nombre
                   );
               } else {
                   $respuesta = array(
                       'respuesta' => 'error' // password incorrecto
                   );
               }
            } else {
                 $respuesta = array(
                    'respuesta' => 'error' //no existe
                );
            }
        }   
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
      echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}
?>