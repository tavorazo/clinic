<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: steelblue; color: #E6E6E6; }
		a, a:hover{ color: #E6E6E6; text-decoration: none; }
	</style>
</head>
<body>
	<div>
		<?php
		include('base.php');
		//include('base3.php');
		$semana = $_POST['semana'];
		$y = $_POST['y'];
		$insertar = "UPDATE nomina_historial set aprobada='1' where semana='$semana' and y='$y'";
		//if(!$conn->query($insertar))
		if(!$conn->query($insertar))
			die('Error de consulta: '.mysqli_error($conn));
		mysqli_close($conn);
		
		$a = '../contabilidad/nomina.php';
		echo "<center><br><br><br<a href='",$a,"' > Proceso realizado con &eacute;xito </a>";
		?>
	</div>
	<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../contabilidad/nomina.php">
</body>
</html>