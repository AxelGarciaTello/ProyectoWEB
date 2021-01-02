<?php
  $Usuario = $_GET['Usuario'];
  $Contrasenia = $_GET['Contrasenia'];

  session_start();

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

  $sql = "SELECT * FROM `administrador` WHERE Usuario='".$Usuario."' AND Contrasenia=sha2('".$Contrasenia."', 224)";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["Usuario"] = $row["Usuario"];
    $_SESSION["Contrasenia"] = $row["Contrasenia"];
    echo "Aceptado";
  }
  else{
    echo "Usuario o contraseña incorrectos.";
  }
  mysqli_close($conn);

?>
