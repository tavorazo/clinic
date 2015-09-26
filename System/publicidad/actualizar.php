<?php
include('../php/base.php');
//include('../php/base3.php');
//include('../php/base2.php');
$desactivar_todos = "UPDATE publicidad set activado='0', lugar='0';";
//if(!mysql_query($desactivar_todos))
if(!$conn->query($desactivar_todos))
	die('error: '.mysqli_error($conn));
$costado = $_POST['costado'];
$abajo = $_POST['abajo'];
$activar1 = "UPDATE publicidad set activado='1', lugar='1' where id_publicidad='$costado';";
$activar2 = "UPDATE publicidad set activado='1', lugar='2' where id_publicidad='$abajo';";
//if(!mysql_query($activar1))
if(!$conn->query($activar1))
	die('error: '.mysqli_error($conn));
//if(!mysql_query($activar2))
if(!$conn->query($activar2))
	die('error: '.mysqli_error($conn));
//mysqli_close($conn);
$conn->close();
echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=seleccionar_publicidad.php">
Cambio con éxito';
?>