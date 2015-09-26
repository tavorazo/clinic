<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
  <link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
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
$a = $_POST['id'];
$b = $_POST['descripcion'];
  date_default_timezone_set("Mexico/General");
if($_FILES['imagen']['name']!=""){
	copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
	$imagen=$_FILES['imagen']['name'];
	$imagen=htmlspecialchars($imagen);
}
else
	$imagen="";

//echo $a;
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

$insertar = "insert into radiografias (id_paciente, fecha_foto, descripcion) values ('$a', now(),'$b')";


if(!mysql_query($insertar, $conexion))
	die('Error de consulta: '.mysql_error());

/****************************************/
/*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
$base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/
$select = 'select * from radiografias order by fecha_foto desc limit 1;';
$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);

$ultimo = $renglon['id_foto'];

//print "\n\nsdfasdfasdfasdfasdfa $ultimo";

rename($imagen,$ultimo);

$sentencia = "UPDATE radiografias SET nombre_foto='$ultimo' WHERE id_foto='$ultimo';";
if(!mysql_query($sentencia, $conexion))
	die('Error de consulta: '.mysql_error());
mysql_close($conexion);

/****************************************/
$pagina = '../ficha-paciente.php?id='.$a;
//echo "<a href='",$pagina,"'>Regresar</a>";

echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
echo "Foto subida con exito<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';

echo "<a href='",$pagina,"' > <font color='white'>Regresar </a></center></div>";



?>
<meta http-equiv="Refresh" content="1;url= <?php echo $pagina; ?>" >

  </body>
</html>