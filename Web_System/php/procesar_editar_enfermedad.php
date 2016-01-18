<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: #2d455f; color: #1C1C1C; }
		a, a:hover{ color: white; text-decoration: none; }
	</style>
</head>
<body>
	<?php
	$a = $_POST['id'];
	$b = $_POST['id_paciente'];
	$c = $_POST['nombre'];
	$d = $_POST['tipo_enfermedad'];
		include("base.php");
		//include("base3.php");
		$select = 'SELECT * from enfermedades where id_enfermedad="'.$a.'";';
		$result = $conn->query($select);
    	$renglon = $result->fetch_assoc();
    	//$resul = $conn->query($select) or die ("problema con la solicitud");
		//$renglon = mysql_fetch_assoc($resul);
		$insertar = "UPDATE enfermedades set nombre_enfermedad='$c', tipo_enfermedad='$d' where id_enfermedad='$a'";
		//if(!$conn->query($insertar))
		if(!$conn->query($insertar))
			die('Error de consulta: '.mysqli_error($conn));
		mysqli_close($conn);
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Modificacion exitosa<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='../pacientes/ficha-paciente.php?id=",$b,"' style='color:white'>Regresar</a></div>";
		
		echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../pacientes/ficha-paciente.php?id=',$b,'">';
		?>
	</body>
	</html>