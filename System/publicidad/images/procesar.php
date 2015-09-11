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

	if(!mysqli_query($conn,)){
			die('error: '.mysql_error());
	}

    $select = 'select * from publicidad where imagen="'.$imagen.'";';
    $resul = mysqli_query($conn,$select) or die ("problema con la solicitud");
    $renglon = mysql_fetch_assoc($resul);

    $id = $renglon['id_publicidad'];
    rename($imagen, $id);
    $editar = "update publicidad set imagen='$id' where id_publicidad='$id';";

    

	if(!mysqli_query($conn,$editar)){
			die('error: '.mysql_error());
	}else{
		mysqli_close($conn);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../subir_publicidad.php">
		Subida con éxito';
	}

	


?>

