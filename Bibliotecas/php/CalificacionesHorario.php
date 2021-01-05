<?php
    $idGrupo = $_POST['resp'];
   
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

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<1 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif0 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<2 AND Calificacion>=1 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif1 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<3 AND Calificacion>=2 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif2 = mysqli_num_rows($result); 
    
    $sql = "SELECT CURP FROM alumno WHERE Calificacion<4 AND Calificacion>=3 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif3 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<5 AND Calificacion>=4 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif4 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<6 AND Calificacion>=5 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif5 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<6.5 AND Calificacion>=6 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif6 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<7.5 AND Calificacion>=6.5 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif7 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<8.5 AND Calificacion>=7.5 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif8 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<9.5 AND Calificacion>=8.5 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif9 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion>=9.5 AND IdHorario=$idGrupo";
    $result = mysqli_query($conn, $sql);
    $calif10 = mysqli_num_rows($result); 

    
    $suma=0;
    $suma=$calif1+$calif2*2+$calif3*3+$calif4*4+$calif5*5+$calif6*6+$calif7*7+$calif8*8+$calif9*9+$calif10*10;
    $total=0;
    $total=$calif0+$calif1+$calif2+$calif3+$calif4+$calif5+$calif6+$calif7+$calif8+$calif9+$calif10;
    $prom=0;
    if($total>0){
      $prom=$suma/$total;
    }

    $data = array( 0 => $calif0,
                    1 => $calif1, 
                    2 => $calif2,
                    3 => $calif3,
                    4 => $calif4,
                    5 => $calif5,
                    6 => $calif6,
                    7 => $calif7,
                    8 => $calif8,
                    9 => $calif9,
                    10 => $calif10,
                    11 => round($prom,1)
                );
    echo json_encode($data);

?>