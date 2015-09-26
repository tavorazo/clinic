<?php
$id = $_GET['id'];

/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio') or die('Error de seleccion de base: ' . mysql_error() );
/*$select = 'select * from Inventario where id_producto="'.$id.'";';
$resul = $conn->query($select) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);
$imagen = $renglon['imagen'];
unlink($imagen);*/

include('../php/base.php');
include('../php/base3.php');
	$eliminar = 'delete from inventario where id_producto="'.$id.'";';

	if(!$conn->query($eliminar))
		die('Error de consulta: '.mysql_error());
	mysqli_close($conn);
header ("Location: ../almacen.php");


?>
