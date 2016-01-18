<?php
	$id_paciente = $_GET['id_paciente'];
	$enlace = "ficha-paciente.php?id=".$id_paciente;
	include("../+/head2.php");
?>
	<form action="procesar_recomendado.php" method="POST" style="margin:auto" >
		<input type="hidden" value="<?php echo $id_paciente;?>" name="id_paciente">
		<label>Introduce número de ficha o id del recomendador</label>
		<br><a href="lista_pacientes2.php" target="_blank">Ver lista completa de pacientes</a>
		<br><br><input type="text" name="recomendador" placeholder="nuevo_recomendado_" style="background:#fafafa; height:40px; width:100%"><br><br>
		<input type="submit" value="Agregar">
	</form>

<?php 	include("../+/footer2.php"); ?>