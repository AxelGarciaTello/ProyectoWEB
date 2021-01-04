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

    $IdHorario = $_GET['IdHorario'];

    $sql = "SELECT * FROM horario WHERE IdHorario='$IdHorario'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $del = "DELETE FROM horario WHERE IdHorario='$IdHorario'";
        mysqli_query($conn, $del);
        echo "horario eliminado";
    }else{
        echo "no se encontro el registro del horario";
    }
?>