<?php
	include('../php/base.php');
	date_default_timezone_set("Mexico/General");

	$id_p = $_GET['id_paciente'];

	$result = $conn->query("select * from pago_adeudo where id_paciente='$id_p'");
	echo "<table  border=1 style='margin-top:100px; '>";

	echo "<tr>
  		  <td style='color:#58ACFA'>No.				</td>
  		  <td style='color:#58ACFA'>Fecha			</td>
          <td style='color:#58ACFA'>Generado por 	</td>
          <td style='color:#58ACFA'>Paciente 		</td>
          <td style='color:#58ACFA'>Descripción		</td>
          <td style='color:#58ACFA'>Costo 			</td>
          <td style='color:#58ACFA'>Pagado			</td>
          <td style='color:#58ACFA'>Saldo			</td>
          <td style='color:#58ACFA'>Imprimir		</td>
  	</tr>";
	while ($row2 = $result->fetch_array()){
		  echo "<tr>";
			echo "<td>",$row2[0],"</td>";
			echo "<td>",$row2[5],"</td>";
				$usuario = $row2[6];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = $conn->query($select) or die ("problema con la solicitud");
				$renglon = $resul->fetch_assoc();
				
			echo "<td> ".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
			
				$paciente = $row2[7];
				$select = 'select * from paciente where id_paciente="'.$paciente.'";';
				$resul = $conn->query($select) or die ("problema con la solicitud");
				$renglon = $resul->fetch_assoc();
				
        $nombre_paciente =$renglon['nombres']." ".$renglon['apellido_paterno']; 
			echo "<td> ".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
			echo "<td> ", $row2['4'],"</td>";
			echo "<td> ", $row2['2'],"</td>";	
			
			echo "	<td>", htmlentities($row2['3']),"</td>
					<td>",$row2['2']-$row2['3']," </td>";
			$deuda = $row2[0];
      
      echo '<td><a href="comprobante_imprimir.php?id_adeudo=',$deuda,'&nombre_paciente=',$nombre_paciente,'" class="prueba2">Imprimir</a></td></tr>';
	}
	echo "<table>";
?>