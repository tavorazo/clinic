<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
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

	<div>

<?php
@session_start();
$id_usuario = $_SESSION['u'];
include('../php/base.php');

$paciente 	= (isset($_POST['paciente']) ? $_POST['paciente'] : NULL);
$sucursal 	= (isset($_POST['sucursal']) ? $_POST['sucursal'] : NULL);
$sucursal_a = (isset($_POST['sucursal_anterior']) ? $_POST['sucursal_anterior'] : NULL);

$query			=	"UPDATE paciente SET id_sucursal=$sucursal WHERE id_paciente=$paciente";
$historial 		= 	"INSERT into historial_tabla_pacientes (id_paciente, id_usuario, estado, fecha) 
					values ('$paciente','$id_usuario','Ha migrado el paciente de sucursal $sucursal_a a $sucursal',now())";

$result=$conn->query($query);
if(!$result)
  die('Error de consulta 1: '.mysqli_error($conn));
else{
	if(!$conn->query($historial))
		die('Error de consulta 2: '.mysqli_error($conn));
	else{
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Migracii&oacute;n con &eacute;xito<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='ficha-paciente.php?id=".$paciente."'>Ir a ficha</a>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../buscar-paciente.php">';
	}
}


?>
	</div>
</body>
</html>