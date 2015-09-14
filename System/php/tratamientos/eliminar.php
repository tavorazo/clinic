<?php
		include('../base.php');
		include('../base3.php');
		include('../base2.php');
	$id = $_GET['id'];
	$insertar = "delete from tratamiento_dental where id_tratamiento='$id';";

	if(!mysql_query($insertar, $conexion))
		die('Error de consulta: '.mysql_error());
		
	mysql_close($conexion);
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=lista_precios.php">';
?>