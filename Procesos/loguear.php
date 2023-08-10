<?php
session_start();
require_once "funciones.php";

$L_Correo = $_POST['Correo'];
$L_Contrasena = $_POST['Psw'];

//Funcion para consultar si el correo ya esta registrado
$Loguear = consulta($L_Correo);

if ($Loguear) {
    $Contrasena = $Loguear['contrasena'];

    if ($Contrasena == $L_Contrasena) {
        $_SESSION['Usuario'] = $L_Correo;
        $response = 1;
    } else {
        $response = 2;
    }

} else {
    $response = 2;
}

echo $response;
?>