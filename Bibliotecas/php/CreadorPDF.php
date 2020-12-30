<?php
$Curp = $_GET['CURP'];
$Nombre = $_GET['nombre'];
$Paterno = $_GET['paterno'];
$Materno = $_GET['materno'];
$Genero = $_GET['genero'];
$Nacimiento = $_GET['nacimiento'];
$Correo = $_GET['correo'];
$Telefono = $_GET['telefono'];
$Calle = $_GET['calle'];
$Interior = $_GET['interior'];
$Exterior = $_GET['exterior'];
$Colonia = $_GET['colonia'];
$Municipio = $_GET['municipio'];
$Estado = $_GET['estado'];
$TipoEscuela = $_GET['tipoescuela'];
$Escuela = $_GET['escuela'];
$Localidad = $_GET['localidad'];
$Formacion = $_GET['formacion'];
$Promedio = $_GET['promedio'];
$Carrera = $_GET['carrera'];
$Semestre = $_GET['semestre'];
$Opcion = $_GET['opcion'];
$Dia = $_GET['dia'];
$Hora = $_GET['hora'];
$Minuto = $_GET['minuto'];
$Grupo = $_GET['grupo'];
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
$pdf->Cell(30,10,utf8_decode('Comprobante de registro de examen diagnóstico'),0,1,'C');
$pdf->SetFont('Arial','B',13);
$pdf->Ln(10);
$pdf->Cell(0,10,utf8_decode('Datos personales'),0,1,'');
$pdf->SetFont('Arial','',12);
$pdf->Cell(100,10,utf8_decode('CURP: '.$Curp),1,0,'');
$pdf->Cell(100,10,utf8_decode('Nombre: '.$Nombre ),1,1,'');
$pdf->Cell(100,10,utf8_decode('Apellido paterno: '.$Paterno),1,0,'');
$pdf->Cell(100,10,utf8_decode('Apellido materno: '.$Materno),1,1,'');
$pdf->Cell(100,10,utf8_decode('Género: '.$Genero),1,0,'');
$pdf->Cell(100,10,utf8_decode('Fecha de nacimiento: '.$Nacimiento),1,1,'');
$pdf->Cell(100,10,utf8_decode('Correo electrénico: '.$Correo),1,0,'');
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
$pdf->Cell(150,10,utf8_decode('Nombre: '.$Escuela),1,1,'');
$pdf->Cell(200,10,utf8_decode('Localidad: '.$Localidad),1,1,'');
$pdf->Cell(100,10,utf8_decode('Formación técnica: '.$Formacion),1,0,'');
$pdf->Cell(100,10,utf8_decode('Promedio obtenido: '.$Promedio),1,1,'');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(100,10,utf8_decode('Programa académico'),0,1,'');
$pdf->SetFont('Arial','',12);
$pdf->Cell(110,10,utf8_decode('Carrera asignada: '.$Carrera),1,0,'');
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

?>
