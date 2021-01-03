<?php
  $CURP = $_GET['CURP'];
  $Nombre = $_GET['nombre'];
  $Paterno = $_GET['paterno'];
  $Materno = $_GET['materno'];
  $Genero = $_GET['genero'];
  $Nacimiento = $_GET['nacimiento'];
  $Correo = $_GET['correo'];
  $Telefono = $_GET['telefono'];
  $Calle = $_GET['calle'];
  $Interior = $_GET['interior'];
  $Exterior = $_GET['exterior'];
  $Colonia = $_GET['colonia'];
  $Municipio = $_GET['municipio'];
  $Estado = $_GET['estado'];
  $TipoEscuela = $_GET['tipo'];
  $Escuela = $_GET['escuela'];
  $Localidad = $_GET['localidad'];
  $Formacion = $_GET['formacion'];
  $Promedio = $_GET['promedio'];
  $Carrera = $_GET['carrera'];
  $Semestre = $_GET['semestre'];
  $Opcion = $_GET['opcion'];
  $IdHorario = $_GET['idhorario'];
  $Calificacion = $_GET['calificacion'];

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

  $sql = "UPDATE alumno SET Nombre = '".$Nombre."', ApellidoP = '".$Paterno."',
  ApellidoM = '".$Materno."', Genero = '".$Genero."',
  FechaNacimiento = '".$Nacimiento."', Correo = '".$Correo."',
  Telefono = '".$Telefono."', Calle = '".$Calle."', NoInterior = '".$Interior."',
  NoExterior = '".$Exterior."', Colonia = '".$Colonia."',
  Municipio = '".$Municipio."', Estado = '".$Estado."',
  TipoEsc = '".$TipoEscuela."', NombreEsc = '".$Escuela."',
  LocalidadEsc = '".$Localidad."', FormacionTec = '".$Formacion."', Promedio = '".$Promedio."',
  Carrera = '".$Carrera."', Semestre = '".$Semestre."', Opcion = '".$Opcion."',
  IdHorario = '".$IdHorario."', Calificacion = '".$Calificacion."' WHERE
  CURP = '".$CURP."'";

  if(mysqli_query($conn, $sql)){
    echo "correcto";
  }
  else{
    echo "error";
  }
  mysqli_close($conn);
?>
