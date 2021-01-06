<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $sumaSC=0;
    $sumaIA=0;
    $sumaCD=0;
    $promSC=0;
    $promIA=0;
    $promCD=0;

    //Iniciar conexion
    $conn = mysqli_connect($servername, $username, $password);
    //Checar conexion
    if(!$conn){
      die("Conexion fallida: " . mysqli_connect_error());
    }

    mysqli_select_db($conn,"WEB");

    $sql = 'SELECT * FROM alumno WHERE Carrera="Ing. en Sistemas Computacionales"';
    $result = mysqli_query($conn, $sql);
    $sc = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaSC+=$row['Calificacion'];
        }
      }
      $promSC=$sumaSC/$sc;
    }

    $sql = 'SELECT * FROM alumno WHERE Carrera="Ing. en Inteligencia Artificial"';
    $result = mysqli_query($conn, $sql);
    $ia = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaIA+=$row['Calificacion'];
        }
      }
      $promIA=$sumaIA/$ia;
    }

    $sql = 'SELECT * FROM alumno WHERE Carrera="Lic. en Ciencia de Datos"';
    $result = mysqli_query($conn, $sql);
    $cd = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaCD+=$row['Calificacion'];
        }
      }
      $promCD=$sumaCD/$cd;
    }

    $data = array( 0 => $sc,
                    1 => $ia,
                    2 => $cd,
                    3 => round($promSC,1),
                    4 => round($promIA,1),
                    5 => round($promCD,1),
                );
    echo json_encode($data);

?>