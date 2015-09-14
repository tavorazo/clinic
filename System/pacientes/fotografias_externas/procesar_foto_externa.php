<html>
<head>
<title>Panel Administrador</title>


</head>
<body>

<?php
  date_default_timezone_set("Mexico/General");
$a = $_POST['id'];
$b = $_POST['descripcion'];

if($_FILES['imagen']['name']!=""){
	copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
	$imagen=$_FILES['imagen']['name'];
}
else
	$imagen="";

/*$conexion = mysql_connect('localhost', 'root', '');

if (!$conexion){
	die('Error de Conexion: ' .mysql_error());
}

$conexion_base=mysql_select_db('Endoperio', $conexion);

if (!$conexion_base) {
	die('Error de seleccion de base: ' .mysql_error());
	echo "Error en la conexi贸n";
}*/
include('../../php/base.php');
include('../../php/base3.php');

$insertar = "insert into fotografias_externas (id_paciente, fecha_foto, descripcion) values ('$a', now(),'$b')";


if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());

/****************************************/
/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/
$select = 'select * from fotografias_externas order by id_foto desc limit 1;';
$resul = mysqli_query($conn,) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);
$ficha = $renglon['id_paciente'];

$a = $renglon['id_foto'];
$ultimo = $a;

//print "\n\nsdfasdfasdfasdfasdfa $ultimo";

rename($imagen,$ultimo);

$sentencia = "UPDATE fotografias_externas SET nombre_foto='$ultimo' WHERE id_foto='$a';";
if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());
mysqli_close($conn);

/****************************************/


		$a = '../ficha-paciente.php?id='.$ficha;
		//header('location: ../ficha-paciente.php?id='.$ficha);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';


?>

</body>
</html>