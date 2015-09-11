<?php
$id = $_GET['id'];

/*
$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/

include('base.php');

$select = 'select * from usuarios where id_usuario="'.$id.'";';
$resul = mysqli_query($conn,$select) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);

	$eliminar = 'delete from usuarios where id_usuario="'.$id.'";';

	if(!mysqli_query($conn,$eliminar))
		die('Error de consulta: '.mysql_error());
	mysqli_close($conn);

header('location:lista_usuarios.php');


?>
