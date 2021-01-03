  <?php
    $CURP = $_GET['CURP'];
    $Calificacion = $_GET['calificacion'];
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

    $sql = "UPDATE alumno SET Calificacion = '".$Calificacion."' WHERE CURP = '".$CURP."'";

    if(mysqli_query($conn, $sql)){
      echo "correcto";
    }
    else{
      echo "error";
    }
    mysqli_close($conn);
  ?>
