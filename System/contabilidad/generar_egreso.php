<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
	body{  background: steelblue;  color: #1C1C1C; }
	a, a:hover{  color: white;  text-decoration: none; }
	</style>
</head>
<body>
	<?php
	@session_start();
	date_default_timezone_set("Mexico/General");
	
	include("../php/base.php");
	//include("../php/base3.php");
	
	$id_usuario = $_SESSION['u'];
	$tipo 	= $_POST['tipo'];
	$concepto 	= $_POST['concepto'];
	$fecha_egreso = $_POST['fecha_egreso'];
	$cantidad 	= $_POST['cantidad'];
	
	$insertar = "INSERT into egresos_otros (id_usuario, tipo, concepto, cantidad, fecha) values ('$id_usuario', '$tipo','$concepto', '$cantidad', '$fecha_egreso')";
	
	//if(!mysql_query($insertar, $conexion))
	if(!$conn->query($insertar))
		die('Error de consulta: '.mysqli_error());
	
	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';	
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo "<a href='agregar_egreso.php' style='color:#fff'>Regresar </a></center></div>";
	echo'<META HTTP-EQUIV="Refresh" CONTENT="4; URL=agregar_egreso.php">';
	?>
</body>
</html>
