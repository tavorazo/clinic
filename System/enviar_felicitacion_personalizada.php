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
		$imagen = "images/".$imagen;
	}
	else
		$imagen="images/feliz.png";


	$remitente = 'endoperio@endoperio.com.mx';
	$mensaje = '	<!doctype html>
	<head><meta charset="utf-8">
		<title>Felicidades</title>
	</head>
	<body>
		
		<img src="'.$imagen.'">
		<br>'.$contenido.'<br>
	</body>
	</html>';

	$mail->setFrom($remitente, 'Endoperio'); 		// Desde 
	$mail->addReplyTo($remitente, 'Endoperio'); 		// Reply
	$mail->Subject = $asunto;						// Asunto
	$mail->msgHTML($mensaje);


if($correo==''){
	$pacientes = $conn->query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo from paciente;");
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
	$pacientes = $conn->query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo from usuarios;");
	while ($r_p = $paciantes->fetch_array($pacientes)){
		$destino = $r_p[4];
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
		$mail->addAddress($destino, $r_p[1].' '. $r_p[2].' '.$r_p[3]);
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