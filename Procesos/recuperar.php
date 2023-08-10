<?php 
session_start();
require_once "funciones.php";

$R_Correo = $_POST['Correo'];

//Funcion para consultar si el correo ya esta registrado
$Recuperar = consulta($R_Correo);

if ($Recuperar) {
    $EnviarCorreo = enviarCorreo($R_Correo);
    $_SESSION['Correo'] = $R_Correo;
    $_SESSION['CodigoRecibido'] = $EnviarCorreo;
    $response = 1;
} else {
	$response = 2;
}

echo $response;
?>