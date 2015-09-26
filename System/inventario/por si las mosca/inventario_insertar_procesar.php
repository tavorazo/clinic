<?php

$a = $_POST['nombre'];
$b = $_POST['serial'];
$c = $_POST['descripcion'];
$d = $_POST['cantidad'];
$e = $_POST['abastecer'];
$f = $_POST['minima'];
$venta = $_POST['venta'];
$pcompra = $_POST['pcompra'];
$pventa = $_POST['pventa'];

$a = htmlspecialchars($a);
$c = htmlspecialchars($c);

/*$conexion = mysql_connect('localhost', 'root', '');

if (!$conexion){
	die('Error de Conexion: ' .mysql_error());
}

	$conexion_base=mysql_select_db('Endoperio');

	if (!$conexion_base) {
		die('Error de seleccion de base: ' .mysql_error());
		echo "no se conecto";
	}
*/
include('../php/base3.php');
//print "Producto:$a<br>Serial: $b<br>Descripcion: $c<br>Cantidad: $d<br>Reabastecible: $e<br>Cantidad Mínima: $f<br>Agregado con éxito";
	$instruccion = "insert into inventario (nombre,numero_serial,descripcion,cantidad,reabastesible,cantidad_minima,ultimo_abastecimiento, venta, precio_compra, precio_venta) values ('$a','$b','$c','$d','$e','$f',now(), '$venta', '$pcompra', '$pventa');";

	if(!mysql_query($instruccion))
		die('Error de consulta: '.mysql_error());
	mysqli_close($conn);

header ("Location: ../almacen.php");

?>
