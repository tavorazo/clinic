 <?php
 @session_start();
 date_default_timezone_set("Mexico/General");
//$semana = date('W', strtotime($fecha));
//Convertir fecha a semana
 if(isset($_GET['ano'])) $year=$_GET['ano'];
 if(isset($_GET['mes'])) $month=$_GET['mes'];
 if(isset($_GET['dia'])) $day=$_GET['dia'];
 include("php/base.php");
 ?>
 <html>
 <head>
 	<title>Vista semanal | Endoperio</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 	<style>
 		a{ text-decoration: none; color:#000;}
 		table{ margin:auto; width: 60%; padding: 20px;  }
 		.td_menor_50{ background: #01DF74; }
 		.td_50{ background: #FA8258; }
 		.td_lleno{ background: #DF0101; }
 	</style>
 </head>
 <body>
 	<?php
# Obtenemos el numero de la semana
 	$semana=date("W",mktime(0,0,0,$month,$day,$year));
# Obtenemos el día de la semana de la fecha dada
 	$diaSemana=date("w",mktime(0,0,0,$month,$day,$year));
# el 0 equivale al domingo...
 	if($diaSemana==0)
 		$diaSemana=7;
# A la fecha recibida, le restamos el dia de la semana y obtendremos el lunes
 	$primerDia=date("d-m-Y",mktime(0,0,0,$month,$day-$diaSemana+1,$year));
# A la fecha recibida, le sumamos el dia de la semana menos siete y obtendremos el domingo
 	$ultimoDia=date("d-m-Y",mktime(0,0,0,$month,$day+(7-$diaSemana),$year));
 	$ano = $year;
 	$domingo = date('d', strtotime($ultimoDia));
 	$nuevafecha = strtotime ( '-1 day' , strtotime ( $ultimoDia ) ) ;
 	$sabado = date ( 'd' , $nuevafecha );
 	$nuevafecha = strtotime ( '-2 day' , strtotime ( $ultimoDia ) ) ;
 	$viernes = date ( 'd' , $nuevafecha );
 	$nuevafecha = strtotime ( '-3 day' , strtotime ( $ultimoDia ) ) ;
 	$jueves = date ( 'd' , $nuevafecha );
 	$nuevafecha = strtotime ( '-4 day' , strtotime ( $ultimoDia ) ) ;
 	$miercoles = date ( 'd' , $nuevafecha );
 	$nuevafecha = strtotime ( '-5 day' , strtotime ( $ultimoDia ) ) ;
 	$martes = date ( 'd' , $nuevafecha );
 	$nuevafecha = strtotime ( '-6 day' , strtotime ( $ultimoDia ) ) ;
 	$lunes = date ( 'd' , $nuevafecha );
 	echo "<h1>Agenda de la semana</h1><br>";
 	echo "<a href='doctores.php'> << Regresar </a><br><br>";
 	echo "<table >";
 	echo "<tr><td>Hora</td>
 	<td>Lunes <br>".$lunes."</td>
 	<td>Martes <br>".$martes."</td>
 	<td>Miércoles <br>".$miercoles."</td>
 	<td>Jueves <br>".$jueves."</td>
 	<td>Viernes <br>".$viernes."</td>
 	<td>Sábado <br>".$sabado."</td>
 	<!--td>Domingo <br>".$domingo."</td-->
 	</tr>";
 	for($i=8;$i<20;$i++){
 		echo "<tr>";
 		$min='00';
 		if($i!=14 && $i!=15){
 			for($j=0;$j<4;$j++){
 				echo "<td>".$i.":".$min."</td>";
 				$contador_doctores=0;
 				//$result2 = mysql_query("SELECT * FROM usuarios where rol='dentista'");
				$result2 = $conn->query("SELECT * FROM usuarios where rol='dentista'");
   				//while ($row2 = mysql_fetch_array($result2, MYSQL_NUM))
				while ($row2 = $result2->fetch_array()) 
 					$contador_doctores++;
 				
				$contador_doctores++;//le sumo uno mas por el admin alejandro ya que tiene 2 cuentas
				$contador_lunes = 0;
				//$result2 = mysql_query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$lunes' and hora='$i' and minuto='$min'");
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$lunes' and hora='$i' and minuto='$min'");
				//print "SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$lunes' and hora='$hour' and minuto='$minuto'";
				/*while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {*/ 
				while ($row2 = $result2->fetch_array()) {
					$contador_lunes++;
				}
				if($contador_lunes==$contador_doctores){
					echo "<td class='td_lleno'>";
				}
				else if($cotador_lunes == (floor($contador_doctores/2))){
					echo "<td class='td_50'>";
				}
				else{
					echo "<td class='td_menor_50'>";
				}
				echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$lunes."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
				$contador_martes = 0;
				/*$result2 = mysql_query(*/
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$martes' and hora='$i' and minuto='$min'");
				/*while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {*/ 
				while ($row2 = $result2->fetch_array()) {
					$contador_martes++;
				}


				if($contador_martes==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_martes == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
				echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$martes."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
				$contador_miercoles = 0;
				/*$result2 = mysql_query(*/ 
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$miercoles' and hora='$i' and minuto='$min'");
				/*while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {*/ 
				while ($row2 = $result2->fetch_array()) {
					$contador_miercoles++;
				}
				if($contador_miercoles==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_miercoles == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
				echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$miercoles."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
				$contador_jueves = 0;
				/*$result2 = mysql_query(*/ 
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$jueves' and hora='$i' and minuto='$min'");
				/*while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {*/ 
				while ($row2 = $result2->fetch_array()) {
					$contador_jueves++;
				}
				if($contador_jueves==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_jueves == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
				echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$jueves."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
				$contador_viernes = 0;
				/*$result2 = mysql_query(*/ 
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$viernes' and hora='$i' and minuto='$min'");
				/*while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {*/ 
				while ($row2 = $result2->fetch_array()) {
					$contador_viernes++;
				}
				if($contador_viernes==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_viernes == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
				echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$viernes."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
				$contador_sabado = 0;
				/*$result2 = mysql_query(*/ 
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$sabado' and hora='$i' and minuto='$min'");
				/*while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {*/ 
				while ($row2 = $result2->fetch_array()) {
					$contador_sabado++;
				}
				if($contador_sabado==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_sabado == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
				echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$sabado."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
				
			//echo "<td></td>";//<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$domingo."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
			echo "</tr>";
			$min=$min+15;
			}
		}
	}
echo "</table>";
$conn->close();
//mysql_close($conection);
?>
</body>
</html>