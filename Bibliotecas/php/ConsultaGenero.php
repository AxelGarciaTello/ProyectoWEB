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

    $sql = 'SELECT * FROM alumno WHERE Genero="Hombre"';
    $result = mysqli_query($conn, $sql);
    $hombre = mysqli_num_rows($result); 

    $sql = 'SELECT * FROM alumno WHERE Genero="Mujer"';
    $result = mysqli_query($conn, $sql);
    $mujer = mysqli_num_rows($result); 

    $data = array( 0 => $hombre,
                    1 => $mujer
                );
    echo json_encode($data);

?>