<?php
include('../../php/base.php');
//include('../../php/base3.php');
//include('../../php/base2.php');
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
$link = $_POST['link'];
$insertar = "INSERT into publicidad(imagen, descripcion, link) values ('$imagen', '$descripcion', '$link');";
if(!$conn->query($insertar)){
	die('error: '.mysqli_error($conn));
}
$select = 'SELECT * from publicidad where imagen="'.$imagen.'";';
$result = $conn->query($select);
$renglon = $result->fetch_assoc();
//$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
//$renglon = mysql_fetch_assoc($resul);
$id = $renglon['id_publicidad'];
rename($imagen, $id);
$editar = "UPDATE publicidad set imagen='$id' where id_publicidad='$id';";
//if(!mysql_query($editar, $conexion)){
if(!$conn->query($editar)){
	die('error: '.mysqli_error($conn));
}else{
	//mysql_close($conexion);
	$conn->close();
	echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../subir_publicidad.php">
	Subida con éxito';
}
?>
