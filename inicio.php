<?php
session_start();
require_once "Procesos/funciones.php";
$Usuario = $_SESSION['Usuario'];
$Datos = Consulta($Usuario);

if (empty($_SESSION['Usuario'])) {
    echo "<script>
        window.location.href = 'login.php';
    </script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['exit'])) {
        session_destroy();
        echo "<script>
            window.location.href = 'login.php';
        </script>";
    } else {
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey = '6LdaODQmAAAAANwgfEpuL2XmO4PjYsI_mvm9kirg';
        $libro = $_POST['pdflibro'];

        // Verificar el reCAPTCHA
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}");
        $responseData = json_decode($response);

        if ($responseData->success) {
            // Ruta del archivo PDF a descargar
            $rutaArchivo = $libro;

            // Verificar si el archivo existe
            if (file_exists($rutaArchivo)) {
                // Configuración de la descarga
                header('Content-Description: File Transfer');
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . basename($rutaArchivo) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($rutaArchivo));
                readfile($rutaArchivo);
                exit;
            } else {
                echo '<script>
                    alert("Archivo no Encontrado, Solucionaremos el problema")
                </script>';
            }
        } else {
            echo '<script>
                alert("Error de Captcha: No se valido el captcha")</script>
            </script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>shopCanabis</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
        rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    $Username = null;
    if (!empty($_SESSION["Username"])) {
        $Username = $_SESSION["Username"];
    }
    ?>
</head>

<body>
    <div class="brand">ShopCanabis</div>
    <div class="address-bar"><strong>Directo</strong> y a la Puerta de tu Casa</div>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ShopCanabis</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="bestseller.php">Productos más Populares</a></li>
                    <li><a href="shop.php">Tienda</a></li>
                    <li><a href="about.php">Nosotros</a></li>
                    <li><a href="#" onclick="ManagementOnclick();">Administrador</a></li>

                    <?php if ($Username == null) {
                        echo '<li><a href="register.php?ActionType=Register">Registrarse para Pedidos</a></li>';
                    } ?>
                    <?php if ($Username == null) {
                        echo '<li><a href="Login.php?Role=User">Ingresar</a></li>';
                    } else {
                        echo '<li><a href="Logout.php">Logout</a></li>';
                    } ?>
                    <br> <br>
                   

                    <div align="center">
                        <form method="post" action="">
                        <button type="submit" name="exit" value="exit" class="btn btn-success">Logout</button>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/mota5.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/mota2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/mota3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/mota4.jpg" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "smss_db");
        $sql = "SELECT * FROM `tbl_products` Limit 10";
        $Resulta = mysqli_query($conn, $sql);
        ?>


        <?php while ($Rows = mysqli_fetch_array($Resulta)) {
            echo '	
		<div class="col-sm-4 col-lg-4 col-md-4">
             <div class="thumbnail">
				<h4 style="text-align: center;">' . $Rows[2] . '</h4>
                <img style="border: 2px solid gray; border-radius: 10px; height: 229px; width: 298px;" src="data:image;base64,' . $Rows[8] . '" alt="">
                <div class="caption">
					<p><strong>Nombre del Producto:</strong> ' . $Rows[1] . '</p>
					<p><strong>Dimensiones:</strong> ' . $Rows[3] . '</p>
					<p><strong>Colores Disponibles:</strong> ' . $Rows[4] . '</p>
					<p><strong>$ ' . $Rows[5] . '.00</strong></p>
                </div>
				<center><a onclick="addToCartOnclick(' . $Rows[0] . ');" href="#"  style="margin-bottom: 5px;" class="btn btn-primary">Agregar al Carrito</a></center>
            </div>
        </div>
		';
        } ?>

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>
                        <?php echo '<strong>' . $Username . '</strong>'; ?>
                        <br>
                        <strong>
                            <?php if ($Username != null) {
                                echo '<a href="ManageAccount.php?Role=User">Manage Account</a> |';
                            } ?>
                            <?php if ($Username == null) {
                                echo '<a href="Login.php?Role=User">Ingresar</a>';
                            } else {
                                echo '<a href="Logout.php">Logout</a>';
                            } ?>
                            |
                            <a href="#">Volver al inicio</a>
                        </strong><br>
                        ShopCanabis &copy; ShopCanabis
                    </p>

                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })

        $('#reg').click(function () {
            window.open('register.html', _self);
        });

        function ManagementOnclick() {
            if (confirm("Solo los administradores tienen permitido acceder a esta página. Inicie sesión como administrador.") == true) {
                window.open("Login.php?Role=Admin", "_self", null, true);
            }
        }

        function addToCartOnclick(ProductID) {
            if (confirm("Estas seguro que deseas agregar este producto al carrito") == true) {
                window.open("Order.php?ProductID=" + ProductID, "_self", null, true);
            }
        }
    </script>

</body>

</html>