<?php
if (isset($_POST['login-admin'])){

    $nombre_usr = $_POST['usuario'];
    $password = $_POST['password'];

    try {
        include_once('funciones/funciones.php');
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE nombre_usr = ?;");
        $stmt->bind_param("s", $nombre_usr);
        $stmt->execute();
        $stmt->bind_result($id_usuario, $nombre_usr, $nombre, $apellido, $password, $id_tipo_usuario);
        if($stmt->affected_rows){
            $existe = $stmt->fetch();
            if($existe){
               if(password_verify($password, $password)){
                   session_start();
                   $_SESSION['usuario'] = $nombre_usr;
                   $_SESSION['nombre'] = $nombre;
                   $respuesta = array(
                       'respuesta' => 'exitoso',
                       'usuario' => $nombre_usr
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