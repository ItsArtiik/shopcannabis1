<?php
session_start();

$codigoRecibido = $_SESSION['CodigoRecibido'];
$codigoIngresado = $_POST['Codigo'];

if ($codigoRecibido == $codigoIngresado) {
    $response = 1;
} else {
    $response = 2;
}

echo $response;
?>