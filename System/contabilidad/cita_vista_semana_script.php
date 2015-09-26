<?php
@session_start();
date_default_timezone_set("Mexico/General");
include('php/base.php');
//include('php/base2.php');
//include('php/base3.php');
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$dia = $_GET['dia'];
$hora = $_GET['hora'];
$minuto = $_GET['minuto'];
if($minuto=0)
	$minuto = '00';
//$agenda = $conn->query("SELECT * from agenda where ano='$ano' and mes='$mes' and dia='$dia' and hora='$hora' and minuto like '%$minuto%';");
$agenda = $conn->query("SELECT * from agenda where ano='$ano' and mes='$mes' and dia='$dia' and hora='$hora' and minuto like '%$minuto%';");
echo "<table witdh='100%' border='1'><tr>";
//while ($fila_agenda = mysql_fetch_array($agenda, MYSQL_NUM)){
while ($fila_agenda = $agenda->fetch_row()){
	echo "<td>";
	$id_usuario = $fila_agenda[1];
	$select = 'SELECT * from usuarios where id_usuario="'.$id_usuario.'";';
	$resul = $conn->query($select);
	$renglon = $result->fetch_assoc();
	//$resul = $conn->query($select) or die ("problema con la solicitud");
	//$renglon = mysql_fetch_assoc($resul);
	echo "<img src='usuarios/".$renglon['imagen']."' width='200px'><br><br>";
	echo "Dr. ", $renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"<br><br>";
	$id_paciente = $fila_agenda[2];
	$select = 'SELECT * from paciente where id_paciente="'.$id_paciente.'";';
	$resul = $conn->query($select);
	$renglon = $result->fetch_assoc();
	//$resul = $conn->query($select) or die ("problema con la solicitud");
	//$renglon = mysql_fetch_assoc($resul);
	echo "Paciente: ", $renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"<br><br>";
	echo "Observación: ", $fila_agenda[8];
	echo "</td>";
}
echo "</tr></table>";
?>