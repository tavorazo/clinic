<?php
$id = $_GET['id'];
include('../php/base.php');
$eliminar = 'DELETE from inventario where id_producto="'.$id.'";';
//if(!$conn->query($eliminar))
if(!$conn->query($eliminar))
	die('Error de consulta: '.mysqli_error());
mysqli_close($conn);
header ("Location: ../almacen.php");
?>
