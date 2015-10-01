<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: #2d455f; color: #E6E6E6; }
		a, a:hover{ color: #E6E6E6; text-decoration: none; }
	</style>
</head>
<body>
	<div>
		<?php
		include('../php/base.php');
		//include('../php/base3.php');
		$id = $_POST['id'];
		$curriculum = $_POST['curriculum'];
		$select = 'SELECT * from curriculum where id_usuario="'.$id.'";';
		$resul = $conn->query($select);
		$renglon = $resul->fetch_assoc();
		//$resul = $conn->query($select) or die ("problema con la solicitud");
		//$renglon = mysql_fetch_assoc($resul);
		if($renglon['id_usuario']!='')
			$insertar = "UPDATE curriculum set descripcion='$curriculum' where id_usuario='$id'";
		else
			$insertar = "INSERT into curriculum (id_usuario, descripcion) values ('$id','$curriculum')";
		//if(!$conn->query($insertar))
		if(!$conn->query($insertar))
			die('Error de consulta: '.mysqli_error($conn));
		
		mysqli_close($conn);
		$a = 'lista_usuarios.php';
		echo "<center><br><br><br<a href='",$a,"' > Proceso realizado con &eacute;xito </a>";
		?>
	</div>
	<META HTTP-EQUIV="Refresh" CONTENT="1; URL=lista_usuarios.php">
	</body>
	</html>