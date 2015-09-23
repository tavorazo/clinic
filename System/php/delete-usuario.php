<?php
$id = $_GET['id'];

include('base.php');
//include('base3.php');
//include('base2.php');

$select = 'SELECT * from usuarios where id_usuario="'.$id.'";';
$resul = $conn->query($select);
$renglon = $resul->fetch_assoc();
//$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
//$renglon = mysql_fetch_assoc($resul);

	$eliminar = 'DELETE from usuarios where id_usuario="'.$id.'";';

	//if(!mysql_query($eliminar, $dbh))
	if(!$conn->query($eliminar))
		die('Error de consulta: '.mysqli_error($conn));
	//mysql_close($conexion);
	$conn->close();

header('location:lista_usuarios.php');

?>
