<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
    		<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
<style type="text/css" media="screen">
 body{
  background: steelblue;
  color: #1C1C1C;
 }
 a, a:hover{
  color: white;
  text-decoration: none;
 }
	</style>
</head>
<body>


		<?php
		@session_start();
		$id_usuario = $_SESSION['u'];

		$web = 1;
		$dia = $_POST['dia'];
		$mes_n = $_POST['mes'];
		$ano = $_POST['ano'];
		$hora = $_POST['hora'];
		$minuto = $_POST['minuto'];
		$paciente = $_POST['paciente'];
		$observaciones = $_POST['observaciones'];

		$fecha =  $ano."/".$mes_n."/".$dia;
		//echo $fecha;
		/*$conexion = mysql_connect('localhost', 'root', '');

		if (!$conexion){
			die('Error de Conexion: ' .mysql_error());
		}

		$conexion_base=mysql_select_db('Endoperio');

		if (!$conexion_base) {
			die('Error de seleccion de base: ' .mysql_error());
			echo "Error en la conexi贸n";
		}*/
		include('../php/base.php');
		include('../php/base3.php');

$insertar = "insert into agenda (id_paciente,ano,mes,dia,hora,minuto, web, confirmacion, observacion, fecha) values ('$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto', '1','0','$observaciones', '$fecha','$paciente',now();";

	if($minuto=='00' || $minuto=='0'){
		$minuto2=0;
		for($i=0; $i<1; $i++){
			$minuto2 = $minuto2 + 15;
$insertar2 = "insert into agenda (id_paciente,ano,mes,dia,hora,minuto, web, confirmacion, observacion, fecha) values ('$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '1','1','$observaciones', '$fecha','$paciente',now();";
			if(!mysql_query($insertar2))
				die('Error de consulta: '.mysql_error());
		}

	}
	else if($minuto=='15'){
		$minuto2=15;
		for($i=0; $i<1; $i++){
			$minuto2 = $minuto2 + 15;
$insertar2 = "insert into agenda (id_paciente,ano,mes,dia,hora,minuto, web, confirmacion, observacion, fecha) values ('$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '1','1','$observaciones', '$fecha');";
			if(!mysql_query($insertar2))
				die('Error de consulta: '.mysql_error());
		}	
	}
	else if($minuto=='30'){
		$minuto2=30;
		for($i=0; $i<1; $i++){
			$minuto2 = $minuto2 + 15;
$insertar2 = "insert into agenda (id_paciente,ano,mes,dia,hora,minuto, web, confirmacion, observacion, fecha) values ('$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '1','1','$observaciones', '$fecha');";
			if(!mysql_query($insertar2))
				die('Error de consulta: '.mysql_error());
		}	
	}
	else if($minuto=='45'){
		$minuto2=45;
		for($i=0; $i<1; $i++){
			$minuto2 = $minuto2 + 15;
$insertar2 = "insert into agenda (id_paciente,ano,mes,dia,hora,minuto, web, confirmacion, observacion, fecha) values ('$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto2', '1','2','$observaciones', '$fecha');";
			if(!mysql_query($insertar2))
				die('Error de consulta: '.mysql_error());
		}
	}

		if(!mysql_query($insertar))
			die('Error de consulta: '.mysql_error());
		mysqli_close($conn);

	
	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "<h8>Gracias por tu preferencía.<br><br>Cita creada con exito; ";
	echo "Espera nuestro correo de confirmación<br></h8>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';

	echo "<a href='../index.php' > <font color='white'>Regresar </a></center></div>";

echo'<META HTTP-EQUIV="Refresh" CONTENT="2; URL=../index.php">';

?>

  </body>

</html>