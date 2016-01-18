<?php
@session_start();
date_default_timezone_set("Mexico/General");
//$semana = date('W', strtotime($fecha));
//Convertir fecha a semana
$year=$_GET['ano'];
$month=$_GET['mes'];
$day=$_GET['dia'];
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
echo "<a href='doctores.php'>Regresar</a><br><br>";
echo "<table border='1' width='100%'>";
echo "<tr><td>Hora</td>
<td>Lunes <br>".$lunes."</td>
<td>Martes <br>".$martes."</td>
<td>Miércoles <br>".$miercoles."</td>
<td>Jueves <br>".$jueves."</td>
<td>Viernes <br>".$viernes."</td>
<td>Sábado <br>".$sabado."</td>
<td>Domingo <br>".$domingo."</td>
</tr>";
for($i=8;$i<20;$i++){
	echo "<tr>";
	$min='00';
	for($j=0;$j<4;$j++){
		echo "<td>".$i.":".$min."</td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$lunes."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$martes."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$miercoles."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$jueves."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$viernes."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$sabado."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "<td><a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$domingo."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
		echo "</tr>";
		$min=$min+15;
	}
}
echo "</table>";
//mysql_close($conection);
?>