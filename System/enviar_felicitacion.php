<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  	

  <title>Listo</title>
	  <link rel="stylesheet" type="text/css" href="css/texto.css"/>

	<style type="text/css" media="screen">

	 body{
	  background: #2d455f;
	  color: #1C1C1C;
	 }
	 a, a:hover{
	  color: white;
	  text-decoration: none;
	 }
	</style>

</head>
<body>

<?php


include('php/base.php');
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer; 												//Inicio de la framework phpMailer

date_default_timezone_set('America/Mexico_City');
$a = date("d-m");

$fecha_cumplea = "-".$a;
$pacientes = $conn->query("SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM paciente WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) ");
$i = 0;

		echo '<br><br><br><center><img src="images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Enviando Correos de Felicitaciones<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='panel.php' > <font color='white'>Regresar </a></center></div>";
          
while ($r_p = $pacientes->fetch_row()){
	echo  $r_p[1]." - ".$r_p[2]." - ".$r_p[3];
	echo " . . .";

	$remitente = 'endoperio@endoperio.com.mx';
	$destino = $r_p[4];
	$asunto = "Feliz cumpleanos te desea Endoperio";
	$mensaje = '
	<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		<title>Felicidades</title>
	</head>
	<body>
		<img src="images/feliz.png" width="100%">
	</body>
	</html>
	';
	$encabezados = 'MIME-Version: 1.0' . "\r\n";
	$encabezados .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$encabezados .= "From: $remitente\nReply-To: $remitente" ;
	
	$mail->setFrom($remitente, 'Endoperio'); 		// Desde 
	$mail->addReplyTo($remitente, 'Endoperio'); 		// Reply
	$mail->Subject = $asunto;						// Asunto
	$mail->msgHTML($mensaje);
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';

	
	if($destino!=''){
		$mail->addAddress($destino, $r_p[1].' '. $r_p[2].' '.$r_p[3]);
		if($destino!=''){
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Enviado<br>";
			}
		}
	}
}
/*usuarios*/
$usuarios = $conn->query("SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM usuarios WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) ");
$i = 0;
          
while ($r_p = $usuarios->fetch_array()){
	echo  $r_p[1]." - ".$r_p[2]." - ".$r_p[3];
	echo " . . .";

	$remitente = 'endoperio@endoperio.com.mx';
	$destino = $r_p[4];
	$asunto = "Feliz cumpleanios te desea Endoperio";
	$mensaje = '
	<html>
	<head>
		<title>Felicidades</title>
	</head>
	<body>
		<img src="images/feliz.png" width="100%">
	</body>
	</html>
	';

	$mail->setFrom($remitente, 'Endoperio'); 		// Desde 
	$mail->addReplyTo($remitente, 'Endoperio'); 		// Reply
	$mail->Subject = $asunto;						// Asunto
	$mail->msgHTML($mensaje);
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';

	
	if($destino!=''){
		$mail->addAddress($destino, $r_p[1].' '. $r_p[2].' '.$r_p[3]);
		if($destino!=''){
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Enviado<br>";
			}
		}
	}
}

echo '<meta http-equiv="Refresh" content="3;url=panel.php">';
?>