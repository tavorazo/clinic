<?php 
@session_start();
if($_SESSION['u']=='')
  header('location: ../log.php');

include('base.php');
if (isset($_GET["id_paciente"]) && $_GET["id_paciente"] != '') 
	$id = $_GET['id_paciente'];
else
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">';


if ($_GET['action'] == 'Quitar de lista') {
	$quitar = "UPDATE `paciente` SET `etiqueta_laboratorio`= 0 WHERE `id_paciente` = ".$id;
	if(! $conn->query($quitar))
		die('Error de consulta: '.mysqli_error($conn));

} else if ($_GET['action'] == 'Agregar a lista') {
	$insertar = "UPDATE `paciente` SET `etiqueta_laboratorio`= 1 WHERE `id_paciente` = ".$id;
	//$insertar = "UPDATE paciente set  etiqueta_laboratorio = '1' where id_usuario = '$id';";
	if(! $conn->query($insertar))
		die('Error de consulta: '.mysqli_error($conn));
} else {
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">';
}
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">';

 ?>