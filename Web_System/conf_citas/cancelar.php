<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: #2d455f; color: #1C1C1C; }
		a, a:hover{ color: white; text-decoration: none; }
	</style>
</head>
<body>
	<?php
if (isset($_GET['id']))
	$id = $_GET['id'];
if (isset($_GET['paciente']))
	$paciente = $_GET['paciente'];


include('../php/base.php');
$select = 'SELECT * from agenda where id_cita='.$id;
$resul = $conn->query($select) or die ("problema con la solicitud");
$renglon = $resul->fetch_assoc();
if($renglon['duracion']=='15'){
	$eliminar = 'DELETE from agenda where id_cita='.$id;
	if(!$conn->query($eliminar))
		die('Error de consulta: '.mysqli_error($conn));
}
if($renglon['duracion']=='30'){
	for($i=0;$i<2;$i++){
		$eliminar = 'DELETE from agenda where id_cita='.$id;
		if(!$conn->query($eliminar))
			die('Error de consulta: '.mysqli_error($conn));
		$id--;
	}
}	

if($renglon['duracion']=='45'){
	for($i=0;$i<3;$i++){
		$eliminar = 'DELETE from agenda where id_cita='.$id;
		if(!$conn->query($eliminar))
			die('Error de consulta: '.mysql_error());
		$id--;
	}
}
if($renglon['duracion']=='60'){
	for($i=0;$i<4;$i++){
		$eliminar = 'DELETE from agenda where id_cita='.$id;
		if(!$conn->query($eliminar))
			die('Error de consulta: '.mysql_error());
		$id--;
	}
}		
//asistencia de paciente
$sql = 'SELECT inasistencia from paciente where id_paciente='.$paciente;
$result = $conn->query($sql);
$inasistencia = $result->fetch_row();
$inasistencia = (int)$inasistencia;
$inasistencia = $inasistencia+1;

//actualizar asistencia
$sql = 'UPDATE paciente Set inasistencia = '.$inasistencia.'  where id_paciente='.$paciente;
if(!$conn->query($sql))
	die('Error de consulta: '.mysql_error());


mysqli_close($conn);
echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
echo "Cita cancelada<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
echo "<a href='../panel.php' > <font color='white'>Regresar </a></center></div>";
?>
<!--a href="ver_citas.php">Regresar</a-->
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">
</body>
</html>