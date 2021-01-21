<?php
  session_start();

  if(isset($_SESSION["Usuario"]) and isset($_SESSION["Contrasenia"])){
  }else{
    header("location:../../Administrador/IngresoAdministrador.html");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Administra los datos de los alumnos">
    <meta name="author" content="Garcia Tello Axel">
    <title>Administrador</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
<link href="../css/Bootstrap/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/MenuAdministrador.js">
    </script>
  </head>
  <body onload="Alumnos()">

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ESCOM</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="CerrarSesion.php">Cerrar sesi&oacute;n</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" onclick="Alumnos()" id="alumnos">
              <span data-feather="users"></span>
              Alumnos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="Calificar()" id="calificar">
              <span data-feather="file"></span>
              Calificar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="Reportes()" id="reportes">
              <span data-feather="bar-chart-2"></span>
              Reportes gr&aacute;ficos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="Horarios()" id="horarios">
              <span data-feather="calendar"></span>
              Horarios y grupos
            </a>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <span id="pantalla">
      </span>
    </main>
  </div>
</div>


    <script src="../js/Bootstrap/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="../js/dashboard.js"></script>
  </body>
</html>
