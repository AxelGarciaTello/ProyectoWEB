<?php

  $idhorario = $_GET['idhorario'];
  $grupo = $_GET['grupo'];
  $fecha = $_GET['fecha'];
  $hora = $_GET['hora'];
  $minuto = $_GET['minuto'];
  $disponibilidad = $_GET['disponibilidad'];

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

  $sql = "SELECT * FROM horario WHERE Grupo = '".$grupo."' and
  Fecha = '".$fecha."' and Hora = '".$hora."' and Minuto = '".$minuto."'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['IdHorario'];
    return;
  }

  $sql = "UPDATE horario SET Grupo = '".$grupo."', Fecha = '".$fecha."',
  Hora = '".$hora."', Minuto = '".$minuto."',
  Disponibilidad = '".$disponibilidad."' WHERE IdHorario = '".$idhorario."'";

  if(mysqli_query($conn, $sql)){
    echo "correcto";
  }
  else{
    echo "error";
  }
  mysqli_close($conn);
?>
