<?php session_start();?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/towie.png" alt="favicon">
    <title>shopCannabis</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style type="text/css">
        #acceder{
            display: none;
        }.elementosearch{
            display: none;
        }
    </style>
    
    <?php
		$Username = null;
		$Role = $_GET["Role"];
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>
<body class="bg-main">

<div class="view-main view-main-image">

    <div class="container" align="center">
        <h1 class="color-title mb-4"><b>shopCannabis</b></h1>

        <!--Fomulario de Inicio de Sesion-->
        <form method="post" action="" class="loginForm L-R L-C" id="loginForm">
            <h4 class="color-aditional mb-3"><b>Iniciar Sesión</b></h4>
            <!--Campos del formulario-->
            <input type="e-mail" name="L-Correo" id="L-Correo" class="campo" placeholder="Ingresa tu Correo" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required title="Ingresa una dirección de correo electrónico válida">
            <input type="password" name="L-Contrasena" id="L-Contrasena" class="campo" placeholder="Ingresa tu Contraseña" required>
            <!--Boton para Ejecutar-->
            <div class="mt-3">
                <button type="sumbit" class="boton">Iniciar Sesion</button>
            </div>
            <!--Opcion para cambiar a formulario de Login-->
            <div class="mt-3 change-view">
                ¿Aun no tienes una cuenta? <b class="change_L-C">Crear una Cuenta</b><br>
                ¿Olvidate tu Contraseña? <b class="change_L-R" id="ancla-b">Recuperar Contraseña</b>
            </div>
        </form>

        <!--Fomulario de Recuperar Contraseña-->
        <div class="recuperarForm L-R">
            <div class="row">
                <div class="col-6">
                    <h4 class="color-aditional mb-3"><b>Recuperar Contraseña</b></h4>
                </div>
                <div class="col-6 change-view">
                    <ion-icon name="close" class="change_L-R h3"></ion-icon>
                </div>
            </div>
            <!--Campos del formulario-->
            <form method="post" action="" id="recuperarForm">
                <input type="e-mail" name="R-Correo" id="R-Correo" class="campo" placeholder="Ingresa tu Correo" autocomplete="off" pattern="[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$" required title="Ingresa una dirección de correo electrónico válida">
                <!--Boton para Ejecutar-->
                <div class="mt-3">
                    <button type="sumbit" class="boton">Recuperar</button>
                </div>
            </form>
        </div>

        <!--Fomulario de Registro-->
        <form method="post" action="" class="registroForm L-C" id="registroForm">
            <h4 class="color-aditional mb-3"><b>Crear Cuenta</b></h4>
            <!--Campos del formulario-->
            <input type="text" name="C-Nombre" id="C-Nombre" class="campo" placeholder="Ingresa tu Nombre" autocomplete="off" required>
            <input type="e-mail" name="C-Correo" id="C-Correo" class="campo" placeholder="Ingresa tu Correo" autocomplete="off" pattern="[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$" required title="Ingresa una dirección de correo electrónico válida">
            <input type="password" name="C-Contrasena" id="C-Contrasena" class="campo" placeholder="Ingresa tu Contraseña" required oninput="vc()">
            <input type="password" name="C-RContrasena" id="C-RContrasena" class="campo" placeholder="Repite la Contraseña" required oninput="validarCoincidencia()">
            <br>
            <i id="error"></i>
            <!--Boton para Ejecutar-->
            <div class="mt-3">
                <button type="sumbit" class="boton" id="Crear" disabled>Crear Cuenta</button>
            </div>
            <!--Opcion para cambiar a formulario de Login-->
            <div class="mt-3 change-view">
                ¿Ya tienes una cuenta? <b class="change_L-C">Iniciar Sesión</b>
            </div>
        </form>

    </div>

    <div class="container">

        <div class="row">
            <div class="box">
			
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Ingresar Administrador</h2>
                    <hr>
                </div>

                <div class="col-md-6">
                 <form role="form" action="LoginDestination.php?Role=<?php echo $Role; ?>" method="POST">
				 
					<div class="form-group">
					  <label for="Username">Usuario:</label>
					  <input type="text" name="Username" class="form-control" id="Username" placeholder="Ingrese su usuario" required>
					</div>
					
					<div class="form-group">
					  <label for="Password">Contraseña:</label>
					  <input type="password" name="Password" class="form-control" id="Password" placeholder="Ingrese su contraseña" required>
					</div>
					
					<button type="submit" class="btn btn-success">Enviar</button>
					
				  </form>
                </div>
             
            </div>
        </div>

    </div>

