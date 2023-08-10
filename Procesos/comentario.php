<?php
session_start();
require_once "funciones.php";

$Correo = $_SESSION['Correo'];
$Comentario = $_POST['Opinion'];

$Buzon = buzon($Correo,$Comentario);

if ($Buzon == 1) {
    $response = 1;
} else {
    $response = 2;
}

echo $response;
?>