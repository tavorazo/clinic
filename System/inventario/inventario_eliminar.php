<?php
$id = $_GET['id'];
include('../php/base.php');
$eliminar = 'DELETE from inventario where id_producto="'.$id.'";';
//if(!mysql_query($eliminar, $dbh))
if(!$conn->query($eliminar))
	die('Error de consulta: '.mysqli_error());
$conn->close();
//mysql_close($conexion);
header ("Location: ../almacen.php");
?>
