<?php
  $Curp = $_GET['CURP'];
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
  $TipoEscuela = $_GET['tipoescuela'];
  $Escuela = $_GET['escuela'];
  $Localidad = $_GET['localidad'];
  $Formacion = $_GET['formacion'];
  $Promedio = $_GET['promedio'];
  $Carrera = $_GET['carrera'];
  $Semestre = $_GET['semestre'];
  $Opcion = $_GET['opcion'];

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

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      if($row["Disponibilidad"]!=0){
        $Disponibilidad = $row["Disponibilidad"] - 1;
        $Horario = $row["IdHorario"];
        break;
      }
    }
  } else {
    echo "No hay horarios disponibles";
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
      echo "Su registro fue exitoso";
    }
    else{
      echo "Error updating record: " . mysqli_error($conn);
    }
  }
  else{
    echo "Error: ". $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
?>
