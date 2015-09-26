<?php
	@session_start();
	date_default_timezone_set("Mexico/General");
$a = $_POST['id'];
$b = $_POST['cantidad'];
$c = $_POST['nueva_cantidad'];
if($c=='')
	$c=0;
$usuario = $_SESSION['u'];
$total = $b + $c;


include('../php/base3.php');

	$insertar = "update inventario set cantidad='$total', ultimo_abastecimiento = now() where id_producto='$a'";
	$insertar2 = "insert into Inventario_Historial (id_usuario, id_producto, cantidad, fecha) values ('$usuario', '$a', '$c', now())";


if(!mysql_query($insertar))
	die('Error de consulta: '.mysql_error());
	
if(!mysql_query($insertar2))
	die('Error de consulta: '.mysql_error());
mysqli_close($conn);

header ("Location: ../almacen.php");

?>