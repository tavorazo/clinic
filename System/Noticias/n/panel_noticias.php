<?php
	session_start();
	//if($_SESSION['u']!='alfredo')
	//	header('location: http://cucitec.org/');
?>
<html>
<head>
<title>Panel Noticias</title>
</head>
<a href="panel_general.php">Regresar</a>
<body>
<h1>Noticia Nueva</h1>

<form action="files_n/procesar_noticia.php" method="POST" enctype="multipart/form-data">
<label>T&iacute;tulo: <br></label><input type="text" name="titulo"><br><br>
<label>Contenido: <br></label><input type="text" name="contenido" rows="20" cols="80"><br><br>
<label>Imagen: <br></label><input type="file" name="archivo"><br><br>
<input type="submit" value="Enviar">
</form>

</body>
</html>
