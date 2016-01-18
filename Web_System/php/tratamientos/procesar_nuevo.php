<meta charset="UTF-8">
<?php

$nombre = $_POST['nombre'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];

include('../base.php');
$nombre = htmlspecialchars($nombre);
if (!$conn){
	die('Error de Conexion: ' .mysqli_error());
}	
$sql = "INSERT into tratamiento_dental (tratamiento, precio_1, precio_2, precio_3, precio_4, precio_5) values ('$nombre','$p1','$p2', '$p3','$p4','$p5');";

if(!$conn->query($sql))
	die('Error de consulta: '.mysqli_error());
	
$conn->close();
echo "<h2 style='text-align:center; font-size:18'> Agregado con éxito</h2>";
echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../../contabilidad.php">';
 //header('location: ../../contabilidad.php');
 ?>
