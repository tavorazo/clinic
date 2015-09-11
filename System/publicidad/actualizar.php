<?php

	include('../php/base.php');
	include('../php/base3.php');
	include('../php/base2.php');

	$desactivar_todos = "update publicidad set activado='0', lugar='0';";

	if(!mysqli_query($conn,))
		die('error: '.mysql_error());

	$costado = $_POST['costado'];
	$abajo = $_POST['abajo'];

	$activar1 = "update publicidad set activado='1', lugar='1' where id_publicidad='$costado';";
	$activar2 = "update publicidad set activado='1', lugar='2' where id_publicidad='$abajo';";

	if(!mysqli_query($conn,))
		die('error: '.mysql_error());

	if(!mysqli_query($conn,))
		die('error: '.mysql_error());

		mysqli_close($conn);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=seleccionar_publicidad.php">
		Cambio con éxito';

?>