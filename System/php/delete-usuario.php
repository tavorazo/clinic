<?php
$id = $_GET['id'];

/*
$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/

include('base.php');
include('base3.php');
include('base2.php');

$select = 'select * from usuarios where id_usuario="'.$id.'";';
$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);

	$eliminar = 'delete from usuarios where id_usuario="'.$id.'";';

	if(!mysql_query($eliminar, $dbh))
		die('Error de consulta: '.mysql_error());
	mysql_close($conexion);

header('location:lista_usuarios.php');


?>
