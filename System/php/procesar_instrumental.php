<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Listo</title>
	  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>

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

</head>
<body>
	<?php
		@session_start();
		date_default_timezone_set("Mexico/General");
		
		include("base.php");
		
		
		$id_usuario = $_SESSION['u'];
		$comprador = $_POST['usuario'];
		$diplomado = $_POST['diplomado'];
		$precio = $_POST['precio'];
		$tipo_pago = $_POST['pago'];
		$descripcion_pago = $_POST['descripcion'];
		$s = date(W);
		$y = date(Y);

				$insertar2 = "insert into historial_instrumental (id_usuario, id_comprador, diplomado_descripcion, precio, tipo_pago, descripcion_pago, fecha, semana, y) values ('$id_usuario', '$comprador', '$diplomado', '$precio', '$tipo_pago', '$descripcion_pago', now(),'$s','$y')";

				if(!mysqli_query($conn,))
					die('Error de consulta: '.mysql_error());

				$recibo = "insert into recibos (cantidad, descripcion, total, fecha, comprador, vendedor) values ('1','$diplomado','$precio',now(),'$comprador','$id_usuario')";
				if(!mysqli_query($conn,))
					die('Error de consulta: '.mysql_error());
				$id_recibo = mysql_insert_id();
					//echo " realizada con éxito";
					echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
					echo "Compra &eacute;xitosa<br><br><br>";
					echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
					echo "<a href='../panel.php'>Regresar </a></center></div>";
					echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
					echo '<a href="../php/imprimir_recibo.php?id_recibo=',$id_recibo,'" style="color:white">Imprimir Recibo</a></div>';
			
				//echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../panel.php">';

				mysqli_close($conn);
	?>
	</body>
</html>