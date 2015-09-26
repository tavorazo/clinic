<div>
	<?php
		include('../php/base.php');
		include('../php/base3.php');

		$id = $_GET['id'];

		$select = 'select * from paciente where id_paciente="'.$id.'";';
		$resul = $conn->query($select, $dbh) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);
	?>

	Alergias de paciente <?php echo $renglon['nombres'], " ", $renglon['apellido_paterno'],; ?>
	<form action="editar_alergia_proceso.php" method="POST">
		<textarea><?php echo $renglon['alergias']?></textarea>
		<input type="submit" value="Editar">
	</form>
</div>
