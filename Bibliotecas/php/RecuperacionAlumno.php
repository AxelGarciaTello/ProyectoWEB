<?php
  $CURP = $_POST['CURP'];

  $Nombre = 0;
  $Paterno = 0;
  $Materno = 0;
  $Genero = 0;
  $Nacimiento = 0;
  $Correo = 0;
  $Telefono = 0;
  $Calle = 0;
  $Interior = 0;
  $Exterior = 0;
  $Colonia = 0;
  $Municipio = 0;
  $Estado = 0;
  $TipoEscuela = 0;
  $Escuela = 0;
  $Localidad = 0;
  $Formacion = 0;
  $Promedio = 0;
  $Carrera = 0;
  $Semestre = 0;
  $Opcion = 0;
  $Dia = 0;
  $Hora = 0;
  $Minuto = 0;
  $Grupo = 0;

  $servername = "localhost";
  $username = "root";
  $password = "";

  $Bandera = 0;

  //Iniciar conexion
  $conn = mysqli_connect($servername, $username, $password);
  //Checar conexion
  if(!$conn){
    die("Conexion fallida: " . mysqli_connect_error());
  }

  $sql = "use `WEB`";
  $result = mysqli_query($conn, $sql);

  $sql = "SELECT * FROM alumno WHERE CURP='".$CURP."'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    //$Horario = $row["IdHorario"];
    $Nombre = $row['Nombre'];
    $Paterno = $row['ApellidoP'];
    $Materno = $row['ApellidoM'];
    $Genero = $row['Genero'];
    $Nacimiento = $row['FechaNacimiento'];
    $Correo = $row['Correo'];
    $Telefono = $row['Telefono'];
    $Calle = $row['Calle'];
    $Interior = $row['NoInterior'];
    $Exterior = $row['NoExterior'];
    $Colonia = $row['Colonia'];
    $Municipio = $row['Municipio'];
    $Estado = $row['Estado'];
    $TipoEscuela = $row['TipoEsc'];
    $Escuela = $row['NombreEsc'];
    $Localidad = $row['LocalidadEsc'];
    $Formacion = $row['FormacionTec'];
    $Promedio = $row['Promedio'];
    $Carrera = $row['Carrera'];
    $Semestre = $row['Semestre'];
    $Opcion = $row['Opcion'];
    $IdHorario = $row['IdHorario'];

    $sql = "SELECT * FROM horario WHERE IdHorario=".$IdHorario;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $Dia = $row['Fecha'];
      $Hora = $row['Hora'];
      $Minuto = $row['Minuto'];
      $Grupo = $row['Grupo'];
    }
  }
  else{
    echo "<center><p><img class=\"mb-4\" src=\"../../Imagenes/Advertencia.png\" width=\"100\" height=\"100\"></p>
    <p><h1>Parece que no te has registrado previamente.</h1></p>
    <p><h3>Da clic <a href=\"../../IdentificacionAlumno/IdentificacionAlumno.html\">aqui</a> para registrarte </h3></p></center>";
    $Bandera = 1;
  }

  if($Bandera==0){
    require('fpdf/fpdf.php');
    $pdf = new FPDF('P','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(80);
    $pdf->Image("../../Imagenes/escudoESCOM.png",10,10,-500);
    $pdf->Image("../../Imagenes/logoIPN.png",180,10,-870);
    $pdf->Cell(30,10,utf8_decode('IPN ESCOM'),0,1,'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(80);
    $pdf->Cell(30,10,utf8_decode('Comprobante de registro de examen diagnostico'),0,1,'C');
    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(10);
    $pdf->Cell(0,10,utf8_decode('Datos personales'),0,1,'');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,10,utf8_decode('CURP: '.$CURP),1,0,'');
    $pdf->Cell(100,10,utf8_decode('Nombre: '.$Nombre ),1,1,'');
    $pdf->Cell(100,10,utf8_decode('Apellido paterno: '.$Paterno),1,0,'');
    $pdf->Cell(100,10,utf8_decode('Apellido materno: '.$Materno),1,1,'');
    $pdf->Cell(100,10,utf8_decode('Género: '.$Genero),1,0,'');
    $pdf->Cell(100,10,utf8_decode('Fecha de nacimiento: '.$Nacimiento),1,1,'');
    $pdf->Cell(100,10,utf8_decode('Correo electronico: '.$Correo),1,0,'');
    $pdf->Cell(100,10,utf8_decode('Teléfono: '.$Telefono),1,1,'');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(100,10,utf8_decode('Dirección'),0,1,'');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,10,utf8_decode('Calle: '.$Calle),1,0,'');
    $pdf->Cell(50,10,utf8_decode('No. Exterior: '.$Exterior),1,0,'');
    $pdf->Cell(50,10,utf8_decode('No. Interior: '.$Interior),1,1,'');
    $pdf->Cell(66,10,utf8_decode('Colonia: '.$Colonia),1,0,'');
    $pdf->Cell(66,10,utf8_decode('Municipio: '.$Municipio),1,0,'');
    $pdf->Cell(68,10,utf8_decode('Estado: '.$Estado),1,1,'');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(100,10,utf8_decode('Escuela de procedencia'),0,1,'');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,10,utf8_decode('Tipo: '.$TipoEscuela),1,0,'');
    $pdf->Cell(150,10,utf8_decode('Nombre: '.$Localidad),1,1,'');
    $pdf->Cell(200,10,utf8_decode('Localidad: '.$Localidad),1,1,'');
    $pdf->Cell(100,10,utf8_decode('Formación técnica: '.$Formacion),1,0,'');
    $pdf->Cell(100,10,utf8_decode('Promedio obtenido: '.$Promedio),1,1,'');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(100,10,utf8_decode('Programa academico'),0,1,'');
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(110,10,utf8_decode('Carrera Asignada: '.$Carrera),1,0,'');
    $pdf->Cell(45,10,utf8_decode('Semestre: '.$Semestre),1,0,'');
    $pdf->Cell(45,10,utf8_decode('No. de opción: '.$Opcion),1,1,'');
    $pdf->SetFont('Arial','B',15);
    $pdf->Ln(15);
    $pdf->Cell(80);
    $pdf->Cell(30,10,utf8_decode('Tu examen está programado para el día '),0,1,'C');
    $pdf->Cell(80);
    $pdf->Cell(30,10,utf8_decode($Dia.' a las '.$Hora.':'.$Minuto.' hrs '),0,1,'C');
    $pdf->Cell(80);
    $pdf->Cell(30,10,utf8_decode('Tu grupo asignado es el grupo número '.$Grupo),0,1,'C');
    $pdf->Output();
  }

?>
