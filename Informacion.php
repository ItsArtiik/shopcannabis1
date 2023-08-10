<?php
    session_start();

    if (!empty($_SESSION['Usuario'])) {
        echo "<script>
            window.location.href = 'inicio.php';
        </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/towie.png" alt="favicon">
	<title>shopCannabis</title>
	<!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .img{
            height: 150px;
            width: 150px;
        }

        .seccion{
            padding: 110px 40px 110px 40px;
        }.elementosearch{
            display: none;
        }#acceder{
            display: none;
        }
    </style>
</head>
<body class="bg-main">
    <?php include('navbar.php'); ?>
    <div class="p-5" align="center">
        
        <div class="m-3 rounded bg-info-subtle seccion" id="mision">
            <h4 class="mb-3">Misión</h4>
            <div class="line"></div>
            <p>"Promover la imaginación, el pensamiento crítico y la pasión por la lectura a través de la exploración del mundo de la literatura fantástica. Nuestra misión es transportar a los lectores a universos mágicos, estimular su creatividad y abrir sus mentes a nuevas posibilidades. Buscamos fomentar el amor por la lectura, cultivar la fantasía y enriquecer la vida de las personas a través de la magia de los libros fantásticos."</p>
            <img src="https://cdn-icons-png.flaticon.com/128/2856/2856325.png" class="img">
        </div>
        
        <div class="m-2 rounded bg-success-subtle seccion" id="vision">
            <h4 class="mb-3">Visión</h4>
            <div class="line"></div>
            <p>"Nuestra visión es crear una plataforma de lectura de libros fantásticos que transporte a los lectores a mundos imaginarios llenos de magia, aventura y emocionantes historias. Queremos fomentar el amor por la lectura y despertar la imaginación de las personas, ofreciendo una amplia selección de libros de género fantástico de diferentes autores y estilos.</p>
            <img src="https://cdn-icons-png.flaticon.com/128/921/921490.png" class="img">
        </div>
        
        <div class="m-2 rounded bg-danger-subtle seccion" id="objetivos" style="padding-top: 110px; padding-bottom: 110px;">
            <h4 class="mb-3">Objetivos</h4>
            <div class="line"></div>
            <p>Nuestro objetivo es convertirnos en el destino preferido de los amantes de la literatura fantástica, brindando una experiencia única y envolvente. Queremos proporcionar un espacio donde los lectores puedan descubrir nuevas obras, conectarse con otros aficionados, intercambiar opiniones y explorar los límites de la imaginación a través de la lectura.</p>
            <img src="https://cdn-icons-png.flaticon.com/128/3050/3050488.png" class="img">
        </div>
        
        <div class="m-2 rounded bg-warning-subtle seccion" id="compromiso" style="padding-top: 110px; padding-bottom: 110px;">
            <h4 class="mb-3">Compromiso</h4>
            <div class="line"></div>
            <p>Nos esforzamos por ofrecer una plataforma fácil de usar, accesible desde cualquier dispositivo, que ofrezca una biblioteca digital diversa y actualizada constantemente con nuevos lanzamientos y clásicos del género. Además, nos comprometemos a promover a autores emergentes y darles la oportunidad de dar a conocer sus obras a una audiencia apasionada.</p>
            <img src="https://cdn-icons-png.flaticon.com/128/6799/6799863.png" class="img">
        </div>
        
    </div>
    
    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <!--Libreria de Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>