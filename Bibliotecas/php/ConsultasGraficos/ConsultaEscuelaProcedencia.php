<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $sumaIPN=0;
    $sumaUNAM=0;
    $sumaColbach=0;
    $sumaConalep=0;
    $sumaDGB=0;
    $sumaUEMSTIS=0;
    $sumaUEMSTAyCM=0;
    $sumaUAEM=0;
    $sumaSE=0;
    $sumaOtro=0;
    $promIPN=0;
    $promUNAM=0;
    $promColbach=0;
    $promConalep=0;
    $promDGB=0;
    $promUEMSTIS=0;
    $promUEMSTAyCM=0;
    $promUAEM=0;
    $promSE=0;
    $promOtro=0;

    //Iniciar conexion
    $conn = mysqli_connect($servername, $username, $password);
    //Checar conexion
    if(!$conn){
      die("Conexion fallida: " . mysqli_connect_error());
    }

    mysqli_select_db($conn,"WEB");

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="IPN"';
    $result = mysqli_query($conn, $sql);
    $IPN = mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaIPN+=$row['Calificacion'];
        }
      }
      $promIPN=$sumaIPN/$IPN;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="UNAM"';
    $result = mysqli_query($conn, $sql);
    $UNAM = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaUNAM+=$row['Calificacion'];
        }
      }
      $promUNAM=$sumaUNAM/$UNAM;
    }

   $sql = 'SELECT * FROM alumno WHERE TipoEsc="Colbach"';
    $result = mysqli_query($conn, $sql);
    $Colbach = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaColbach+=$row['Calificacion'];
        }
      }
      $promColbach=$sumaColbach/$Colbach;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="Conalep"';
    $result = mysqli_query($conn, $sql);
    $Conalep = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaConalep+=$row['Calificacion'];
        }
      }
      $promConalep=$sumaConalep/$Conalep;
    }

     $sql = 'SELECT * FROM alumno WHERE TipoEsc="DGB"';
    $result = mysqli_query($conn, $sql);
    $DGB = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaDGB+=$row['Calificacion'];
        }
      }
      $promDGB=$sumaDGB/$DGB;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="UEMSTIS"';
    $result = mysqli_query($conn, $sql);
    $UEMSTIS = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaUEMSTIS+=$row['Calificacion'];
        }
      }
      $promUEMSTIS=$sumaUEMSTIS/$UEMSTIS;
    }

   $sql = 'SELECT * FROM alumno WHERE TipoEsc="UEMSTAyCM"';
    $result = mysqli_query($conn, $sql);
    $UEMSTAyCM = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaUEMSTAyCM+=$row['Calificacion'];
        }
      }
      $promUEMSTAyCM=$sumaUEMSTAyCM/$UEMSTAyCM;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="UAEM"';
    $result = mysqli_query($conn, $sql);
    $UAEM= mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaUAEM+=$row['Calificacion'];
        }
      }
      $promUAEM=$sumaUAEM/$UAEM;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="SE"';
    $result = mysqli_query($conn, $sql);
    $SE = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaSE+=$row['Calificacion'];
        }
      }
      $promSE=$sumaSE/$SE;
    }

    $sql = 'SELECT * FROM alumno WHERE TipoEsc="OTROS"';
    $result = mysqli_query($conn, $sql);
    $Otro = mysqli_num_rows($result); 
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        if($row['Calificacion']!=null){
          $sumaOtro+=$row['Calificacion'];
        }
      }
      $promOtro=$sumaOtro/$Otro;
    }

    $data = array( 0 => $IPN,
                    1 => $UNAM,
                    2 => $Colbach,
                    3 => $Conalep,
                    4 => $DGB,
                    5 => $UEMSTIS,
                    6 => $UEMSTAyCM,
                    7 => $UAEM,
                    8 => $SE,
                    9 => $Otro,                
                    10 => round($promIPN,1),
                    11 => round($promUNAM,1),
                    12 => round($promColbach,1),
                    13 => round($promConalep,1),
                    14 => round($promDGB,1),
                    15 => round($promUEMSTIS,1),
                    16 => round($promUEMSTAyCM,1),                    
                    17 => round($promUAEM,1),
                    18 => round($promSE,1),
                    19 => round($promOtro,1)
                    
                );
    echo json_encode($data);

?>