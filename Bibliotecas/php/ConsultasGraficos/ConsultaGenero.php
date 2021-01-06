<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $sumaHombre=0;
    $sumaMujer=0;
    $promHombre=0;
    $promMujer=0;

    //Iniciar conexion
    $conn = mysqli_connect($servername, $username, $password);
    //Checar conexion
    if(!$conn){
      die("Conexion fallida: " . mysqli_connect_error());
    }

    mysqli_select_db($conn,"WEB");

    $sql = 'SELECT * FROM alumno WHERE Genero="Hombre"';
    $result = mysqli_query($conn, $sql);
    $hombre = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaHombre+=$row['Calificacion'];
        }
      }
      $promHombre=$sumaHombre/$hombre;
    }

    $sql = 'SELECT * FROM alumno WHERE Genero="Mujer"';
    $result = mysqli_query($conn, $sql);
    $mujer = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaMujer+=$row['Calificacion'];
        }
      }
      $promMujer=$sumaMujer/$mujer;
    }

    $data = array( 0 => $hombre,
                    1 => $mujer,
                    2 => round($promHombre,1),
                    3 => round($promMujer,1),
                );
    echo json_encode($data);

?>