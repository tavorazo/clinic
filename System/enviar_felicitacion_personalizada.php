<?php
	@session_start();
	$sucursal = $_SESSION['sucursal'];
	include("php/base.php");
	include("mail.php"); // Archivo con la función que usa cURL para enviar el correo

	$asunto = $_POST['asunto'];
	$contenido = $_POST['contenido'];
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];

	$felicitacion_result =  $conn->query("SELECT * from felicitacion");
	$felicitacion = $felicitacion_result->fetch_assoc();


	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
		$imagen=htmlspecialchars($imagen);
		//$imagen = "images/".$imagen;
	}
	else
		$imagen="images/feliz.png";


	$remitente = $felicitacion['remitente'];
	$mensaje = '	<html>
		<p style="font-size:15px;">'.$contenido.'<p><br><br><hr><br>
		<img style="display:block;" class="img1" src="http://www.endoperio.com.mx/System/'.$imagen.'" width="100%"/>
	</html>';


if($correo==''){
	$pacientes = $conn->query(($sucursal == 0) ? "SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM paciente WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) " :  "SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM paciente WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) AND id_sucursal=$sucursal");
	while ($r_p = $pacientes->fetch_array()){
		$destino = $r_p[4];
		if($destino!=''){
			send_mail($remitente,$destino, $asunto, $mensaje);
		}
	}
	$usuarios = $conn->query(($sucursal == 0) ? "SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM usuarios WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) " : "SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM usuarios WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) AND id_sucursal=$sucursal");
	while ($r_p = $usuarios->fetch_array()){
		$destino = $r_p[4];
		if($destino!=''){
			send_mail($remitente,$destino, $asunto, $mensaje);
		}
	}

}else{

	if($correo!=''){
		send_mail($remitente,$correo, $asunto, $mensaje);
	}
}
//header('Location: /panel.php');


?>

<meta http-equiv="Refresh" content="1;url=panel.php">

Enviando...