<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

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

	$id = $_GET['id'];



/*	$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );

	$base = mysql_select_db('Endoperio') or die('Error de seleccion de base: ' . mysql_error() );*/

	

	include('../php/base.php');

	include('../php/base3.php');

	$select = 'select * from agenda where id_cita="'.$id.'";';
	$resul = $conn->query($select) or die ("problema con la solicitud");
	$renglon = mysql_fetch_assoc($resul);

		if($renglon['duracion']=='15'){
			$eliminar = 'delete from agenda where id_cita="'.$id.'";';
			if(!$conn->query($eliminar))
				die('Error de consulta: '.mysql_error());
		}

		if($renglon['duracion']=='30'){
			for($i=0;$i<2;$i++){
				$eliminar = 'delete from agenda where id_cita="'.$id.'";';
				if(!$conn->query($eliminar))
					die('Error de consulta: '.mysql_error());
				$id--;
			}
		}	

		if($renglon['duracion']=='45'){
			for($i=0;$i<3;$i++){
			//echo $id;
				$eliminar = 'delete from agenda where id_cita="'.$id.'";';
				if(!$conn->query($eliminar))
					die('Error de consulta: '.mysql_error());
				$id--;
			}
		}

		if($renglon['duracion']=='60'){
			for($i=0;$i<4;$i++){
				$eliminar = 'delete from agenda where id_cita="'.$id.'";';
				if(!$conn->query($eliminar))
					die('Error de consulta: '.mysql_error());
				$id--;
			}
		}		

		
	mysqli_close($conn);

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Cita cancelada<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='../panel.php' > <font color='white'>Regresar </a></center></div>";
	?>

<!--a href="ver_citas.php">Regresar</a-->
<META HTTP-EQUIV="Refresh" CONTENT="2; URL=../panel.php">

  </body>
</html>