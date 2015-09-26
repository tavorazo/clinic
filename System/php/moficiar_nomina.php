<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{background: steelblue;color: #1C1C1C;}
		a, a:hover{color: white;	text-decoration: none;}
	</style>
</head>
<body>
	<?php
	include("base.php");
	//include("base3.php");
	$id_usuario = $_POST['id_usuario'];
	$sueldo = $_POST['sueldo'];
	$vacaciones = $_POST['vacaciones'];
	$aguinaldo = $_POST['aguinaldo'];
	//echo $id_usuario;
	$select = 'SELECT * from nomina where id_usuario="'.$id_usuario.'";';
	$resul = $conn->query($select);
	$renglon = $resul->fetch_assoc();
	//$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
	//$renglon = mysql_fetch_assoc($resul);
	if($renglon['id_usuario']==''){
		$insertar = "INSERT into nomina (id_usuario, sueldo, vacaciones, aguinaldo) values ('$id_usuario','$sueldo','$vacaciones','$aguinaldo');";
	}
	else{
		$insertar = "UPDATE nomina set sueldo='$sueldo', vacaciones='$vacaciones', aguinaldo='$aguinaldo' where id_usuario='$id_usuario'";
	}
//echo $insertar;
	//if(!mysql_query($insertar))
	if(!$conn->query($insertar))
		die('Error de consulta: '.mysqli_error($conn));
	mysqli_close($conn);
	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "Nomina modificada con &eacute;xito<br><br><br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo "<a href='nomina_personal.php?id=",$id_usuario,"' style='color:white'>Regresar</a>";
		//header("location:nomina_personal.php?id=".$id_usuario)
	echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=nomina_personal.php?id=',$id_usuario,'">';
	?>
</body>
</html>