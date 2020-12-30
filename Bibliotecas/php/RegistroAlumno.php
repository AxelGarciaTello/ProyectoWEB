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
      $Curp = $_POST['CURP'];
      $Nombre = $_POST['nombre'];
      $Paterno = $_POST['paterno'];
      $Materno = $_POST['materno'];
      $Genero = $_POST['genero'];
      $Nacimiento = $_POST['nacimiento'];
      $Correo = $_POST['correo'];
      $Telefono = $_POST['telefono'];
      $Calle = $_POST['calle'];
      $Interior = $_POST['interior'];
      $Exterior = $_POST['exterior'];
      $Colonia = $_POST['colonia'];
      $Municipio = $_POST['municipio'];
      $Estado = $_POST['estado'];
      $TipoEscuela = $_POST['tipoescuela'];
      $Escuela = $_POST['escuela'];
      $Localidad = $_POST['localidad'];
      $Formacion = $_POST['formacion'];
      $Promedio = $_POST['promedio'];
      $Carrera = $_POST['carrera'];
      $Semestre = $_POST['semestre'];
      $Opcion = $_POST['opcion'];

      $servername = "localhost";
      $username = "root";
      $password = "";

      //Iniciar conexion
      $conn = mysqli_connect($servername, $username, $password);
      //Checar conexion
      if(!$conn){
        die("Conexion fallida: " . mysqli_connect_error());
      }

      $sql = "use `WEB`";
      $result = mysqli_query($conn, $sql);

      $sql = "SELECT * FROM `horario`";
      $result = mysqli_query($conn, $sql);

      $Horario = 0;
      $Disponibilidad = 0;
      $Bandera = 0;
      $Anterior = 0;
      $Dia = 0;
      $Hora = 0;
      $Minuto = 0;
      $Grupo = 0;

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $Anterior = $row;
          if($row['Disponibilidad']!=0){
            $Disponibilidad = $row['Disponibilidad'] - 1;
            $Horario = $row['IdHorario'];
            $Dia = $row['Fecha'];
            $Hora = $row['Hora'];
            $Minuto = $row['Minuto'];
            $Grupo = $row['Grupo'];
            $Bandera = 1;
            break;
          }
        }
      } else {
        echo "<h1>No hay horarios disponibles</h1>";
      }

      if($Bandera!=1){
        $Grupo = $Anterior['Grupo'] + 1;
        $Dia = $Anterior['Fecha'];
        $Hora = $Anterior['Hora'];
        $Minuto = $Anterior['Minuto'];
        if($Grupo > 6){
          $Grupo = 1;
          $Minuto += 45;
          if($Minuto >= 60){
            $Minuto -= 60;
            $Hora += 1;
          }
          $Hora += 1;
        }
        $sql = "insert into horario(IdHorario, Grupo, Fecha, Hora, Minuto,
        Disponibilidad) values(NULL,". $Grupo . ", '" . $Dia . "',
        " . $Hora . ", " . $Minuto . ", 25);";
        if(mysqli_query($conn, $sql)){
          $sql = "SELECT * FROM `horario`";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              if($row['Disponibilidad']!=0){
                $Disponibilidad = $row['Disponibilidad'] - 1;
                $Horario = $row['IdHorario'];
                $Dia = $row['Fecha'];
                $Hora = $row['Hora'];
                $Minuto = $row['Minuto'];
                $Grupo = $row['Grupo'];
              }
            }
          }
        }

      }

      $sql = "INSERT INTO `alumno` (`CURP`, `Nombre`, `ApellidoP`, `ApellidoM`,
        `Genero`, `FechaNacimiento`, `Correo`, `Telefono`, `Calle`, `NoInterior`,
        `NoExterior`, `Colonia`, `Municipio`, `Estado`, `TipoEsc`, `NombreEsc`,
         `LocalidadEsc`, `FormacionTec`, `Promedio`, `Carrera`, `Semestre`,
         `Opcion`, `IdHorario`, `Calificacion`)
         VALUES ('" . $Curp . "', '" . $Nombre . "', '" . $Paterno . "',
           '" . $Materno . "', '" . $Genero . "', '" . $Nacimiento . "',
           '" . $Correo . "', '" . $Telefono . "', '" . $Calle . "',
           '" . $Interior . "', '" . $Exterior . "', '" . $Colonia . "',
           '" . $Municipio . "', '" . $Estado . "', '" . $TipoEscuela . "',
           '" . $Escuela . "', '" . $Localidad . "', '" . $Formacion . "',
           '" . $Promedio . "', '" . $Carrera . "', '" . $Semestre . "',
           '" . $Opcion . "', '" . $Horario . "', NULL)";
      if(mysqli_query($conn, $sql)){
        $sql = "UPDATE `horario` SET `Disponibilidad` = " . $Disponibilidad . "
        WHERE `horario`.`IdHorario` = " . $Horario;
        if(mysqli_query($conn, $sql)){
          if($Minuto<10){
            $Minuto = "0" . $Minuto;
          }
          echo "<h1>Tus datos se han Guardado con exito.</h1>
          <p class=\"lead\">Tu examen diagnostico sera el d&iacute;a ". $Dia ." a las ". $Hora .":". $Minuto ."</p>
          <p class=\"lead\">Tu grupo asignado es el grupo número ". $Grupo ."</p>
          <p class=\"lead\">Descarge el PDF como comprobante.</p>
          <p class=\"lead\">Esta misma información tambien sera enviada a tu correo.</p>";
          echo "<p class=\"lead\">
            <a href=\"CreadorPDF.php?CURP=".$Curp.chr(38)."nombre=".$Nombre.chr(38)."
            paterno=".$Paterno.chr(38)."materno=".$Materno.chr(38)."genero=".$Genero.chr(38)."
            nacimiento=".$Nacimiento.chr(38)."correo=".$Correo.chr(38)."telefono=".$Telefono.chr(38)."
            calle=".$Calle.chr(38)."interior=".$Interior.chr(38)."exterior=".$Exterior.chr(38)."colonia=".$Colonia.chr(38)."
            municipio=".$Municipio.chr(38)."estado=".$Estado.chr(38)."tipoescuela=".$TipoEscuela.chr(38)."
            escuela=".$Escuela.chr(38)."localidad=".$Localidad.chr(38)."formacion=".$Formacion.chr(38)."
            promedio=".$Promedio.chr(38)."carrera=".$Carrera.chr(38)."semestre=".$Semestre.chr(38)."
            opcion=".$Opcion.chr(38)."dia=".$Dia.chr(38)."hora=".$Hora.chr(38)."minuto=".$Minuto.chr(38)."
            grupo=".$Grupo."\" class=\"btn btn-lg btn-secondary fw-bold border-white bg-white\">Descargar PDF</a>
          </p>";
        }
        else{
          echo "<h1>Error updating record: </h1>
          <p class=\"lead\">" . mysqli_error($conn) . "</p>";
        }
      }
      else{
        echo "<h1>Error: </h1>
        <p class=\"lead\">" . mysqli_error($conn) . "</p>";
        echo "<h2> Ya te haz registrado previamente. </h2>";
      }
      mysqli_close($conn);
    ?>

  </main>

  <footer class="mt-auto text-white-50">
    <p>ESCOM</p>
  </footer>
</div>



  </body>
</html>
