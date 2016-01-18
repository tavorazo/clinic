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
</head >
<body>
	<div>
		<?php
//@session_start();
//$id_usuario = $_SESSION['u'];
		if($_FILES['imagen']['name']!=""){
			copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
			$imagen=$_FILES['imagen']['name'];
			$imagen=htmlspecialchars($imagen);
		}
		$id_paciente = $_POST['id_paciente'];
		$p = $_POST['p'];
		include('../../php/base.php');
		include('../../php/base3.php');	
		if($imagen!=''){
			$select = "select * from paciente where id_paciente='$id_paciente';";
			$resul = $conn->query($select) or die ("problema con la solicitud");
			//$renglon = mysql_fetch_assoc($resul);
			$renglon = $resul->fetch_assoc();
			$imagen_vieja = $renglon['foto_ingreso'];
			if($imagen_vieja!='predeterminado.png')
				unlink($imagen_vieja);
			rename($imagen,$id_paciente);
			$sentencia = "UPDATE paciente SET foto_ingreso='$id_paciente' WHERE id_paciente='$id_paciente';";
			if(!$conn->query($sentencia))
				die('Error de consulta: '.mysqli_error($conn));
			mysqli_close($conn);
		}
		$cadena = '../../fotos/fotos.php?p='. $p;
//header($cadena);
//echo $cadena;
		?>
		<meta http-equiv="Refresh" content="1;<?php echo $cadena; ?>">
		<a href="<?php echo $cadena; ?>">Regresar</a>
	</body>
	</html>
