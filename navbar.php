<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style type="text/css">
    .row{
        height: auto;
    }
    .navbar{
        background-color: #39AE02!important;
        color: white!important;
    }
    .navbar-brand, .nav-link{
        color: white!important;
    }
    .navbar-toggler{
        color: white!important;
        border: var(--bs-border-width) solid white;
    }
    .navdark{
        /* display:inline-block;width:1.5em;height:1.5em;vertical-align:middle;background-repeat:no-repeat;background-position:center;background-size:100%;
        background-image: url('img/navbar-icon-toggler.png')!important; */
        background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")!important;
    }
    .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0; /* remove the gap so it doesn't close */
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="img/towie.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      shopCannabis</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon navdark"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <div class="dropdown" id="option1">
            <a class="nav-link active dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#">
              <i class="bi bi-star-fill" style="font-size: 2rem; color: white;"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="login.php#recuperar">Recuperar</a></li>
              <li><a class="dropdown-item" href="login.php#registro">Registro</a></li>
              <li><a class="dropdown-item" href="login.php">Acceder</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown" id="option2">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#">
              <i class="bi bi-plus-circle" style="font-size: 2rem; color: white;"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php#Buzon">Buzón</a></li>
              <li><a class="dropdown-item" href="index.php#FAQ">Ayuda</a></li>
              <li><a class="dropdown-item" href="index.php#Contacto">Contacto</a></li>
              <li><a class="dropdown-item" href="index.php#Mapa">Mapa</a></li>
              <li><a class="dropdown-item" href="chatbot.php">Chat</a></li>
            </ul>
          </div>
        </li>
      </ul>
      <form class="d-flex" role="search" method="post" action="">
       
      </form>
      <div class="ms-1" id="acceder">
        <a href="login.php" class="btn btn-outline-warning">Acceder</a>
      </div>
      <div class="ms-1" id="inicio">
        <a href="index.php" class="btn btn-outline-warning">Volver</a>
      </div>
    </div>
  </div>
</nav>