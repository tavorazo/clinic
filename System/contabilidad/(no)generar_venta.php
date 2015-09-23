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
		session_start();
		date_default_timezone_set("Mexico/General");
		
		include("../php/base.php");
		include("../php/base3.php");
		
		$id_usuario = $_SESSION['u'];
		
			$producto 	= $_POST['producto'];
			$cantidad 	= $_POST['cantidad'];

			$paciente 	= $_POST['id_paciente'];
			$no_cliente 	= $_POST['no_cliente'];

			if($no_cliente!='')
				$paciente = 0;

			
			$select  = "select * from inventario where id_producto='".$producto."';";
			$resul	 = mysql_query($select, $dbh) or die ("problema con la solicitud");
			$renglon = mysql_fetch_assoc($resul);
			
			$precio = $renglon['precio_venta'];
			$total  = $precio * $cantidad;

			$cantidad_actual = $renglon['cantidad'];
			
			if($cantidad_actual >= $cantidad){
			
				$insertar = "insert into historial_compras (id_paciente, id_usuario, id_producto, cantidad, precio_unitario, total, fecha) values ('$paciente', '$id_usuario', '$producto','$cantidad', '$precio', '$total', now())";
				$cantidad_actual = $cantidad_actual-$cantidad;
				$actualizar = "update inventario set cantidad='$cantidad_actual', ultimo_abastecimiento = now() where id_producto='$producto'";
				$cantidad = $cantidad*(-1);
				$insertar2 = "insert into Inventario_Historial (id_usuario, id_producto, cantidad, fecha) values ('$id_usuario', '$producto', '$cantidad', now())";

				if(!mysql_query($actualizar, $conexion))
					die('Error de consulta: '.mysql_error());
					
				if(!mysql_query($insertar2, $conexion))
					die('Error de consulta: '.mysql_error());
			
				if(!mysql_query($insertar, $conexion))
					die('Error de consulta: '.mysql_error());
				else
					//echo " realizada con éxito";
					echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
					echo "Compra &eacute;xitosa<br><br><br>";
					echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
					echo "<a href='compra.php?id_paciente=",$paciente,"'>Regresar </a></center></div>";
			
				echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=compra.php?id_paciente=',$paciente,'">';

				mysql_close($conexion);
			}
			else{
				echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
				echo "No se pudo realizar la compra, la cantidad en existencia es de ", ($cantidad_actual), " unidades";	
				echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
				echo "<a href='vender.php' style='color=#fff'>Regresar </a></center></div>";

				echo'<META HTTP-EQUIV="Refresh" CONTENT="4; URL=vender.php">';

			}
	?>
	</body>
</html>