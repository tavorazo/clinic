<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
    		<link rel="shortcut icon" type="x-icon" href="..././images/icon.png" /><!--para logo en barra-->
  <link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
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

	session_start();
	date_default_timezone_set("Mexico/General");
	$id_paciente = $_POST['id_paciente'];
	$id_usuario = $_SESSION['u'];
	$avance = $_POST['avance'];

	include('../../php/base.php');

	//echo "insert into avance_clinico (id_paciente, id_usuario, avance, fecha) values ('$id_paciente', '$id_usuario', '$avance', now());";
	
	$insertar = "insert into avance_clinico (id_paciente, id_usuario, avance, fecha) values ('$id_paciente', '$id_usuario', '$avance', now());";

	if(!$conn->query($insertar))
				die('Error de consulta: '.mysqli_error($conn));
				

	echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "<h8>Gracias por tu preferenc¨ªa.<br><br>Cita creada con exito; ";
	echo "Espera nuestro correo de confirmaci¨®n<br></h8>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';

	echo "<a href='../ficha-paciente.php?id=',$id_paciente,'' > <font color='white'>Regresar </a></center></div>";

	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../ficha-paciente.php?id=',$id_paciente,'">';

?>

  </body>

</html>