<?php
$id = $_GET['id'];

include('base.php');

$select = 'SELECT * from usuarios where id_usuario="'.$id.'";';
$resul = $conn->query($select);
$renglon = $resul->fetch_assoc();

	$eliminar = 'DELETE from usuarios where id_usuario="'.$id.'";';

	//if(!mysql_query($eliminar, $dbh))
	if(!$conn->query($eliminar))
		die('Error de consulta: '.mysqli_error($conn));
	//mysql_close($conexion);
	$conn->close();

header('location:lista_usuarios.php');

?>
