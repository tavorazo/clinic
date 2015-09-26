 <?php
	@session_start();
	date_default_timezone_set("Mexico/General");

//$semana = date('W', strtotime($fecha));
//Convertir fecha a semana

$year=$_GET['ano'];
$month=$_GET['mes'];
$day=$_GET['dia'];

	include("php/base2.php");
?>

<html>
<head><title></title>
	<style>
	table{	width: 100%; padding: 20px; border: none;}
	td{ 	width: 14%; min-width: 100px; border:none; padding-top:10px; padding-bottom: 10px; text-align: center;}
	a{text-decoration: none; color:#999;}
	a:hover, a:active, a:focus{text-decoration: none; color: #999; cursor: pointer;}
	h1{ font-weight: 100; text-align: center; font-size: 30px; margin-top: 70px; color: #0080FF}
	#label{border: none; position: absolute; top:80px; left: 20px; cursor: pointer;}
	label{color: #000}

		.td_menor_50{
			background: #F7F2E0;

		}

		.td_50{
			background: #FAAC58;
		}
		.td_lleno{
			background: #F78181;
		}

		/*ventanas emergentes */
		.button { display: inline-block; cursor: pointer; }
		.overlay-container { display: none; content: " "; position: absolute; height:100%; width:100%; left: 0; top:0px; background: #000; z-index:10}
		.window-container { display: block; background: #fcfcfc; visibility: hidden; height:500px; position: absolute; margin-top:80px; left:50%; margin-left: -40%; width: 80% ;  overflow-y:scroll;
				border: 5px double #000;
				padding: 15px 20px 20px; opacity: 0; z-index: 3; border-radius: 3px; box-shadow: 0px 0px 30px rgba(0,0,0,0.2); -webkit-transition: 0.4s ease-out; -moz-transition: 0.4s ease-out; -ms-transition: 0.4s ease-out; -o-transition: 0.4s ease-out; transition: 0.4s ease-out;  }
		.win1 , .win2, .win3, .win4, .win5{ -webkit-transform:  scale(1.2); -moz-transform:  scale(1.2); -ms-transform:  scale(1.2); transform:  scale(1.2); }
		.window-container-visible { visibility: visible; opacity: 1; -webkit-transform:  scale(1); -moz-transform:  scale(1); -ms-transform:  scale(1); transform:  scale(1);}
		.close { float: right; z-index: 900; top:0px; right:0;  position: absolute; display: block; width:auto; background: white; border: 1px solid #fff; padding:2px; color: #444; text-align: center; font-size: 12px; 
					-webkit-transition: 0.2s linear; -moz-transition: 0.2s linear; -ms-transition: 0.2s linear; -o-transition: 0.2s linear; transition: 0.2s linear; cursor: pointer; margin-bottom: 10px; margin-top: 10px}
		.close:hover {  border-bottom: 1px solid #EEC932; }
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
echo "<a href='doctores.php'> <label id='label'> << Regresar</a> </label >";
echo "<table border='1' width='100%'>";
echo "<tr><td>Hora</td>
		<td>Lunes -".$lunes."</td>
		<td>Martes -".$martes."</td>
		<td>Mi&eacute;rcoles <br>".$miercoles."</td>
		<td>Jueves -".$jueves."</td>
		<td>Viernes -".$viernes."</td>
		<td>S&aacute;bado -".$sabado."</td>
		<!--td>Domingo -".$domingo."</td-->
		</tr>";


for($i=8;$i<20;$i++){
	echo "<tr>";
	$min='00';

	if($i!=14 && $i!=15){
		for($j=0;$j<4;$j++){
			echo "<td>".$i.":".$min."</td>";
				$contador_doctores=0;
				$result2 = $conn->query("SELECT * FROM usuarios where rol='dentista'");
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM))
					$contador_doctores++;
				$contador_doctores++;//le sumo uno mas por el admin alejandro ya que tiene 2 cuentas

				$contador_lunes = 0;
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$lunes' and hora='$i' and minuto='$min'");
				//print "SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$lunes' and hora='$hour' and minuto='$minuto'";
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
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
			

			echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$lunes."&hora=".$i."&minuto=".$j."' target='_blank'>Revisar</a><br><br>";
$agenda = $conn->query("select * from agenda where ano='$year' and mes='$month' and dia='$lunes' and hora='$i' and minuto like '%$j%';");



while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){
	echo $fila_agenda[2]. ", ";
	}echo "</td>";


				$contador_martes = 0;
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$martes' and hora='$i' and minuto='$min'");
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
					$contador_martes++;
				}
				if($contador_martes==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_martes == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
			echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$martes."&hora=".$i."&minuto=".$j."' target='_blank'>Revisar</a><br><br>";
$agenda = $conn->query("select * from agenda where ano='$year' and mes='$month' and dia='$martes' and hora='$i' and minuto like '%$j%';");



while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){
	echo $fila_agenda[2]. ", ";
	}echo "</td>";
				$contador_miercoles = 0;
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$miercoles' and hora='$i' and minuto='$min'");
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
					$contador_miercoles++;
				}
				if($contador_miercoles==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_miercoles == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
			echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$miercoles."&hora=".$i."&minuto=".$j."' target='_blank'>Revisar</a><br><br>";
$agenda = $conn->query("select * from agenda where ano='$year' and mes='$month' and dia='$miercoles' and hora='$i' and minuto like '%$j%';");



while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){
	echo $fila_agenda[2]. ", ";
	}echo "</td>";
				$contador_jueves = 0;
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$jueves' and hora='$i' and minuto='$min'");
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
					$contador_jueves++;
				}
				if($contador_jueves==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_jueves == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
			echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$jueves."&hora=".$i."&minuto=".$j."' target='_blank'>Revisar</a><br><br>";
$agenda = $conn->query("select * from agenda where ano='$year' and mes='$month' and dia='$jueves' and hora='$i' and minuto like '%$j%';");



while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){
	echo $fila_agenda[2]. ", ";
	}echo "</td>";

				$contador_viernes = 0;
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$viernes' and hora='$i' and minuto='$min'");
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
					$contador_viernes++;
				}
				if($contador_viernes==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_viernes == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
			echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$viernes."&hora=".$i."&minuto=".$j."' target='_blank'>Revisar</a><br><br>";
$agenda = $conn->query("select * from agenda where ano='$year' and mes='$month' and dia='$viernes' and hora='$i' and minuto like '%$j%';");



while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){
	echo $fila_agenda[2]. ", ";
	}echo "</td>";

				$contador_sabado = 0;
				$result2 = $conn->query("SELECT * FROM agenda where ano='$year' and mes='$month' and dia='$sabado' and hora='$i' and minuto='$min'");
				while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
					$contador_sabado++;
				}
				if($contador_sabado==$contador_doctores)
					echo "<td class='td_lleno'>";
				else if($cotador_sabado == (floor($contador_doctores/2)))
					echo "<td class='td_50'>";
				else
					echo "<td class='td_menor_50'>";
			echo "<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$sabado."&hora=".$i."&minuto=".$j."' target='_blank'>Revisar</a><br><br>";
			$agenda = $conn->query("select * from agenda where ano='$year' and mes='$month' and dia='$sabado' and hora='$i' and minuto like '%$j%';");



			while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){

	echo $fila_agenda[2]. ", ";		}echo "</td>";
			echo "<td></td>";//<a href='cita_vista_semana_script.php?ano=".$year."&mes=".$month."&dia=".$domingo."&hora=".$i."&minuto=".$j."'>Revisar</a></td>";
			echo "</tr>";
			$min=$min+15;
		}
	}

}

echo "</table>";
//mysql_close($conection);


?>	
		

			<script>!window.jQuery && document.write(unescape('%3Cscript src="JS/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
			<script type="text/javascript" src="JS/popup.js"></script>
</body>
</html>