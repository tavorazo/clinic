<?php
$id = $_GET['id'];

/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio') or die('Error de seleccion de base: ' . mysql_error() );*/
include('../php/base.php');
include('../php/base3.php');
$select = 'select * from agenda where id_cita="'.$id.'";';
$resul = $conn->query($select) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);


	$eliminar = 'delete from agenda where id_cita="'.$id.'";';
	$eliminar2 = 'delete from agenda where id_cita="'.($id-1).'";';

	if(!$conn->query($eliminar))
		die('Error de consulta: '.mysql_error());
		
	if(!$conn->query($eliminar2,$dbh))
		die('Error de consulta: '.mysql_error());
		
	mysql_close($dbh);

	//header('location: ../pacientes.php');
	echo '<meta http-equiv="Refresh" content="1;url=../pacientes.php">';

?>