<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
<style type="text/css" media="screen">
 body{
  background: steelblue;
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
	$a = $_POST['id'];
	$b = $_POST['titulo'];
	$c = $_POST['contenido'];

	$b = htmlspecialchars($b);
	$c = htmlspecialchars($c);


	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
		$imagen=htmlspecialchars($imagen);
	}
	else
		$imagen="";

/*		$conexion = mysql_connect('localhost', 'root', '');

		if (!$conexion){
			die('Error de Conexion: ' .mysql_error());
		}

		$conexion_base=mysql_select_db('Endoperio', $conexion);

		if (!$conexion_base) {
			die('Error de seleccion de base: ' .mysql_error());
			echo "Error en la conexi贸n";
		}

		$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
		$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/
		include('../php/base.php');
		include('../php/base3.php');
		$select = 'select * from noticias where id_noticia="'.$a.'";';


		$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);

		if($imagen!=""){
			unlink($renglon['imagen']);
			$insertar = "update noticias set imagen='$imagen', Titulo='$b', texto='$c' where id_noticia='$a'";
		} else
			$insertar = "update noticias set Titulo='$b', texto='$c' where id_noticia='$a'";

		if(!mysql_query($insertar, $conexion))
			die('Error de consulta: '.mysql_error());
		mysql_close($conexion);

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Noticia creada con exito<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='lista_noticias.php'>Regresar</a></div>";
		?>
	
	<META HTTP-EQUIV="Refresh" CONTENT="2; URL=lista_noticias.php">

</body>
</html>
