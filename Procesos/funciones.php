<?php
require_once 'conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*Funcion para consultar a partir del CORREO*/
function consulta($Correo) {

    $conexion= new conexion();
    $query=$conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo');
    $query->bindParam(':correo',$Correo);
    $query->execute();
    $count=$query->rowCount(); //Cuenta si existe el registro

    if ($count == 1) {
        // Si se encontró un registro, devuelve los datos del usuario como un array asociativo
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        // Si no se encontró ningún registro, devuelve false
        return false;
    }
}

/*Funcion para hacer el registro de usuario*/
function registrar($Nombre,$Correo,$Contrasena) {
    $conexion = new conexion();
    $Insert = $conexion->prepare('INSERT INTO usuarios(nombre, correo, contrasena) VALUES (:nombre, :correo, :contrasena)');
    $Insert->bindParam(':nombre',$Nombre);
    $Insert->bindParam(':correo',$Correo);
    $Insert->bindParam(':contrasena',$Contrasena);
    $Insert->execute();

    if ($Insert) {
        return 1;
    } else {
        return false;
    }
}


/*Funcion para hacer el registro de comentarios*/
function buzon($Correo,$Texto) {
    $conexion = new conexion();
    $Guardar = $conexion->prepare('INSERT INTO buzon(correo, comentario) VALUES (:correo, :comentario)');
    $Guardar->bindParam(':correo',$Correo);
    $Guardar->bindParam(':comentario',$Texto);
    $Guardar->execute();

    if ($Guardar) {
        return 1;
    } else {
        return false;
    }
}

/*Funcion para actualizar contraseña*/
function actualizar($Correo,$Contrasena) {

    $conexion= new conexion();
    $Actualizar=$conexion->prepare('UPDATE usuarios SET contrasena = :contrasena WHERE correo = :correo');
    $Actualizar->bindParam(':contrasena',$Contrasena);
    $Actualizar->bindParam(':correo',$Correo);
    $Actualizar->execute();

    if ($Actualizar) {
        return 1;
    } else {
        return false;
    }
}

/*Funcion para Enviar Correo*/
function enviarCorreo($Destinatario){
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $Codigo = rand(100000, 999999);

    $mail = new PHPMailer(true);
    $mail->SMTPOptions = array(
        'ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>true
    ));

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'programacionprofesional7@gmail.com';
    $mail->Password   = 'irfrtmkvkzaowozw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('programacionprofesional7@gmail.com', 'shopCannabis');
    $mail->addAddress($Destinatario);

    $mail->isHTML(true);
    $mail->Subject = "Nuevo Mensaje";
    $mail->Body = '<b>Tu codigo de Confirmacion es: </b>' . $Codigo;
    $mail->send();

    return $Codigo;
}
?>