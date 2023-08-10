<?php
session_start();
require_once "funciones.php";

$C_Nombre = $_POST['Nombre'];
$C_Correo = $_POST['Correo'];
$C_Contrasena = $_POST['Psw'];

//Funcion para consultar si el correo ya esta registrado
$Crear = consulta($C_Correo);

if ($Crear) {
    $response = 2;
} else {
    $Registrar = registrar($C_Nombre,$C_Correo,$C_Contrasena);

    if ($Registrar == 1) {
        $_SESSION['Usuario'] = $C_Correo;
        $response = 1;
    } else {
        $response = 3;
    }
}

echo $response;
?>