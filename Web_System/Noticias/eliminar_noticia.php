<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
<style type="text/css" media="screen">
 body{
  background: #2d455f;
  color: #1C1C1C;
 }
 a, a:hover{
  color: white;
  text-decoration: none;
 }

  
</style>
</head>
		<body>

	<?php
	$id = $_GET['id'];

	/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
	$base = mysql_select_db('Endoperio') or die('Error de seleccion de base: ' . mysql_error() );*/
	include('../php/base.php');
	$select = 'select * from noticias where id_noticia="'.$id.'";';
	$resul = $conn->query($select) or die ("problema con la solicitud");
	$renglon = $resul->fetch_assoc();
	$imagen = $renglon['imagen'];
	
	if ($imagen != "default.png")
		unlink($imagen);

		$eliminar = 'delete from noticias where id_noticia="'.$id.'";';

		if(!$conn->query($eliminar))
			die('Error de consulta: '.mysql_error());

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Noticia eliminada con exito<br><br><br>";
		
	?>
		<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">
			<a href='lista_noticias.php'>Regresar</a>
		</div>
	<META HTTP-EQUIV="Refresh" CONTENT="1; URL=lista_noticias.php">


</body>
</html>

