<?php 
$password = $_POST['password'];
  $opciones = array(
        'cost' => 12
      );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        echo $password_hashed;
?>