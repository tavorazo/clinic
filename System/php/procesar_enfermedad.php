<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listo</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->

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
$a = $_POST['nombre'];
$b = $_POST['descripcion'];

$c = $_POST['id'];


include('base3.php');

$insertar = "insert into enfermedades (id_paciente, tipo_enfermedad, nombre_enfermedad) values ('$c','$b','$a')";

if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());
mysqli_close($conn);
$pagina = "../pacientes/ficha-paciente.php?id=".$c;

echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
echo "Cita creada con exito<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';

echo "<a href='",$pagina,"' > <font color='white'>Regresar </a></center></div>";

echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=',$pagina,'">';

?>
  </body>
</html>
