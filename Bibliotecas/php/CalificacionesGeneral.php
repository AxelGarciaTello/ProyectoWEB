<?php
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

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<1";
    $result = mysqli_query($conn, $sql);
    $calif0 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<2 AND Calificacion>=1";
    $result = mysqli_query($conn, $sql);
    $calif1 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<3 AND Calificacion>=2";
    $result = mysqli_query($conn, $sql);
    $calif2 = mysqli_num_rows($result); 
    
    $sql = "SELECT CURP FROM alumno WHERE Calificacion<4 AND Calificacion>=3";
    $result = mysqli_query($conn, $sql);
    $calif3 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<5 AND Calificacion>=4";
    $result = mysqli_query($conn, $sql);
    $calif4 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<6 AND Calificacion>=5";
    $result = mysqli_query($conn, $sql);
    $calif5 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<6.5 AND Calificacion>=6";
    $result = mysqli_query($conn, $sql);
    $calif6 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<7.5 AND Calificacion>=6.5";
    $result = mysqli_query($conn, $sql);
    $calif7 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<8.5 AND Calificacion>=7.5";
    $result = mysqli_query($conn, $sql);
    $calif8 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion<9.5 AND Calificacion>=8.5";
    $result = mysqli_query($conn, $sql);
    $calif9 = mysqli_num_rows($result); 

    $sql = "SELECT CURP FROM alumno WHERE Calificacion>=9.5";
    $result = mysqli_query($conn, $sql);
    $calif10 = mysqli_num_rows($result); 

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
                );
    echo json_encode($data);

?>