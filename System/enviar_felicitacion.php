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
include('mail.php'); // Archivo con la función que usa cURL para enviar el correo

@session_start();
$sucursal = $_SESSION['sucursal'];

date_default_timezone_set('America/Mexico_City');
$a = date("d-m");

$felicitacion_result =  $conn->query("SELECT * from felicitacion");
$felicitacion = $felicitacion_result->fetch_assoc();

$fecha_cumplea = "-".$a;
$pacientes = $conn->query(($sucursal == 0) ? "SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM paciente WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) " : "SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM paciente WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) AND id_sucursal=$sucursal");
$i = 0;

		echo '<br><br><br><center><img src="images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Enviando Correos de Felicitaciones<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='panel.php' > <font color='white'>Regresar </a></center></div>";
          
while ($r_p = $pacientes->fetch_row()){
	echo  $r_p[1]." ".$r_p[2]." ".$r_p[3];
	echo " . . . <br>";

	$remitente = $felicitacion['remitente'];
	$destino = $r_p[4];
	$asunto = $felicitacion['titulo'];
	$mensaje = '	<html>
		<p style="font-size:15px;">'.$felicitacion['mensaje'].'<p><br><br><hr><br>
		<img style="display:block;" class="img1" src="http://www.endoperio.com.mx/System/images/'.$felicitacion['img'].'" width="100%"/>
	</html>';
	$encabezados = 'MIME-Version: 1.0' . "\r\n";
	$encabezados .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$encabezados .= "From: $remitente\nReply-To: $remitente" ;

	
	if($destino!=''){
		send_mail($remitente,$destino, $asunto, $mensaje); //Función contenida en mail.php
	}
}
/*usuarios*/
$usuarios = $conn->query("SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno, correo FROM usuarios WHERE DAY(  `fecha_nacimiento` ) = DAY( NOW( ) )  AND MONTH(  `fecha_nacimiento` ) = MONTH( NOW( ) ) ");
$i = 0;
          
while ($r_p = $usuarios->fetch_array()){
	echo  $r_p[1]." - ".$r_p[2]." - ".$r_p[3];
	echo " . . . <br>";

	$remitente = $felicitacion['remitente'];
	$destino = $r_p[4];
	$asunto = $felicitacion['titulo'];
	$mensaje = '	<html>
		<p style="font-size:15px;">'.$felicitacion['mensaje'].'<p><br><br><hr><br>
		<img style="display:block;" class="img1" src="http://www.endoperio.com.mx/System/images/'.$felicitacion['img'].'" width="100%"/>
	</html>';
	
	if($destino!=''){
		send_mail($remitente,$destino, $asunto, $mensaje); //Función contenida en mail.php
	}
}

echo '<meta http-equiv="Refresh" content="3;url=panel.php">';
?>