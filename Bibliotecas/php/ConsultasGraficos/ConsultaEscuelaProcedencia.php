<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $sumaPublica=0;
    $sumaPrivada=0;
    $promPublica=0;
    $promPrivada=0;

    //Iniciar conexion
    $conn = mysqli_connect($servername, $username, $password);
    //Checar conexion
    if(!$conn){
      die("Conexion fallida: " . mysqli_connect_error());
    }

    mysqli_select_db($conn,"WEB");

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="PÚBLICA"';
    $result = mysqli_query($conn, $sql);
    $publica = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaPublica+=$row['Calificacion'];
        }
      }
      $promPublica=$sumaPublica/$publica;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="PRIVADA"';
    $result = mysqli_query($conn, $sql);
    $privada = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaPrivada+=$row['Calificacion'];
        }
      }
      $promPrivada=$sumaPrivada/$privada;
    }

    $data = array( 0 => $publica,
                    1 => $privada,
                    2 => round($promPublica,1),
                    3 => round($promPrivada,1),
                );
    echo json_encode($data);

?>