</div>

<script src="js/script.js"></script>

<script type="text/javascript">
    /*Cambiar Formulario de Login a Registro y vicebersa*/
    $('.change-view .change_L-C').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
    /*Cambiar Formulario de Login a Recuperar y vicebersa*/
    $('.change-view .change_L-R').click(function(){
        $('.L-R').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    function vc() {
        var pass1 = document.getElementById("C-Contrasena").value;
        var pass2 = document.getElementById("C-RContrasena").value;

        if (pass1 !== pass2) {
            document.getElementById("Crear").disabled = true;
            document.getElementById("error").innerHTML = "Las contraseñas deben coincidir";
        } else {
            document.getElementById("Crear").disabled = false;
            document.getElementById("error").innerHTML = "";
        }   
    }

    function validarCoincidencia() {
        var password1 = document.getElementById("C-Contrasena").value;
        var password2 = document.getElementById("C-RContrasena").value;

        if (password1 !== password2) {
            document.getElementById("error").innerHTML = "Las contraseñas deben coincidir";
            document.getElementById("Crear").disabled = true;
        } else {
            document.getElementById("error").innerHTML = "";
            document.getElementById("Crear").disabled = false;
        }
    }

    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto

            var Correo = $('#L-Correo').val();
            var Contrasena = $('#L-Contrasena').val();

            // Realizar la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'Procesos/loguear.php', // Archivo PHP para procesar los datos en el servidor
                data: { Psw: Contrasena, Correo: Correo }, // Se envia el dato
                success: function(response) {
                    // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        window.location.href = "inicio.php";
                    } else if (response == 2) {
                        mensajeError("Acceso Denegado", "El correo/contraseña es incorrecto");
                    } else {
                        mensajeError("Error en el Proceso", "Intente nuevamente");
                    }
                }
            });
        });

        $('#registroForm').submit(function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto

            var Nombre = $('#C-Nombre').val();
            var Correo = $('#C-Correo').val();
            var Contrasena = $('#C-Contrasena').val();

            // Realizar la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'Procesos/registrar.php', // Archivo PHP para procesar los datos en el servidor
                data: { Correo: Correo, Psw: Contrasena, Nombre: Nombre }, // Se envia el dato
                success: function(response) {
                    // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        window.location.href = "inicio.php";
                    } else if (response == 2) {
                        campoInvalido("Correo Invalido", "El correo ya esta registrado");
                    } else {
                        mensajeError("Error en el Proceso", "Intente nuevamente");
                    }
                }
            });
        });

        $('#recuperarForm').submit(function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto

            var Correo = $('#R-Correo').val();

            // Realizar la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'Procesos/recuperar.php', // Archivo PHP para procesar los datos en el servidor
                data: { Correo: Correo}, // Se envia el dato
                success: function(response) {
                    // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        window.location.href = "cambiar_contrasena.php";
                    } else if (response == 2) {
                        mensajeError("Correo Invalido", "El correo no esta registrado");
                    }
                }
            });
        });
    });
</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var hash = window.location.hash;
        if (hash === '#registro') {
            // Mostrar el formulario de registroForm
            $('.registroForm').show();
            $('.loginForm').hide();
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var hash = window.location.hash;
        if (hash === '#recuperar') {
            // Mostrar el formulario de registroForm
            $('.recuperarForm').show();
            $('.loginForm').hide();
        }
    });
</script>

    <!-- JS Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <!--Libreria de Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>