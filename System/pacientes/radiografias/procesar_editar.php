<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
	<style type="text/css" media="screen">
	body{
		background: steelblue;
		color: #1C1C1C;
	}
	a, a:hover{
		color: white;
		text-decoration: none;
	}
	
	</style>
</head >
<body>
	<?php
	$a = $_POST['id'];
	$b = $_POST['id_paciente'];
	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
	}
	else
		$imagen="";
	include('../../php/base.php');
	$select = 'select * from radiografias where id_foto="'.$a.'";';
	//$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
	$resul = $conn->query($select);
	//$renglon = mysql_fetch_assoc($resul);
	$renglon = $resul->fetch_assoc();
	$ficha = $renglon['id_paciente'];
	if($imagen!="")
		$ultimo = $renglon['id_foto'];
	unlink($renglon['nombre_foto']);
	rename($imagen,$ultimo);
	$insertar = "update radiografias set nombre_foto='$ultimo' where id_foto='$a'";
	//if(!mysql_query($insertar, $conexion))
	if(!$conn->query($insertar))
		die('Error de consulta: '.mysqli_error($conn));
	$conn->close();
	$a = '../ficha-paciente.php?id='.$ficha;
		//header('location: ../ficha-paciente.php?id='.$ficha);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
	?>
</body>
</html>