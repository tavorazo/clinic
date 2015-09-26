<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: steelblue; color: #1C1C1C; }
		a, a:hover{ color: white; text-decoration: none; }
	</style>
</head>
<body>
	<?php
	$id = $_POST['nickname'];
	include('base.php');
	//include('base3.php');
	//include('base2.php');
	$nombre = $_POST['nombre'];
	$paterno = $_POST['a_pat'];
	$materno = $_POST['a_mat'];
	$fecha = $_POST['fecha_nacimiento'];
	$correo = $_POST['correo'];
	$nom_emergencia = $_POST['name_emergencia'];
	$tel_emergencia = $_POST['tel_emergencia'];
	$password = $_POST['contra'];

$insertar = "UPDATE usuarios set nombres = '$nombre', 	apellido_paterno = '$paterno',		apellido_materno = '$materno',
fecha_nacimiento = '$fecha',	name_emergencia = '$nom_emergencia',	tel_emergencia = '$tel_emergencia',
correo = '$correo', 		password = '$password'	 where id_usuario = '$id';";

//if(!mysql_query($insertar))
if(! $conn->query($insertar))
	die('Error de consulta: '.mysqli_error($conn));
else
	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';

echo "Proceso &eacute;xitoso<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
echo "<a href='../panel.php'>Regresar </a></center></div>";
echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">';
//mysqli_close ( $conn );
$conn->close();
?>
</body>
</html>
