<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: #2d455f; color: #1C1C1C; }
		a, a:hover{ color: white; text-decoration: none; }
	</style>
</head>
<body>
	<?php
	$id = $_GET['id'];
	$cat = $_GET['cat'];
	$id_p= $_GET['id_p'];
			include("base.php");
			//include("base3.php");
			if($cat == '1'){
				$select = 'SELECT * from fotografias_clinicas where id_foto="'.$id.'";';
				$resul = $conn->query($select);
				$renglon = $resul->fetch_assoc();
				//$resul = $conn->query($select) or die ("problema con la solicitud");
				//$renglon = mysql_fetch_assoc($resul);
				$imagen = $renglon['nombre_foto'];
				unlink('../pacientes/fotografias_clinicas/imagenes/'.$imagen);
				$eliminar = 'DELETE from fotografias_clinicas where id_foto="'.$id.'";';
				
			}
			if($cat == '2'){
				$select = 'SELECT * from fotografias_externas where id_foto="'.$id.'";';
				$resul = $conn->query($select);
				$renglon = $resul->fetch_assoc();
				//$resul = $conn->query($select) or die ("problema con la solicitud");
				//$renglon = mysql_fetch_assoc($resul);
				$imagen = $renglon['nombre_foto'];
				unlink('../pacientes/fotografias_externas/imagenes/'.$imagen);
				$eliminar = 'DELETE from fotografias_externas where id_foto="'.$id.'";';
				
			}
			if($cat == '3'){
				$select = 'SELECT * from radiografias where id_foto="'.$id.'";';
				$resul = $conn->query($select);
				$renglon = $resul->fetch_assoc();
				//$resul = $conn->query($select) or die ("problema con la solicitud");
				//$renglon = mysql_fetch_assoc($resul);
				$imagen = $renglon['nombre_foto'];
				unlink('../pacientes/radiografias/imagenes/'.$imagen);
				$eliminar = 'DELETE from radiografias where id_foto="'.$id.'";';
				
			}
			if($cat == '4'){
			/*$select = 'select * from enfermedades where id_foto="'.$id.'";';
			$resul = $conn->query($select) or die ("problema con la solicitud 4");
			$renglon = mysql_fetch_assoc($resul);*/
			$eliminar = 'DELETE from enfermedades where id_enfermedad="'.$id.'";';
			
		}
		//if(!$conn->query($eliminar))
		if(!$conn->query($eliminar))
			die('Error de consulta: '.mysqli_error($conn));
		mysqli_close($conn);
		
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Eliminado exitosamente<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='../pacientes/ficha-paciente.php?id=",$id_p,"' style='color:white'>Regresar</a></div>";
		
		echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../pacientes/ficha-paciente.php?id=',$id_p,'">';
		
		?>
	</body>
	</html>