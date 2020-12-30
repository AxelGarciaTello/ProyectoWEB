<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailerMaster/Exception.php';
require 'phpMailerMaster/PHPMailer.php';
require 'phpMailerMaster/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

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

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'proyectosescom2@gmail.com';                     // SMTP username
    $mail->Password   = 'proyectoWeb';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('proyectosescom2@gmail.com', 'Registro diagnostico Escom');
    $mail->addAddress($Correo);     // Add a recipient

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Registro para el examen diagnostico';
    //$mail->Body    = 'El mensaje debe ir escrito aqui xd <b>in bold!</b>';
    $Mensaje = utf8_decode("<center><b>
    <p><h1>IPN ESCOM</h1></p>
    <p><h3>Comprobante de registro de examen diagnostico</h3></p></b></center>
    <p><b>Datos personales</b></p>
    <table width=\"100%\" border=\"1\" cellpadding=\"3\">
      <tr>
        <td>CURP: ".$Curp."</td>
        <td>Nombre: ".$Nombre."</td>
      </tr>
      <tr>
        <td>Apellido paterno: ".$Paterno."</td>
        <td>Apellido materno: ".$Materno."</td>
      </tr>
      <tr>
        <td>Género: ".$Genero."</td>
        <td>Fecha de nacimiento: ".$Nacimiento."</td>
      </tr>
      <tr>
        <td>Correo electronico: ".$Correo."</td>
        <td>Teléfono: ".$Telefono."</td>
      </tr>
    </table>
    <p><b>Dirección</b></p>
    <table width=\"100%\" border=\"1\" cellpadding=\"3\">
      <tr>
        <td>Calle: ".$Calle."</td>
        <td>No. Exterior: ".$Exterior."</td>
        <td>No. Interior: ".$Interior."</td>
      </tr>
      <tr>
        <td>Colonia: ".$Colonia."</td>
        <td>Municipio: ".$Municipio."</td>
        <td>Estado: ".$Estado."</td>
      </tr>
    </table>
    <p><b>Escuela de procedencia</b></p>
    <table width=\"100%\" border=\"1\" cellpadding=\"3\">
      <tr>
        <td>Tipo: ".$TipoEscuela."</td>
        <td>Nombre: ".$Escuela."</td>
      </tr>
    </table>
    <table width=\"100%\" border=\"1\" cellpadding=\"3\">
      <tr>
        <td>Localidad: ".$Localidad."</td>
      </tr>
    </table>
    <table width=\"100%\" border=\"1\" cellpadding=\"3\">
      <tr>
        <td>Formación técnica: ".$Formacion."</td>
        <td>Promedio obtenido: ".$Promedio."</td>
      </tr>
    </table>
    <p><b>Programa academico</b></p>
    <table width=\"100%\" border=\"1\" cellpadding=\"3\">
      <tr>
        <td>Carrera  asignada: ".$Carrera."</td>
        <td>Semestre: ".$Semestre."</td>
        <td>No. de opción: ".$Opcion."</td>
      </tr>
    </table>
    <center><b>
    <p>Tu examen está programado para el día</p>
    <p>".$Dia." a las ".$Hora.":".$Minuto." hrs</p>
    <p>Tu grupo asignado es el grupo  número ".$Grupo."</p>
    </b></center>");
    $mail->Body    = $Mensaje;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Se envio el correo de forma satisfactoria. <br>Revisa en tu bandeja de entrada o en spam';
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
}

?>
