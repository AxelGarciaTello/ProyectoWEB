<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Registro exitoso">
    <meta name="author" content="Garc&iacute;a Tello Axel">
    <title>Registro exitoso</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">



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
    <link href="../css/cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">ESCOM</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="#">Registro de datos</a>
        <a class="nav-link" href="../../index.html">Inicio</a>
      </nav>
    </div>
  </header>

  <main class="px-3">
    <?php
      $CURP = $_POST['CURP'];

      $Nombre = 0;
      $Paterno = 0;
      $Materno = 0;
      $Genero = 0;
      $Nacimiento = 0;
      $Correo = 0;
      $Telefono = 0;
      $Calle = 0;
      $Interior = 0;
      $Exterior = 0;
      $Colonia = 0;
      $Municipio = 0;
      $Estado = 0;
      $TipoEscuela = 0;
      $Escuela = 0;
      $Localidad = 0;
      $Formacion = 0;
      $Promedio = 0;
      $Carrera = 0;
      $Semestre = 0;
      $Opcion = 0;
      $Dia = 0;
      $Hora = 0;
      $Minuto = 0;
      $Grupo = 0;

      $servername = "localhost";
      $username = "root";
      $password = "";

      $Bandera = 0;

      //Iniciar conexion
      $conn = mysqli_connect($servername, $username, $password);
      //Checar conexion
      if(!$conn){
        die("Conexion fallida: " . mysqli_connect_error());
      }

      $sql = "use `WEB`";
      $result = mysqli_query($conn, $sql);

      $sql = "SELECT * FROM alumno WHERE CURP='".$CURP."'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $Nombre = $row['Nombre'];
        $Paterno = $row['ApellidoP'];
        $Materno = $row['ApellidoM'];
        $Genero = $row['Genero'];
        $Nacimiento = $row['FechaNacimiento'];
        $Correo = $row['Correo'];
        $Telefono = $row['Telefono'];
        $Calle = $row['Calle'];
        $Interior = $row['NoInterior'];
        $Exterior = $row['NoExterior'];
        $Colonia = $row['Colonia'];
        $Municipio = $row['Municipio'];
        $Estado = $row['Estado'];
        $TipoEscuela = $row['TipoEsc'];
        $Escuela = $row['NombreEsc'];
        $Localidad = $row['LocalidadEsc'];
        $Formacion = $row['FormacionTec'];
        $Promedio = $row['Promedio'];
        $Carrera = $row['Carrera'];
        $Semestre = $row['Semestre'];
        $Opcion = $row['Opcion'];
        $IdHorario = $row['IdHorario'];

        $sql = "SELECT * FROM horario WHERE IdHorario=".$IdHorario;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $Dia = $row['Fecha'];
          $Hora = $row['Hora'];
          $Minuto = $row['Minuto'];
          $Grupo = $row['Grupo'];
          if($Minuto<10){
            $Minuto = "0" . $Minuto;
          }
        }
      }
      else{
        echo "<img class=\"mb-4\" src=\"../../Imagenes/Advertencia.png\" width=\"100\" height=\"100\">
        <h1>Parece que no te has registrado previamente.</h1>
        <h3>Da clic <a href=\"../../IdentificacionAlumno/IdentificacionAlumno.html\">aqui</a> para registrarte </h3>";
        $Bandera = 1;
      }

      if($Bandera==0){
        echo "<h1>Tus datos se han Guardado con exito.</h1>
        <p class=\"lead\">Tu examen est&aacute; programado para el d&iacute;a</p>
        <p class=\"lead\">".$Dia." a las ".$Hora.":".$Minuto." hrs</p>
        <p class=\"lead\">Tu grupo asignado es el grupo n&uacute;mero ".$Grupo."</p>
        <p class=\"lead\">Descarge el PDF como comprobante.</p>
        <p class=\"lead\" id=\"mensajeCorreo\">Esta misma informaci&oacute;n esta siendo enviada a tu correo.</p>";
        echo "<p class=\"lead\">
          <a href=\"CreadorPDF.php?CURP=".$CURP.chr(38)."nombre=".$Nombre.chr(38)."
          paterno=".$Paterno.chr(38)."materno=".$Materno.chr(38)."genero=".$Genero.chr(38)."
          nacimiento=".$Nacimiento.chr(38)."correo=".$Correo.chr(38)."telefono=".$Telefono.chr(38)."
          calle=".$Calle.chr(38)."interior=".$Interior.chr(38)."exterior=".$Exterior.chr(38)."colonia=".$Colonia.chr(38)."
          municipio=".$Municipio.chr(38)."estado=".$Estado.chr(38)."tipoescuela=".$TipoEscuela.chr(38)."
          escuela=".$Escuela.chr(38)."localidad=".$Localidad.chr(38)."formacion=".$Formacion.chr(38)."
          promedio=".$Promedio.chr(38)."carrera=".$Carrera.chr(38)."semestre=".$Semestre.chr(38)."
          opcion=".$Opcion.chr(38)."dia=".$Dia.chr(38)."hora=".$Hora.chr(38)."minuto=".$Minuto.chr(38)."
          grupo=".$Grupo."\" class=\"btn btn-lg btn-secondary fw-bold border-white bg-white\">Descargar PDF</a>
        </p>";
        echo "<script>
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(\"mensajeCorreo\").innerHTML = this.responseText;
                  }
                };
                var datos = \"CURP=".$CURP.chr(38)."\";
                datos += \"nombre=".$Nombre.chr(38)."\";
                datos += \"paterno=".$Paterno.chr(38)."\";
                datos += \"materno=".$Materno.chr(38)."\";
                datos += \"genero=".$Genero.chr(38)."\";
                datos += \"nacimiento=".$Nacimiento.chr(38)."\";
                datos += \"correo=".$Correo.chr(38)."\";
                datos += \"telefono=".$Telefono.chr(38)."\";
                datos += \"calle=".$Calle.chr(38)."\";
                datos += \"interior=".$Interior.chr(38)."\";
                datos += \"exterior=".$Exterior.chr(38)."\";
                datos += \"colonia=".$Colonia.chr(38)."\";
                datos += \"municipio=".$Municipio.chr(38)."\";
                datos += \"estado=".$Estado.chr(38)."\";
                datos += \"tipoescuela=".$TipoEscuela.chr(38)."\";
                datos += \"escuela=".$Escuela.chr(38)."\";
                datos += \"localidad=".$Localidad.chr(38)."\";
                datos += \"formacion=".$Formacion.chr(38)."\";
                datos += \"promedio=".$Promedio.chr(38)."\";
                datos += \"carrera=".$Carrera.chr(38)."\";
                datos += \"semestre=".$Semestre.chr(38)."\";
                datos += \"opcion=".$Opcion.chr(38)."\";
                datos += \"dia=".$Dia.chr(38)."\";
                datos += \"hora=".$Hora.chr(38)."\";
                datos += \"minuto=".$Minuto.chr(38)."\";
                datos += \"grupo=".$Grupo."\";
                xmlhttp.open(\"GET\", \"EnviarMail.php?\" + datos, true);
                xmlhttp.send();
              </script>";
      }

    ?>
  </main>

  <footer class="mt-auto text-white-50">
    <p>ESCOM</p>
  </footer>
</div>



  </body>
</html>
