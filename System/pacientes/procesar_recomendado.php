<?php

	include('../php/base.php');
	include('../php/base2.php');
	include('../php/base3.php');


	$id_paciente = $_POST['id_paciente'];
	$recomendador = $_POST['recomendador'];

	$update = "update paciente set recomendado_por = '$recomendador' where id_paciente = '$id_paciente'";
		if(!mysqli_query($conn,))
			die('Error de consulta: '.mysql_error());
	mysqli_close($conn);



?>

<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ficha-paciente.php?id=<?php echo $id_paciente; ?>">