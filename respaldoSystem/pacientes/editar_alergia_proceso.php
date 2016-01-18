<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: #2d455f; color: #1C1C1C; }
		a, a:hover{ color: white; text-decoration: none; }
	</style>
</head >
<body>
	<div>
		<?php
		include('../php/base.php');
		$id = $_POST['id'];
		$alergias = $_POST['alergia'];
		$insertar = "update paciente set alergias='$alergias' where id_paciente='$id'";
		if(!$conn->query($insertar))
			die('Error de consulta: '.mysqli_error($conn));
		mysqli_close($conn);
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		$a = 'ficha-paciente.php?id='.$id;
		echo "<a href='",$a,"' > <font color='white'>Regresar </a>";
		
		echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=ficha-paciente.php?id=',$id,'">';
		?>
	</div>
</body>
</html>