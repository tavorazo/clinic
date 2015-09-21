<?php
		include('../base.php');
	$id = $_GET['id'];
	$sql = "delete from tratamiento_dental where id_tratamiento='$id';";
	if(!$conn->query($sql))
		die('Error de consulta: '.mysql_error());
		
	$conn->close();
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=lista_precios.php">';
?>