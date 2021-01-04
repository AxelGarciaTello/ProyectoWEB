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

  $sql = "SELECT * FROM horario";

  $result = mysqli_query($conn, $sql);

  echo utf8_decode("<div class=\"table-responsive\">
                      <table class=\"table table-striped table-sm\">
                        <thead>
                          <tr>
                            <th>IdHorario</th>
                            <th>Grupo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Minuto</th>
                            <th>Disponibilidad</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                    ");

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['IdHorario'] . "</td>";
      echo "<td>" . $row['Grupo'] . "</td>";
      echo "<td>" . $row['Fecha'] . "</td>";
      echo "<td>" . $row['Hora'] . "</td>";
      echo "<td>" . $row['Minuto'] . "</td>";
      echo "<td>" . $row['Disponibilidad'] . "</td>";
      echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Editar</button></td>";
      echo "<td><button type=\"button\" class=\"btn btn-sm btn-outline-secondary\"  onclick=\"EliminarHorarios('".$row['IdHorario']."')\">Eliminar</button></td>";
      echo "</tr>";
    }
  }

  echo "    </tbody>
          </table>
        </div>";

  mysqli_close($conn);
?>
