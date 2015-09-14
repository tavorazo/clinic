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
		$cat = $_GET['cat'];
		$id_p= $_GET['id_p'];
		/*
			cat 1 fotos clinicas
			car 2 fotos externas
			cat 3 radiografias
			cat 4 enfermedades el id que recibe es el de  enfermedad no el del paciente, si no mama todo
			
		*/

			/*$dbh = mysql_connect('localhost','weboxorg_a','12qwas.ZX') or die('Error de conexion: ' . mysql_error() );
			$base = mysql_select_db('weboxorg_endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/
		include("base.php");
		include("base3.php");
		if($cat == '1'){
			$select = 'select * from fotografias_clinicas where id_foto="'.$id.'";';
			$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
			$renglon = mysql_fetch_assoc($resul);
			$imagen = $renglon['nombre_foto'];
			unlink('../pacientes/fotografias_clinicas/'.$imagen);
			$eliminar = 'delete from fotografias_clinicas where id_foto="'.$id.'";';
			 
		}

		if($cat == '2'){
			$select = 'select * from fotografias_externas where id_foto="'.$id.'";';
			$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
			$renglon = mysql_fetch_assoc($resul);
			$imagen = $renglon['nombre_foto'];
			unlink('../pacientes/fotografias_externas/'.$imagen);
			$eliminar = 'delete from fotografias_externas where id_foto="'.$id.'";';
			 
		}

		if($cat == '3'){
			$select = 'select * from radiografias where id_foto="'.$id.'";';
			$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
			$renglon = mysql_fetch_assoc($resul);
			$imagen = $renglon['nombre_foto'];
			unlink('../pacientes/radiografias/'.$imagen);
			$eliminar = 'delete from radiografias where id_foto="'.$id.'";';
			 
		}

		if($cat == '4'){
			/*$select = 'select * from enfermedades where id_foto="'.$id.'";';
			$resul = mysql_query($select, $dbh) or die ("problema con la solicitud 4");
			$renglon = mysql_fetch_assoc($resul);*/
			$eliminar = 'delete from enfermedades where id_enfermedad="'.$id.'";';
			 
		}



			if(!mysql_query($eliminar, $dbh))
				die('Error de consulta: '.mysql_error());
			mysql_close($conexion);

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Eliminado exitosamente<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='../pacientes/ficha-paciente.php?id=",$id_p,"' style='color:white'>Regresar</a></div>";
		
		echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../pacientes/ficha-paciente.php?id=',$id_p,'">';
		
		?>


</body>
</html>