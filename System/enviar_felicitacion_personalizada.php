<?php
	include("php/base.php");
	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer; 												//Inicio de la framework phpMailer

	$asunto = $_POST['asunto'];
	$contenido = $_POST['contenido'];
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];


	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
		$imagen=htmlspecialchars($imagen);
		//$imagen = "images/".$imagen;
	}
	else
		$imagen="images/feliz.png";


	$remitente = 'endoperio@endoperio.com.mx';
	$mensaje = '	<!doctype html>
	<head><meta charset="utf-8">
		<title>Felicidades</title>
	</head>
	<body body style="font-family: Arial, Helvetica, sans-serif;">
		
		<img src="'.$imagen.'" width="100%">
		<br>'.$contenido.'<br>
	</body>
	</html>';

	$mail->setFrom($remitente, 'Endoperio'); 		// Desde 
	$mail->addReplyTo($remitente, 'Endoperio'); 		// Reply
	$mail->Subject = $asunto;						// Asunto
	$mail->msgHTML($mensaje);
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';


if($correo==''){
	$pacientes = $conn->query("SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM paciente WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) ");
	while ($r_p = $pacientes->fetch_array()){
		$destino = $r_p[4];
		$mail->addAddress($destino, $r_p[1].' '. $r_p[2].' '.$r_p[3]);
		if($destino!=''){
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Enviado<br>";
			}
		}
	}
	$usuarios = $conn->query("SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM usuarios WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) ");
	while ($r_p = $usuarios->fetch_array()){
		$destino = $r_p[4];
		$mail->addAddress($destino, $r_p[1].' '. $r_p[2].' '.$r_p[3]);
		if($destino!=''){
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Enviado<br>";
			}
		}
	}

}else{

	if($correo!=''){
		$mail->addAddress($correo, ' ');
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Enviado<br>";
		}
	}
}
//header('Location: /panel.php');


?>

<meta http-equiv="Refresh" content="1;url=panel.php">

Enviando...