<?php

$conn = new mysqli('localhost','root', '', 'sabi');

if($conn->connect_error){
    echo $error -> $conn->connect_error;
}

?>