<?php
	include("php/base.php");
	$asunto = $_POST['asunto'];
	$contenido = $_POST['contenido'];
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];


	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
		$imagen=htmlspecialchars($imagen);
		$imagen = "http://wbx.technology/Endoperio/images/".$imagen;
	}
	else
		$imagen="http://wbx.technology/Endoperio/images/feliz.png";

	$remitente = 'endoperio@endoperio.com';
	$mensaje = '	<!doctype html>
	<head><meta charset="utf-8">
		<title>Felicidades</title>
	</head>
	<body>
		
		<img src="'.$imagen.'">
		<br>'.$contenido.'<br>
	</body>
	</html>';


	$encabezados = 'MIME-Version: 1.0' . "\r\n";
	$encabezados .= 'Content-type: text/html; charset=uft-8' . "\r\n";
	$encabezados .= "From: $remitente\nReply-To: $remitente" ;

if($correo==''){
	$pacientes = $conn->query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo from paciente;");
	while ($r_p = $pacientes->fetch_array()){
		$destino = $r_p[4];
		if($destino!=''){
			mail($destino, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;
			echo " Enviado<br>";
		}
	}
	$pacientes = $conn->query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo from usuarios;");
	while ($r_p = $paciantes->fetch_array($pacientes)){
		$destino = $r_p[4];
		if($destino!=''){
			mail($destino, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;
			echo " Enviado<br>";
		}
	}

}else{

	if($correo!=''){
		mail($correo, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;
		echo " Enviado<br>";
	}
}
//header('Location: /panel.php');


?>

<meta http-equiv="Refresh" content="1;url=panel.php">

Enviando...