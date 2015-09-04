<?php
	include('../../php/base.php');
	include('../../php/base3.php');
	include('../../php/base2.php');

	if($_FILES['imagen']['name']!=""){
		copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
		$imagen=$_FILES['imagen']['name'];
		$imagen=htmlspecialchars($imagen);
	}
	else{
		echo "Debes seleccionar una imagen";
		echo "<a href='../subir_publicidad.php'>Regresar</a>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../subir_publicidad.php">';
	}

	$descripcion = $_POST['desc'];
	$link = $_POST['link']

	$insertar = "insert into publicidad(imagen, descripcion, link) values ('$imagen', '$descripcion', '$link');";

	if(!mysql_query($insertar, $conexion)){
			die('error: '.mysql_error());
	}

    $select = 'select * from publicidad where imagen="'.$imagen.'";';
    $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
    $renglon = mysql_fetch_assoc($resul);

    $id = $renglon['id_publicidad'];
    rename($imagen, $id);
    $editar = "update publicidad set imagen='$id' where id_publicidad='$id';";

    

	if(!mysql_query($editar, $conexion)){
			die('error: '.mysql_error());
	}else{
		mysql_close($conexion);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../subir_publicidad.php">
		Subida con éxito';
	}

	


?>

