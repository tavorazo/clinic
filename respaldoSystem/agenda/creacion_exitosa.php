<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<title>Listo</title>
<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
<style type="text/css" media="screen">
	body{ background: #2d455f; color: #1C1C1C; }
	a, a:hover{ color: white; text-decoration: none; }
</style>
</head>
<body>
<?php
@session_start();
$id_creador = $_SESSION['u'];
$dia = $_POST['dia'];
$mes_n = $_POST['mes_n'];
$ano = $_POST['ano'];
$hora = $_POST['hora'];
$minuto = $_POST['minuto'];
$doctor = $_POST['doctor'];
$paciente = $_POST['paciente'];
$duracion = $_POST['duracion'];
$observacion = $_POST['observacion'];
include('../php/base.php');
$fecha = $ano."/".$mes_n."/".$dia;
$semana = strftime("%V", strtotime($fecha));
//echo "semana". $semana;

	//echo $fecha;
$verifica = 'select * from agenda where hora="'.$hour.'" and minuto="'.$minute.'" and dia="'.$dia.'" and mes="'.$mes_n.'" and ano="'.$ano.'" and id_usuario="'.$doctor.'";';
try {
	$resultadoverifica = $conn->query($verifica);	
}catch(\Exception $e){
	printf('Error: %s', $e->getMessage());  
}
$r = $resultadoverifica->fetch_assoc();
if($r['id_usuario']==''){
	/********************DURACION 15 MIN*****************************/
	if($duracion=='15'){
		$insertar = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada ) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto', '$semana', '0', '$duracion', '$observacion', '$fecha', '$id_creador');";
	}
	/*********************DURACION 30 MIN**************************/
	else if($duracion=='30'){
		$insertar = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto', '$semana', '0', '$duracion', '$observacion', '$fecha', '$id_creador');";
		if($minuto=='00' || $minuto=='0'){
			$minuto2=0;
			for($i=0; $i<1; $i++){
				$minuto2 = $minuto2 + 15;
				$insertar2 = "INSERT into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta1: '.mysqli_error($conn));
			}
		}
		else if($minuto=='15'){
			$minuto2=15;
			for($i=0; $i<1; $i++){
				$minuto2 = $minuto2 + 15;
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta2: '.mysqli_error($conn));
			}	
		}
		else if($minuto=='30'){
			$minuto2=30;
			for($i=0; $i<1; $i++){
				$minuto2 = $minuto2 + 15;
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta3: '.mysqli_error($conn));
			}	
		}
		else if($minuto=='45'){
			$minuto2=45;
			for($i=0; $i<1; $i++){
				$minuto2 = $minuto2 + 15;
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora, minuto, n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta4: '.mysqli_error($conn));
			}
		}
	}
	/************************DURACION 45 MIN**********************/
	else if($duracion=='45'){
		$insertar = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto', '$semana', '0', '$duracion', '$observacion', '$fecha', '$id_creador');";
		if($minuto=='00' || $minuto=='0'){
			$minuto2=0;
			for($i=0; $i<2; $i++){
				$minuto2 = $minuto2 + 15;
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta5: '.mysqli_error($conn));
			}
		}
		else if($minuto=='15'){
			$hora2=$hora+1;
			$minuto2=15;
			for($i=0; $i<2; $i++){
				$minuto2 = $minuto2 + 15;
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora2', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta6: '.mysqli_error($conn));
			}
		}
		else if($minuto=='30'){
			$hora2 = $hora + 1;
			$minuto2=30;
			for($i=0; $i<2; $i++){
				$minuto2 = $minuto2 + 15;
				if($minuto2==60)
					$minuto2='00';
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora2', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta7: '.mysqli_error($conn));
			}
		}
		else if($minuto=='45'){
			$hora2= $hora + 1;
			$minuto2=45;
			for($i=0; $i<2; $i++){
				$minuto2 = $minuto2 + 15;
				if($minuto2==60)
					$minuto2='00';
				$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora2', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
				if(!$conn->query($insertar2))
					die('Error de consulta8: '.mysqli_error($conn));
			}
		}
	}
	/**************************DURACION 1 HORA ************************/
	else if($duracion == '60'){
		$insertar = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto', '$semana', '0', '$duracion', '$observacion', '$fecha', '$id_creador');";
		$hora2= $hora;
		$minuto2=$minuto;
		for($i=0; $i<3; $i++){
			$minuto2 = $minuto2 + 15;
			if($minuto2==60){
				$minuto2='00';
				$hora2 = $hora + 1;
			}
			$insertar2 = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto,n_semana, confirmacion, duracion, observacion, fecha,realidada) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora2', '$minuto2', '$semana', '1', '$duracion', '$observacion', '$fecha', '$id_creador');";
			if(!$conn->query($insertar2))
				die('Error de consulta9: '.mysqli_error($conn));
		}
	}
	if(!$conn->query($insertar))
		die('Error de consulta10: '.mysqli_error($conn));
/*if($insertar2=''){
if(!$conn->query($insertar2))
	die('Error de consulta: '.mysqli_error($conn));
}*/
mysqli_close($conn);
echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
echo "Cita creada con &eacute;xito<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
echo "<a href='../panel.php' > <font color='white'>Regresar </a></center></div>";
} else{
echo "<a href='../agenda.php' > <font color='white'>Error! YA EXISTE una cita en esta hora. Regresar </a></center></div>";
}
//header('location: calendario.php');
echo'<META HTTP-EQUIV="Refresh" CONTENT="2; URL=../panel.php">';
?>
</body>
</html>