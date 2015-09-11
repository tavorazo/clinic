<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
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

	$dia = $_POST['dia'];
	$mes_n = $_POST['mes_n'];
	$ano = $_POST['ano'];
	$hora = $_POST['hora'];
	$minuto = $_POST['minuto'];
	$paciente = $_POST['paciente'];

	$conexion = mysql_connect('localhost', 'root', '');

	if (!$conexion){
		die('Error de Conexion: ' .mysql_error());
	}

	$conexion_base=mysql_select_db('Endoperio', $conexion);

	if (!$conexion_base) {
		die('Error de seleccion de base: ' .mysql_error());
		echo "Error en la conexión";
	}

	$insertar = "insert into agenda (id_usuario,id_paciente,ano,mes,dia,hora,minuto, confirmacion, duracion) values ('$doctor','$paciente', '$ano', '$mes_n', '$dia', '$hora', '$minuto', '0', '$duracion');";

	if(!mysqli_query($conn,))
		die('Error de consulta: '.mysql_error());
	mysqli_close($conn);



	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "Cita creada con exito<br><br>";
	echo "Espera correo de confirmación<br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';

	echo "<a href='../index.php' > <font color='white'>Volver a inicio </a></center></div>";

	?>
	<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../pacientes.php">

 </body>

</html>