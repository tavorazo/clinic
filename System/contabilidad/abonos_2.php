<?php
   date_default_timezone_set("Mexico/General");

/*Aqui meter script*/
	include('../php/base.php');
	include('../php/base2.php');
	include('../php/base3.php');
			$deuda= $_GET['id_adeudo'];
			$nombre_paciente = $_GET['nombre_paciente'];
			
			$semana_b = $_GET['semana_b'];
			$y = $_GET['y'];
			
			$fecha = $_GET['fecha'];

			echo "<h1> Pagos recibidos por ",$nombre_paciente," </h1>";
			
			if($semana_b=='')
				$result_pagos = mysql_query("select * from pagos_historia where id_tipo='3' and id_adeudo='$deuda' and  fecha like '%$fecha%'");
			else
				$result_pagos = mysql_query("select * from pagos_historia where id_tipo='3' and  id_adeudo='$deuda' and  semana='$semana_b' and y='$y'");
			while ($row3 = mysql_fetch_array($result_pagos, MYSQL_NUM)){
				$usuario = $row3[7];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);
				echo "<br><br><hr> <i>Pago recibido por: ".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."<br>";
				echo "Cantidad: ", $row3[4], "<br>";
				
				$tipo = $row3[1];
				$select = 'select * from pagos_tipo where id_tipo="'.$tipo.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);
				echo "Tipo de pago: ", $renglon['descripcion'], "<br>";
				echo "Descripci&oacute;n del pago: ", $row3[6], "<br>";
				echo "Fecha y hora: ", $row3[5],"<hr><br>";
			}
?>