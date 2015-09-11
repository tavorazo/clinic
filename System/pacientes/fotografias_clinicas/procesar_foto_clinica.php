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

include('../../php/base.php');
include('../../php/base3.php');

$insertar = "insert into fotografias_clinicas (id_paciente, fecha_foto, descripcion) values ('$a', now(),'$b')";


if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());

$select = 'select * from fotografias_clinicas order by fecha_foto desc limit 1;';
$resul = mysqli_query($conn,) or die ("problema con la solicitud");
$renglon = mysql_fetch_assoc($resul);

$ultimo = $renglon['id_foto'];

rename($imagen,$ultimo);

$sentencia = "UPDATE fotografias_clinicas SET nombre_foto='$ultimo' WHERE id_foto='$ultimo';";
if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());
mysqli_close($conn);

/****************************************/
$pagina = '../ficha-paciente.php?id='.$a;

echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
echo "Foto subida con exito<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';

echo "<a href='",$pagina,"' > <font color='white'>Regresar </a></center></div>";

?>
<meta http-equiv="Refresh" content="2;url= <?php echo $pagina; ?>" >

  </body>
</html>