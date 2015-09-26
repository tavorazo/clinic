<?php
$id = $_GET['id'];
include('base.php');


$select = 'SELECT * from usuarios where id_usuario="'.$id.'";';
$resul = $conn->query($select);
$renglon = $resul->fetch_assoc();


	$eliminar = 'DELETE from usuarios where id_usuario="'.$id.'";';
	//if(!$conn->query($eliminar, $dbh))
	if(!$conn->query($eliminar))
		die('Error de consulta: '.mysqli_error($conn));
	mysqli_close($conn);
	
header('location:lista_usuarios.php');
?>
