<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Procesando</title>

	
</head>

<body>

<?php
	//session_start();
	//if($_SESSION['u']!='alfredo')
	//	header('location: http://cucitec.org/');
?>
<?php

//header("Content-Type: text/html;charset=utf-8");
$titulo=$_POST['titulo'];
$contenido=$_POST['contenido'];

$titulo=addslashes($titulo);
$contenido=htmlspecialchars($contenido);

if($_FILES['archivo']['name']!=""){
copy($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name']);
$nom_archivo=$_FILES['archivo']['name'];
$nom_archivo=htmlspecialchars($nom_archivo);
}
else
$nom_archivo="";

echo $titulo,"<br>";
echo $contenido, "<br>";
echo $nom_archivo;

include("../../php/base.php");
include("../../php/base2.php");
include("../../php/base3.php");

$instruccion = "insert into Noticias (imagen,texto,Titulo,fecha) values ('$nom_archivo', '$contenido','$titulo',now());";

if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());
mysqli_close($conn);
//header('location: ../panel/panel_noticias.php');

?>

<a href="../panel/panel_noticias.php">Regresar</a>
</body>
</html>