<?php
session_start();
require_once "funciones.php";

$Correo = $_SESSION['Correo'];
$Contrasena = $_POST['Psw'];

$Actualizar = actualizar($Correo,$Contrasena);

if ($Actualizar == 1) {
    $response = 1;
    session_destroy();
} else {
    $response = 2;
}

echo $response;
?>