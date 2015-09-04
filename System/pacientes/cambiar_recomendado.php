<form action="procesar_recomendado.php" method="POST">
<?php
	$id_paciente = $_GET['id_paciente'];
?>
<input type="hidden" value="<?php echo $id_paciente;?>" name="id_paciente">
<label>Introduce número de ficha o id del recomendador</label>
<br><a href="lista_pacientes2.php" target="_blank">Ver lista completa de pacientes</a>
<br><br><input type="text" name="recomendador"><br><br>
<input type="submit" value="Agregar">
</form>