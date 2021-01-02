<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Administra los datos de los alumnos">
    <meta name="author" content="Garcia Tello Axel">
    <title>Administrador</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
          <div class="container">
          <?php
            header('Content-Type: text/html; charset=UTF-8');
            $CURP = $_GET['CURP'];
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
            $Calificaion = 0;

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
              $Calificaion = $row['Calificacion'];
              if(!$Calificaion){
                $Calificaion = "Sin calificar";
              }

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

            $Mensaje = "<center><b>
            <p><h1>IPN ESCOM</h1></p>
            <p><h3>Comprobante de registro de examen diagnóstico</h3></p></b></center>
            <p><b>Datos personales</b></p>
            <table width=\"100%\" border=\"1\" cellpadding=\"3\" class=\"table table-bordered\">
              <tr>
                <td>CURP: ".$CURP."</td>
                <td>Nombre: ".$Nombre."</td>
              </tr>
              <tr>
                <td>Apellido paterno: ".$Paterno."</td>
                <td>Apellido materno: ".$Materno."</td>
              </tr>
              <tr>
                <td>Género: ".$Genero."</td>
                <td>Fecha de nacimiento: ".$Nacimiento."</td>
              </tr>
              <tr>
                <td>Correo electrónico: ".$Correo."</td>
                <td>Teléfono: ".$Telefono."</td>
              </tr>
            </table>
            <p><b>Dirección</b></p>
            <table width=\"100%\" border=\"1\" cellpadding=\"3\" class=\"table table-bordered\">
              <tr>
                <td>Calle: ".$Calle."</td>
                <td>No. Exterior: ".$Exterior."</td>
                <td>No. Interior: ".$Interior."</td>
              </tr>
              <tr>
                <td>Colonia: ".$Colonia."</td>
                <td>Municipio: ".$Municipio."</td>
                <td>Estado: ".$Estado."</td>
              </tr>
            </table>
            <p><b>Escuela de procedencia</b></p>
            <table width=\"100%\" border=\"1\" cellpadding=\"3\" class=\"table table-bordered\">
              <tr>
                <td>Tipo: ".$TipoEscuela."</td>
                <td>Nombre: ".$Escuela."</td>
              </tr>
            </table>
            <table width=\"100%\" border=\"1\" cellpadding=\"3\" class=\"table table-bordered\">
              <tr>
                <td>Localidad: ".$Localidad."</td>
              </tr>
            </table>
            <table width=\"100%\" border=\"1\" cellpadding=\"3\" class=\"table table-bordered\">
              <tr>
                <td>Formación técnica: ".$Formacion."</td>
                <td>Promedio obtenido: ".$Promedio."</td>
              </tr>
            </table>
            <p><b>Programa académico</b></p>
            <table width=\"100%\" border=\"1\" cellpadding=\"3\" class=\"table table-bordered\">
              <tr>
                <td>Carrera  asignada: ".$Carrera."</td>
                <td>Semestre: ".$Semestre."</td>
                <td>No. de opción: ".$Opcion."</td>
              </tr>
            </table>
            <center><b>
            <p>Tu examen está programado para el día</p>
            <p>".$Dia." a las ".$Hora.":".$Minuto." hrs</p>
            <p>Tu grupo asignado es el grupo  número ".$Grupo."</p>
            <p>El ID del Horario es el ".$IdHorario."</p>
            <p>Tu califición en el examen es ".$Calificaion."</p>
            </b></center>";
            echo $Mensaje;
            mysqli_close($conn);
          ?>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
