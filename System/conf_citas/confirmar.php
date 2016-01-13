<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
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
	@session_start();
	
	$a = $_GET['id'];
	include('../php/base.php');
	
	require '../phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;							// Inicia phpMailer

	$insertar = "update agenda set confirmacion='1' where id_cita='$a'";
	if(!$conn->query($insertar))
		die('Error de consulta 1: '.mysql_error());
	
	$datos = "select * from agenda where id_cita='$a' ";
	$resul = $conn->query($datos) or die ("problema con la solicitud");
	$renglon = $resul->fetch_assoc();
	$idpaciente=$renglon['id_paciente'];
	$hora = $renglon['hora'];
	$min = $renglon['minuto'];
	$ano = $renglon['ano'];
	$mes = $renglon['mes'];
	$dia = $renglon['dia'];
	
	$paciente = "select * from paciente where id_paciente=$idpaciente";
	$resultado2 = $conn->query($paciente);
	$renglonpaciente = $resultado2->fetch_assoc();
	$nombre = $renglonpaciente['nombres'];
	$apellido = $renglonpaciente['apellido_paterno'];
	$apellido2 = $renglonpaciente['apellido_materno'];
	$correo = $renglonpaciente['correo'];
	
	$mail->setFrom('endoperio@endoperio.com.mx', 'Endoperio');		// Desde
	$mail->addReplyTo('endoperio@endoperio.com.mx', 'Endoperio');	// Respuesta
	$mail->addAddress($correo, $nombre.' '.$apellido.' '.$apellido2); // Para
//$para == $correo;
	
// Asunto
	$titulo = 'Tu cita ha sido confirmada';
	$mail->Subject = $titulo;     									// Asunto
	
// Cuerpo o mensaje
	$mensaje = '
	<html>
	<head>
	<title>Confirmaci&oacute;n de cita Endoperio, Clinica Dental</title>
	</head>
	<body>
	Hola '.$nombre.' '.$apellido.' '.$apellido2.'<br><br>
	Tu cita ha sido confirmada para la fecha:<br>
	El dia: '.$dia.' del mes: '.$mes.' del a&ntilde;o en curso <br>
	Alas :  '.$hora.':'.$min.'<br>
	<br>
	Te esperamos 15 minutos antes<br><br>
	<hr>
	Endoperio
	</body>
	</html>
	';
	$mail->msgHTML($mensaje);
//echo $mensaje;
	
// enviamos el correo!
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Enviado!";
	}
	
	mysqli_close ( $conn );
	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "Cita confirmada con exito<br><br><br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo "<a href='../panel.php' > <font color='white'>Regresar </a></center></div>";
	?>
	<!--Cita confirmada <a href='ver_citas.php'>Regresar</a-->
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">
		
	</body>
	</html>