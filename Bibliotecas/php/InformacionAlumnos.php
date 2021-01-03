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

  $sql = "SELECT * FROM alumno";

  $result = mysqli_query($conn, $sql);

  echo utf8_decode("<div class=\"table-responsive\">
                      <table class=\"table table-striped table-sm\">
                        <thead>
                          <tr>
                            <th>CURP</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Id Horario</th>
                            <th>Calificaci".chr(38)."oacute;n</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                    ");

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['CURP'] . "</td>";
      echo "<td>" . $row['Nombre'] . "</td>";
      echo "<td>" . $row['ApellidoP'] . "</td>";
      echo "<td>" . $row['ApellidoM'] . "</td>";
      echo "<td>" . $row['IdHorario'] . "</td>";
      echo "<td>" . $row['Calificacion'] . "</td>";
      echo "<td><a href=\"../Bibliotecas/php/InformacionGeneralAlumno.php?CURP=".$row['CURP']."\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Ver</button></a></td>";
      echo "<td><a href=\"../Bibliotecas/php/EditadoAlumno.php?CURP=".$row['CURP']."\"><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Editar</button></a></td>";
      echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\" onclick=\"EliminarAlumno('".$row['CURP']."')\">Eliminar</button></td>";
      echo "</tr>";
    }
  }

  echo "    </tbody>
          </table>
        </div>";

  mysqli_close($conn);
?>
