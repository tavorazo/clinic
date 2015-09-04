<html>
<head>
<title>

</title>

<style>

	table a{
		color:red;
	}

</style>

</head>
<body>


<?php
error_reporting(0);
 date_default_timezone_set("Mexico/General");
echo '<a href="panel.php">Regresar</a>';
$mes = $_GET['mes'];
$ano = $_GET['ano'];
$mes2 = $_GET['mes'];
$dia2 = $_GET['dia'];

$tipo_semana = 1;
$tipo_mes = 1;

$MESCOMPLETO[1] = 'Enero';
$MESCOMPLETO[2] = 'Febrero';
$MESCOMPLETO[3] = 'Marzo';
$MESCOMPLETO[4] = 'Abril';
$MESCOMPLETO[5] = 'Mayo';
$MESCOMPLETO[6] = 'Junio';
$MESCOMPLETO[7] = 'Julio';
$MESCOMPLETO[8] = 'Agosto';
$MESCOMPLETO[9] = 'Septiembre';
$MESCOMPLETO[10] = 'Octubre';
$MESCOMPLETO[11] = 'Noviembre';
$MESCOMPLETO[12] = 'Diciembre';

$MESABREVIADO[1] = 'Ene';
$MESABREVIADO[2] = 'Feb';
$MESABREVIADO[3] = 'Mar';
$MESABREVIADO[4] = 'Abr';
$MESABREVIADO[5] = 'May';
$MESABREVIADO[6] = 'Jun';
$MESABREVIADO[7] = 'Jul';
$MESABREVIADO[8] = 'Ago';
$MESABREVIADO[9] = 'Sep';
$MESABREVIADO[10] = 'Oct';
$MESABREVIADO[11] = 'Nov';
$MESABREVIADO[12] = 'Dic';

$SEMANACOMPLETA[0] = 'Domingo';
$SEMANACOMPLETA[1] = 'Lunes';
$SEMANACOMPLETA[2] = 'Martes';
$SEMANACOMPLETA[3] = 'Miércoles';
$SEMANACOMPLETA[4] = 'Jueves';
$SEMANACOMPLETA[5] = 'Viernes';
$SEMANACOMPLETA[6] = 'Sábado';

$SEMANAABREVIADA[0] = 'Dom';
$SEMANAABREVIADA[1] = 'Lun';
$SEMANAABREVIADA[2] = 'Mar';
$SEMANAABREVIADA[3] = 'Mie';
$SEMANAABREVIADA[4] = 'Jue';
$SEMANAABREVIADA[5] = 'Vie';
$SEMANAABREVIADA[6] = 'Sáb';

////////////////////////////////////
if($tipo_semana == 1){
$ARRDIASSEMANA = $SEMANACOMPLETA;
}elseif($tipo_semana == 0){
$ARRDIASSEMANA = $SEMANAABREVIADA;
}
if($tipo_mes == 0){
$ARRMES = $MESCOMPLETO;
}elseif($tipo_mes == 1){
$ARRMES = $MESABREVIADO;
}

if(!$dia) $dia = date(d);
if(!$mes) $mes = date(n);
if(!$ano) $ano = date(Y);

$TotalDiasMes = date(t,mktime(0,0,0,$mes,$dia,$ano));
$DiaSemanaEmpiezaMes = date(w,mktime(0,0,0,$mes,1,$ano));
$DiaSemanaTerminaMes = date(w,mktime(0,0,0,$mes,$TotalDiasMes,$ano));
$EmpiezaMesCalOffset = $DiaSemanaEmpiezaMes;
$TerminaMesCalOffset = 6 - $DiaSemanaTerminaMes;
$TotalDeCeldas = $TotalDiasMes + $DiaSemanaEmpiezaMes + $TerminaMesCalOffset;


if($mes == 1){
$MesAnterior = 12;
$MesSiguiente = $mes + 1;
$AnoAnterior = $ano - 1;
$AnoSiguiente = $ano;
}elseif($mes == 12){
$MesAnterior = $mes - 1;
$MesSiguiente = 1;
$AnoAnterior = $ano;
$AnoSiguiente = $ano + 1;
}else{
$MesAnterior = $mes - 1;
$MesSiguiente = $mes + 1;
$AnoAnterior = $ano;
$AnoSiguiente = $ano;
$AnoAnteriorAno = $ano - 1;
$AnoSiguienteAno = $ano + 1;
}


print "<table width='50%'>";
print " <tr>";
print " <td colspan=10>";
print " <table border=0 align=center width=\"1%\" style=\"font-family:arial;font-size:9px\">";
print " <tr>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno\">ano anterior</a></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior\">Mes anterior</a></td>";
print " <td width=\"1%\" colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente\">Mes siguiente</a></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno\">ano siguiente</a></td>";
print " </tr>";
print " </table>";
print " </td>";
print "</tr>";
print "<tr>";
foreach($ARRDIASSEMANA AS $key){
print "<td bgcolor=#ccccff><b>$key</b></td>";
}
print "</tr>";

