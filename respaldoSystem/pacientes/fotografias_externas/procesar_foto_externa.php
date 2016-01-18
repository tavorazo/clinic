<html>
<head>
	<title>Panel Administrador</title>
</head>
<body>
	<?php
	date_default_timezone_set("Mexico/General");
	$a = $_POST['id'];
	$b = $_POST['descripcion'];
	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
	}
	else
		$imagen="";
	include('../../php/base.php');
//include('../../php/base3.php');
	$insertar = "insert into fotografias_externas (id_paciente, fecha_foto, descripcion) values ('$a', now(),'$b')";
	if(!$conn->query($insertar))
		die('Error de consulta: '.mysqli_error($conn));
	/****************************************/

	$select = 'select * from fotografias_externas order by id_foto desc limit 1;';
	$resul = $conn->query($select) or die ("problema con la solicitud");
	$renglon = $resul->fetch_assoc();
	$ficha = $renglon['id_paciente'];
	$a = $renglon['id_foto'];
	$ultimo = $a;
	//print "\n\nsdfasdfasdfasdfasdfa $ultimo";
	rename($imagen,$ultimo);
	$sentencia = "UPDATE fotografias_externas SET nombre_foto='$ultimo' WHERE id_foto='$a';";
	if(!$conn->query($sentencia))
		die('Error de consulta: '.mysqli_error($conn));
	mysqli_close($conn);
	/****************************************/
	$a = '../ficha-paciente.php?id='.$ficha;
	//header('location: ../ficha-paciente.php?id='.$ficha);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
	?>
</body>
</html>