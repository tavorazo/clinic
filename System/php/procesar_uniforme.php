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
	
	include("base.php");
	//include("base3.php");
	
	$id_usuario = $_SESSION['u'];
	$comprador = $_POST['usuario'];
	$uniforme = $_POST['uniforme'];
	$precio = $_POST['precio'];
	$tipo_pago = $_POST['pago'];
	$descripcion_pago = $_POST['descripcion'];
	$s = date(W);
	$y = date(Y);
	$insertar_historial = "INSERT into historial_uniformes (id_usuario, id_comprador, uniforme_descripcion, precio, tipo_pago, descripcion_pago, fecha, semana, y) values ('$id_usuario', '$comprador', '$uniforme', '$precio', '$tipo_pago', '$descripcion_pago', now(),'$s','$y')";
	if(!$conn->query($insertar_historial))
		die('Error de consulta: '.mysqli_error($conn));
	//if(!$conn->query($insertar2))
		//die('Error de consulta: '.mysql_error());
	$insertar_recibo = "INSERT into recibos (cantidad, descripcion, total, fecha, comprador, vendedor) values ('1','$uniforme','$precio',now(),'$comprador','$id_usuario')";
	if(!$conn->query($insertar_recibo))
		die('Error de consulta: '.mysqli_error($conn));
	$id_recibo = $conn->insert_id;
	//if(!$conn->query($recibo))
		//die('Error de consulta: '.mysql_error());
	//$id_recibo = $conn->insert_id;

	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "Compra &eacute;xitosa<br><br><br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo "<a href='lista_usuarios.php' style='color:#fff'>Regresar </a></center></div>";
	echo '<center><div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo '<a href="../php/imprimir_recibo.php?id_recibo=',$id_recibo,'" style="color:white">Imprimir Recibo</a></div></center>';
	
				//echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../panel.php">';
	//mysqli_close($conn);
	$conn->close();

	?>
</body>
</html>