$contador_dia=0;
for($a=1;$a <= $TotalDeCeldas;$a++){ 
	if(!$b) $b = 0;
	if($b == 7) $b = 0;
	if($b == 0) print '<tr>';
	if(!$c) $c = 1;
	if($a > $EmpiezaMesCalOffset AND $c <= $TotalDiasMes){
		if($c == date(d) && $mes == date(m) && $ano == date(Y)){
			print "<td bgcolor=\"#ffcc99\"><a href='historial_compras_general.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a><br></td>";
		}elseif($b == 6){
			print "<td bgcolor=#fff><a href='historial_compras_general.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
		}elseif($b == 0){
			print "<td bgcolor=#7f7f7f>$c</td>";
		}else{
			print "<td bgcolor=\"#fff\"><a href='historial_compras_general.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
		}
	$c++;
	}else{
		print "<td> </td>";
	}
	if($b == 6) print '</tr>';
	$b++;
	$contador_dia++;
	if($contador_dia==7)	$contador_dia=0;
	//print $SEMANAABREVIADA[$contador_dia];
	}
	print "<tr><td align=center colspan=10></a></td></tr>";
	print "</table>";
?>

<br><br>
    <h1>Historial de Pagos</h1>
    <br><br>


<?php
		include("php/base.php");
		include("php/base2.php");
		include("php/base3.php");
		
    $dia_seleccionable = $_GET['dia'];
    //print "$dia_seleccionable $mes $ano";
    if($dia_seleccionable==1)
    	$dia_seleccionable='01';
    if($dia_seleccionable==2)
    	$dia_seleccionable='02';
    if($dia_seleccionable==3)
    	$dia_seleccionable='03';    	
    if($dia_seleccionable==4)
    	$dia_seleccionable='04';   
    if($dia_seleccionable==5)
    	$dia_seleccionable='05';   
    if($dia_seleccionable==6)
    	$dia_seleccionable='06';       	    	    	
     if($dia_seleccionable==7)
    	$dia_seleccionable='07';   
    if($dia_seleccionable==8)
    	$dia_seleccionable='08';   
     if($dia_seleccionable==9)
    	$dia_seleccionable='09'; 
		
		
    if($mes2==1)
    	$mes2='01';
    if($mes2==2)
    	$mes2='02';
    if($mes2==3)
    	$mes2='03';    	
    if($mes2==4)
    	$mes2='04';   
    if($mes2==5)
    	$mes2='05';   
    if($mes2==6)
    	$mes2='06';       	    	    	
     if($mes2==7)
    	$mes2='07';   
    if($mes2==8)
    	$mes2='08';   
     if($mes2==9)
    	$mes2='09'; 
		
	$fechab = $ano."-".$mes2."-".$dia_seleccionable;
	

if($mes2=='')
    	$fechab = $ano;


    if($mes2!='')    
  echo " Historial de  ", $dia_seleccionable," de ",$MESCOMPLETO[$mes]," del ",$ano ,"<br><br>";
    else
    	echo "Historial del año: ",$ano ," <br><br>";
    	
    echo "<br>
    	<a href='?ano=",$ano,"'>

    		Ver historial de este año

    	</a><br>";
    echo "<a href='?mes=",$mes,"'>

    		Ver historial de este mes

    	</a><br>";
    

    $semana = date(W);
    $ano_s = $ano;

    $semana_b = $_GET['semana_b'];
        $semana_anterior = $semana_b-1;
        $semana_siguiente = $semana_b+1;

    if($semana_anterior=='-1'){
        $semana_anterior = 51;
        $ano_s = $ano-1;
    }
    if($semana_siguiente=='51'){
        $semana_siguiente = 0;
        $ano_s = $ano+1;
    }

    echo "<a href='?semana_b=",$semana,"&ano=",$ano,"'>

    		Ver historial de la semana actual

    	</a><br><br><br>";

    echo "<a href='?semana_b=",$semana_anterior,"&ano=",$ano_s,"'>

    		semana anterior

    	</a><br><br><br>";

    echo "<a href='?semana_b=",$semana_siguiente,"&ano=",$ano_s,"'>

    		semana siguiente

    	</a><br><br><br>";





    //echo $fechab;
    if($semana_b=='')
	   $result2 = mysql_query("select * from historial_compras where fecha like '%$fechab%'");
    else
        $result2 = mysql_query("select * from historial_compras where semana='$semana_b' and y='$ano_s'");
    
		echo "<table border='1'>";
		echo "<tr>";
		
		echo "<td>Producto</td>		<td>Descripción</td>	<td>Cantidad</td>		<td>Precio Unitario</td>		<td>Total</td>		<td>Vendido por</td>		<td>Fecha y Hora</td>		<td>Paciente</td>";
		
		echo "</tr>";

	while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				$producto = $row2[3];
				$select = 'select * from inventario where id_producto="'.$producto.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);
				
				echo "<td>".$renglon['nombre']."</td>";
				echo "<td>".$renglon['descripcion']."</td>";
				echo "<td>".$row2[4]."</td>";
				echo "<td>".$row2[5]."</td>";
				echo "<td>".$row2[6]."</td>";
				
				$usuario = $row2[2];
				$select = 'select * from usuarios where id_usuario="'.$usuario.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);
				
				echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
				echo "<td>".$row2[7]."</td>";
				
				$paciente = $row2[1];
				$select = 'select * from paciente where id_paciente="'.$paciente.'";';
				$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
				$renglon = mysql_fetch_assoc($resul);
				echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
								
			echo "</tr>";		
		}
echo "</table>";
?>
</body>
</html>