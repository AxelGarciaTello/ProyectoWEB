<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Creación de un nuevo horario">
    <meta name="author" content="García Tello Axel">
    <title>Nuevo Horario</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



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
    <link href="../css/form-validation.css" rel="stylesheet">
    <script type="text/javascript" src="../js/ValidarHorario.js">
    </script>
    <script type="text/javascript">
      function EditarHorario(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "correcto"){
							document.getElementById("mensaje").innerHTML =
							"<div class=\"alert alert-success\" role=\"alert\">La informaci&oacute;n se a guardado correctamente</div>";
						}
						else if(this.responseText == "error"){
							document.getElementById("mensaje").innerHTML =
							"<div class=\"alert alert-warning\" role=\"alert\">La informaci&oacute;n no se pudo guardar</div>";
						}
            else{
              document.getElementById("mensaje").innerHTML =
							"<div class=\"alert alert-danger\" role=\"alert\">El horario fue creado previamente con el ID "+this.responseText+"</div>";
            }
          }
        };
        var idhorario = document.getElementById("idhorario").value;
        var grupo = document.getElementById("grupo").value;
        var fecha = document.getElementById("fecha").value;
        var hora = document.getElementById("hora").value;
        var minuto = document.getElementById("minuto").value;
        var disponibilidad = document.getElementById("disponibilidad").value;
        var mensaje;
        mensaje = "idhorario=" + idhorario;
        mensaje += "&grupo=" + grupo;
        mensaje += "&fecha=" + fecha;
        mensaje += "&hora=" + hora;
        mensaje += "&minuto=" + minuto;
        mensaje += "&disponibilidad=" + disponibilidad;
        xmlhttp.open("GET", "EditarHorario.php?"+mensaje, true);
        xmlhttp.send();
      }
    </script>
  </head>
  <body class="bg-light">

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Registra un nuevo horario</h2>
    </div>

    <div class="row g-3">
      <div class="col-md-7 col-lg-12">
        <h4 class="mb-3">Informaci&oacute;n del horario</h4>
        <!--<form class="needs-validation" novalidate>-->
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="grupo" class="form-label">Grupo</label>
              <select class="form-select" id="grupo" required>
                <option value="">Seleccione una opci&oacute;n</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
              </select>
              <div class="invalid-feedback">
                Se requiere un grupo v&aacute;lido.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="fecha" class="form-label">Fecha del examen</label>
              <input type="date" class="form-control" id="fecha" oninput="validarFecha(this)" required>
              <div class="invalid-feedback">
                Se requiere una fecha v&aacute;lida.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="hora" class="form-label">Hora</label>
              <input type="text" class="form-control" id="hora" min="7" max="21" oninput="validarHora(this)" required>
              <div class="invalid-feedback">
                Se requiere una hora v&aacute;lida.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="minuto" class="form-label">Minuto</label>
              <input type="text" class="form-control" id="minuto" min="0" max="59" oninput="validarMinuto(this)" required>
              <div class="invalid-feedback">
                Se requiere un minuto v&aacute;lido.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="disponibilidad" class="form-label">Disponibilidad</label>
              <input type="text" class="form-control" id="disponibilidad" value="25" oninput="validarDisponibilidad(this)" required>
              <div class="invalid-feedback">
                Se requiere un valor v&aacute;lido.
              </div>
            </div>

          <hr class="my-4">
          <span id="mensaje">
          </span>
          <span style="display: none"><input type="text" id="idhorario"></span>
          <button class="w-100 btn btn-primary btn-lg" onclick="EditarHorario()">Registrar</button>
          <?php
            $IdHorario = $_GET['idhorario'];
            $servername = "localhost";
            $username = "root";
            $password = "";

            //Iniciar conexion
            $conn = mysqli_connect($servername, $username, $password);
            //Checar conexion
            if(!$conn){
              die("Conexion fallida: " . mysqli_connect_error());
            }

            mysqli_select_db($conn,"WEB");

            $sql = "SELECT * FROM horario WHERE IdHorario= '".$IdHorario."'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              echo "<script>
                      document.getElementById(\"idhorario\").value = \"".$row['IdHorario']."\";
                      document.getElementById(\"grupo\").value = \"".$row['Grupo']."\";
                      document.getElementById(\"fecha\").value = \"".$row['Fecha']."\";
                      document.getElementById(\"hora\").value = \"".$row['Hora']."\";
                      document.getElementById(\"minuto\").value = \"".$row['Minuto']."\";
                      document.getElementById(\"disponibilidad\").value = \"".$row['Disponibilidad']."\";
                    </script>";
            }
          ?>
        </div>

      </div>
    </div>
  </main>

      <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020</p>
    </footer>
    </div>
    <script  src="../js/Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/form-validation.js"></script>
  </body>
</html>
