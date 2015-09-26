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
</head >
<body>

<div>

<?php
@session_start();
$id_usuario = $_SESSION['u'];

function edad($fecha_de_nacimiento) {
    if (is_string($fecha_de_nacimiento)) {
        $fecha_de_nacimiento = strtotime($fecha_de_nacimiento);
    }
    $diferencia_de_fechas = time() - $fecha_de_nacimiento;
    return ($diferencia_de_fechas / (60 * 60 * 24 * 365));
}



if($_FILES['imagen']['name']!=""){
copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
$imagen=$_FILES['imagen']['name'];
$imagen=htmlspecialchars($imagen);
}


$paciente = $_POST['paciente'];

$id = $_POST['id'];
$expediente = $_POST['expediente'];
$nombre = $_POST['nombre'];
$paterno = $_POST['a_pat'];
$materno = $_POST['a_mat'];
$fecha = $_POST['fechaNacimiento'];



$edad = edad($fecha);

$edad = floor($edad);



$sexo = $_POST['sexo'];

$estado = $_POST['estado'];

$ciudad = $_POST['ciudad'];

$colonia = $_POST['colonia'];

$calle = $_POST['calle'];

$CP = $_POST['cp'];

$numero = $_POST['numero'];

$telefono = $_POST['telefono'];

$celular = $_POST['celular'];

$correo = $_POST['correo'];

$nom_emergencia = $_POST['name_emergencia'];

$tel_emergencia = $_POST['tel_emergencia'];

$referencia = $_POST['referencia'];

$empresa = $_POST['empresa'];

$fecha_alta = date('Y-m-d');

$RFC = $_POST['RFC'];

$observaciones = $_POST['observaciones'];

$Num_seguro = $_POST['Num_seguro'];



include('../../php/base.php');

include('../../php/base3.php');	

$insertar = "update paciente set nombres = '$nombre', 

											apellido_paterno = '$paterno',
											apellido_materno = '$materno',
											fecha_nacimiento = '$fecha',
											estado = '$estado',
											ciudad =  '$ciudad',
											colonia = '$colonia',
											calle = '$calle',
											numero = '$numero',
											telefono = '$telefono',
											celular = '$celular',
											correo = '$correo',
											name_emergencia = '$nom_emergencia',
											tel_emergencia = '$tel_emergencia',

											referencia = '$referencia',

											empresa = '$empresa',

											RFC = '$RFC',

											observaciones = '$observaciones',

											CP = '$CP',

											sexo = '$sexo',

											n_registro = '$expediente',

											Num_seguro = '$Num_seguro' where id_paciente = '$id'";



if(!mysql_query($insertar))

	die('Error de consulta: '.mysql_error());

$id_p = $id;


$historial = "insert into historial_tabla_pacientes (id_paciente, id_usuario, estado, fecha) values ('$id_p','$id_usuario','Ha editado al paciente',now())";
if(!mysql_query($historial))
	die('Error de consulta 5: '.mysql_error());	

if($imagen!=''){

	$select = "select * from paciente where id_paciente='$id';";

	$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");

	$renglon = mysql_fetch_assoc($resul);



	$ultimo = $renglon['id_paciente'];



	rename($imagen,$ultimo);



	$sentencia = "UPDATE paciente SET foto_ingreso='$ultimo' WHERE id_paciente='$ultimo';";

	if(!mysql_query($sentencia))

		die('Error de consulta: '.mysql_error());

	mysqli_close($conn);

}



//header('location: ../../buscar-paciente.php');
echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../ficha-paciente.php?id=',$paciente,'">';



?>



</body>

</html>
