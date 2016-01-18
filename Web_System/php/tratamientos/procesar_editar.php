<meta charset="UTF-8">
<?php

$nombre = $_POST['nombre'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$id = $_POST['id'];
include('../base.php');
$nombre = htmlspecialchars($nombre);
if (!$conn){
	die('Error de Conexion: ' .mysqli_error($conn));
}
if ($p5 == NULL) 
	$p5 = 0;

$insertar = "UPDATE tratamiento_dental set tratamiento='$nombre', precio_1='$p1', precio_2='$p2', precio_3='$p3', precio_4='$p4', precio_5='$p5' where id_tratamiento='$id';";
if(!$conn->query($insertar))
	die('Error de consulta: '.mysqli_error($conn));
$conn->close();

echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=lista_precios.php">';
?>
