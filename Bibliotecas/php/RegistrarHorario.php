<?php

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

  $sql = "INSERT INTO horario (IdHorario, Grupo, Fecha, Hora, Minuto,
    Disponibilidad) VALUES (NULL, '".$grupo."', '".$fecha."', '".$hora."',
      '".$minuto."', '".$disponibilidad."')";

  if(mysqli_query($conn, $sql)){
    echo "correcto";
  }
  else{
    echo "error";
  }
  mysqli_close($conn);
?>
