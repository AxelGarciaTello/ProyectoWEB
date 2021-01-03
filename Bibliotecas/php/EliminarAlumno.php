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

    $CURP = $_GET['CURP'];

    $sql = "SELECT * FROM alumno WHERE CURP='$CURP'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $del = "DELETE FROM alumno WHERE CURP='$CURP'";
        mysqli_query($conn, $del);
        echo "alumno eliminado";
    }else{
        echo "no se encontro el registro";
    }
?>