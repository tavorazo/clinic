
<?php
/*$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/

include('../php/base.php');
$contador = 0;
	
	$doctor = $row2[0];
	$result2 = $conn->query("select * from agenda where confirmacion='0';");
	//$doctores = $conn->query("select * from usuarios where rol='dentista';");
	$n=0;
	$n2=0;
	//while ($row3 = mysql_fetch_array($result2, MYSQL_NUM)){
	while ($row3 = $result2->fetch_row()){
		$d = $row3[1];
		$p = $row3[2];
		$doctor = $conn->query("select * from usuarios where id_usuario='$d';");
		$paciente = $conn->query("select * from paciente where id_paciente='$p';");
		$ano=$row3[3];
		$dia=$row3[5];
		$mes=$row3[4];
		$hora=$row3[6];
		$minuto=$row3[7];
			while ($row_doctor = $doctor->fetch_row()){
				$docid=$row_doctor[0];
			}
			while ($row_paciente = $paciente->fetch_row()){
				$paciente_nombre = $row_paciente[1];
				$paciente_apellido = $row_paciente[2];
				$paciente_apellido2 = $row_paciente[3];
				$telefono = $row_paciente[11];
				$celular = $row_paciente[12];
			}
		echo '<form action="confirmar.php" method="POST">';
		echo "doctor ";
	
			echo "<select name='doctor'>";
			$doctores = $conn->query("select * from usuarios where rol='dentista';");
			//while ($row_doctores = mysql_fetch_array($doctores, MYSQL_NUM)){
			while ($row_doctores = $doctores->fetch_row()){
				$disdoc=$row_doctores[0];
				$dispo= $conn->query("select * from agenda where ano = '$ano' and mes='$mes' and dia='$dia' and minuto='$minuto' and hora='$hora' and id_usuario='$disdoc' and confirmacion='1';");
				//echo "<option>select * from agenda where ano = '$ano' and mes='$mes' and dia='$dia' and minuto='$minuto' and hora='$hora' and id_usuario='$disdoc' and confirmacion='1';</option>";
				//while ($row_dispo = mysql_fetch_array($dispo, MYSQL_NUM)){
				while ($row_dispo = $dispo->fetch_row()){
					$dispo = 1;
					//echo "<option>asdfdfsadf</option>";
				}
				if($dispo=='1')
						echo "<option value='",$row_doctores[0],"'>",$row_doctores[1]," ",$row_doctores[2]," ",$row_doctores[3]," No disponible</option>";
				else 
						echo "<option value='",$row_doctores[0],"'>",$row_doctores[1]," ",$row_doctores[2]," ",$row_doctores[3]," disponible</option>";
				$dispo = 0;
			}		
			echo "</select>";
		echo "<br>Paciente: ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
		echo "<br>Telefono: ",$telefono;
		echo "<br>Celular: ", $celular;
		echo "<br>Fecha (aaaa/mm/dd): ", $row3[3],"/",$row3[4],"/",$row3[5]," a las ", $row3[6],":", $row3[7];
		echo "<br>Si no se desea cambiar la hora no seleccionar nada<br>";
		echo '<select name="hora_">';
		echo '	<option value="-1">Cambiar hora</option>';
		echo '	<option value="8">08</option>';
		echo '	<option value="9">09</option>';
		echo '	<option value="10">10</option>';
		echo '	<option value="11">11</option>';
		echo '	<option value="12">12</option>';
		echo '	<option value="13">13</option>';
		echo '	<option value="14">14</option>';
		echo '	<option value="15">15</option>';
		echo '	<option value="16">16</option>';
		echo '	<option value="17">17</option>';
		echo '	<option value="18">18</option>';
		echo '	<option value="19">19</option>';
		echo '</select>';
		echo ':';
		echo '<select name="minuto_">';
		echo '	<option value="-1">Cambiar minutos</option>';
		echo '	<option value="00">00</option>';
		echo '	<option value="15">15</option>';
		echo '	<option value="30">30</option>';
		echo '	<option value="45">45</option>';
		echo '</select>';
		echo '<br>Observacion: ',$row3[10];
			/*<input type="hidden" value="<?php echo $dia; ?>" name="dia">
			<input type="hidden" value="<?php echo $n_dia; ?>" name="n_dia">
			<input type="hidden" value="<?php echo $mes_n; ?>" name="mes">
			<input type="hidden" value="<?php echo $ano; ?>" name="ano">*/
		echo '<input type="hidden" value="',$row3[0],'" name="cita">';
			/*<br>
			<input type="submit" value="Crear Cita">';*/
		
		echo "<br><input type='submit' value='Confirmar cita'>";
		echo "<br><a href='cancelar.php?id=",$row3[0],"'>Cancelar cita</a>";
		echo "<hr>";
		echo "</form>";
	}

?>

<br>

