<meta charset="UTF-8">
<?php

$nombre = $_POST['nombre'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];

include('../base.php');
include('../base3.php');
include('../base2.php');
$nombre = htmlspecialchars($nombre);
if (!$conexion){
	die('Error de Conexion: ' .mysql_error());
}
	
$insertar = "insert into tratamiento_dental (tratamiento, precio_1, precio_2, precio_3, precio_4, precio_5) values ('$nombre','$p1','$p2', '$p3','$p4','$p5');";

if(!mysql_query($insertar, $conexion))
	die('Error de consulta: '.mysql_error());
	
mysql_close($conexion);
echo'<META HTTP-EQUIV="Refresh" CONTENT="4; URL=../../contabilidad.php">';
 //header('location: ../../contabilidad.php');
 ?>
