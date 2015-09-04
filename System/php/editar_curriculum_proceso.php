<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
<style type="text/css" media="screen">
 body{
  background: steelblue;
  color: #E6E6E6;
 }
 a, a:hover{
  color: #E6E6E6;
  text-decoration: none;
 }
</style>
</head>
<body>

<div>
	<?php
		include('../php/base.php');
		include('../php/base3.php');

		$id = $_POST['id'];
		$curriculum = $_POST['curriculum'];

		$select = 'select * from curriculum where id_usuario="'.$id.'";';
		$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);
		//echo $id, $curriculum;
		if($renglon['id_usuario']!='')
			$insertar = "update curriculum set descripcion='$curriculum' where id_usuario='$id'";
		else
			$insertar = "insert into curriculum (id_usuario, descripcion) values ('$id','$curriculum')";
		if(!mysql_query($insertar, $conexion))
			die('Error de consulta: '.mysql_error());
		mysql_close($conexion);

		$a = 'lista_usuarios.php';
		echo "<center><br><br><br<a href='",$a,"' > Proceso realizado con &eacute;xito </a>";

	?>
</div>
	<META HTTP-EQUIV="Refresh" CONTENT="1; URL=lista_usuarios.php">


	</body>
</html>