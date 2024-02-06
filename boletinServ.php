<?php
include 'z_serv.php';

$email = $_POST['correo'];

$consulta= "INSERT INTO boletin(correo) VALUES ('$email')";
$ejecuta2= mysqli_query($conect,$consulta);

if(!$ejecuta2){
    echo "Error.";
}else{
    echo '<script> alert("Gracias por suscribirse a uHomeStore, serás informado cada que se añada un bien nuevo."); </script>';
    echo '<script> window.location="index.php"; </script>';
}
?>