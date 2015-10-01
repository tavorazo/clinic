<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
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

	$a = $_POST['id'];
	$b = $_POST['titulo'];
	$c = $_POST['contenido'];

	$b = htmlspecialchars($b);
	$c = htmlspecialchars($c);


include('../php/base.php');
				$insertar = "UPDATE avisos SET contenido='$c', titulo='$b' WHERE id_aviso = '$a'";

		if(!$conn->query($insertar))
			die('Error de consulta: '.mysql_error());

		mysqli_close ( $conn );

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Aviso modificado con exito<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='lista_avisos.php' style='color:white'>Regresar</a></div>";
		?>
	<META HTTP-EQUIV="Refresh" CONTENT="1; URL=lista_avisos.php">
		
</body>
</html>
