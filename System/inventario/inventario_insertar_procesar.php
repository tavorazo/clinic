<?php
date_default_timezone_set("Mexico/General");

	session_start();

$a = $_POST['nombre'];
$b = $_POST['serial'];
$c = $_POST['descripcion'];
$d = $_POST['cantidad'];
$e = $_POST['abastecer'];
$f = $_POST['minima'];
$venta = $_POST['venta'];
$pcompra = $_POST['pcompra'];
$pventa = $_POST['pventa'];
$tipo = $_POST['tipo_definicion'];

$usuario = $_SESSION['u'];

$a = htmlspecialchars($a);
$c = htmlspecialchars($c);

include('../php/base.php');
include('../php/base3.php');
//print "Producto:$a<br>Serial: $b<br>Descripcion: $c<br>Cantidad: $d<br>Reabastecible: $e<br>Cantidad Mínima: $f<br>Agregado con éxito";
	$instruccion = "insert into inventario (nombre,numero_serial,descripcion,cantidad,reabastesible,cantidad_minima,ultimo_abastecimiento, venta, precio_compra, precio_venta,tipo_definicion) values ('$a','$b','$c','$d','$e','$f',now(), '$venta', '$pcompra', '$pventa','$tipo');";


		$select = 'select * from inventario where numero_serial="'.$b.'";';
		//echo $select;
		if(!mysqli_query($conn,))
			die('Error de consulta: '.mysql_error());
		$resul = mysqli_query($conn,) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);

$producto = $renglon['id_producto'];

$total = $d * $pcompra;
$instruccion2 = "insert into inventario_historial_entradas (id_producto,cantidad,total_compra,id_usuario,fecha ) values ('$producto', '$d', '$total', '$usuario', now());";


	if(!mysqli_query($conn,))
		die('Error de consulta: '.mysql_error());

	mysqli_close($conn);
	echo '<meta http-equiv="refresh" content="0; url=../almacen.php" />';
//header ("location: ../almacen.php");

?>