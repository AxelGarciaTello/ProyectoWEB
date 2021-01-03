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

  $sql = "SELECT * FROM alumno where calificacion IS NULL";

  $result = mysqli_query($conn, $sql);

  echo utf8_decode("<div class=\"table-responsive\">
                      <table class=\"table table-striped table-sm\">
                        <thead>
                          <tr>
                            <th>CURP</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Calificaci".chr(38)."oacute;n</th>
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
      echo "<td>
              <input type=\"text\" name=\"promedio\" class=\"form-control\" id=\"promedio".$row['CURP']."\" min=\"0\" max=\"10\" oninput=\"validarPromedio(this)\" required>
              <div class=\"invalid-feedback\">
                Se requiere una calificaci&oacute;n v&aacute;lida.
              </div>
            </td>";
      echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\" onclick=\"CalificarAlumno('".$row['CURP']."', promedio".$row['CURP'].".value)\">Calificar</button></td>";
      echo "</tr>";
    }
  }

  echo "    </tbody>
          </table>
        </div>";

  mysqli_close($conn);
?>
