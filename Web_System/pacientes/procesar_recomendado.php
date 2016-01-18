<?php

	include('../php/base.php');

	$id_paciente = $_POST['id_paciente'];
	$recomendador = $_POST['recomendador'];

	$update = "update paciente set recomendado_por = '$recomendador' where id_paciente = '$id_paciente'";
		try {
			$conn->query($update);
		} catch (Exception $e) {
			 print "Error!: " . $e->getMessage() . "</br>"; 
		}
	mysqli_close ( $conn );

?>

<META HTTP-EQUIV="Refresh" CONTENT="0; URL=ficha-paciente.php?id=<?php echo $id_paciente; ?>">