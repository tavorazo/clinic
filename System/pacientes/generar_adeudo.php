<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
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
	@session_start();
	date_default_timezone_set("Mexico/General");
	
	include("../php/base.php");

	$id_usuario = $_SESSION['u'];


	$id_paciente = $_POST['id_paciente'];
	$concepto = $_POST['concepto'];
	$precio = $_POST['precio'];
	$precio2 = $_POST['precio2'];
			//echo $precio, " ", $precio2;


	$select = "select * from tratamiento_dental where id_tratamiento='".$concepto."';";
	$resul = $conn->query($select) or die ("problema con la solicitud");
	$renglon = $resul->fetch_assoc();

	$concepto2 = $renglon['tratamiento'];
	//			echo $concepto2;
	if($precio2==''){	
		if($precio == 'p1')
			$valor = $renglon['precio_1'];
		if($precio == 'p2')
			$valor = $renglon['precio_2'];
		if($precio == 'p3')
			$valor = $renglon['precio_3'];
		if($precio == 'p4')
			$valor = $renglon['precio_4'];
		if($precio == 'p5')
			$valor = $renglon['precio_5'];
	}else
	$valor = $precio2;
	$insertar = "insert into pago_adeudo (adeudo, descripcion, fecha, id_usuario, id_paciente, fecha_adeudo) values ('$valor', '$concepto2', now(),'$id_usuario', '$id_paciente',now())";

	if(!$conn->query($insertar))
		die('Error de consulta: '.mysqli_error($conn));
	else{
				//echo "Deuda Generada";
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Proceso &eacute;xitoso<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='adeudo.php?id=",$id_paciente,"'>Regresar </a></center></div>";
	}
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=adeudo.php?id_paciente=',$id_paciente,'">';
	mysqli_close ( $conn );
	?>
</body>
</html>