<?php
date_default_timezone_set("Mexico/General");
session_start();
$a = $_POST['nombre'];
$b = $_POST['serial'];
$c = $_POST['descripcion'];
//$d = $_POST['cantidad'];
$e = $_POST['abastecer'];
$f = $_POST['minima'];
$venta = $_POST['venta'];
$pcompra = $_POST['pcompra'];
$pventa = $_POST['pventa'];
$tipo = $_POST['tipo_definicion'];
$id_producto=$_POST['id_producto'];
$usuario = $_SESSION['u'];
$a = htmlspecialchars($a);
$c = htmlspecialchars($c);
include('../php/base.php');
$instruccion = "UPDATE inventario set nombre='$a', numero_serial='$b', descripcion='$c', reabastesible='$e', cantidad_minima='$f', venta='$venta', precio_compra='$pcompra', precio_venta='$pventa',tipo_definicion='$tipo' where id_producto='$id_producto'";

//if(!$conn->query($instruccion))
if(!$conn->query($instruccion))
	die('Error de consulta: '.mysql_error());
mysqli_close($conn);
echo '<meta http-equiv="refresh" content="0; url=../almacen.php" />';
?>