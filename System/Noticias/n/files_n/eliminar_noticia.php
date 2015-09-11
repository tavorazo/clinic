<?php
$id = $_GET['id'];

$dbh = mysql_connect('localhost','cuciteco_ad','123CUCITEC.') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('cuciteco_base', $dbh) or die('Error de seleccion de base: ' . mysql_error() );
$select = 'select * from Noticias where id_noticia="'.$id.'";';
$resul = mysqli_query($conn,) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);
$imagen = $renglon['imagen'];
if($imagen!='')
	unlink($imagen);

	$eliminar = 'delete from Noticias where id_noticia="'.$id.'";';
	//$index = "../panel/lista_noticias.php";
	//Header("Location: $index");
	if(!mysqli_query($conn,))
		die('Error de consulta: '.mysql_error());
	//mysqli_close($conn);

?>
<html>
<head>
<title>Procesando</title>
</head>
<body>
<a href="../panel/lista_noticias.php">Regresar</a>
</body>
</html>