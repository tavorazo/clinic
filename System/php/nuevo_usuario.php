<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Panel Administrador</title>
</head>
<body>
	<?php
	$nombre = $_POST['nombre'];
	$paterno = $_POST['a_pat'];
	$materno = $_POST['a_mat'];
	$fecha = $_POST['fecha_nacimiento'];
	$rol = $_POST['rol'];
	$correo = $_POST['correo'];
	$tel_emergencia = $_POST['tel_emergencia'];
	$name_emergencia = $_POST['name_emergencia'];
	$fecha_alta = date('Y-m-d');
	$nickname = $_POST['nickname'];
	$contra = $_POST['contra'];
	$contraR = $_POST['contraR'];
	if(strcmp($contra,$contraR)!=0)
		echo 'No coinciden las contrasenias';
	else {
		$id_usuario = "$nickname-$rol[0]";
		include('base.php');
		//include('base3.php');
		//include('base2.php');
		if (!$conexion){
			die('Error de Conexion: ' .mysqlI_error($conn));
		}
$insertar = "INSERT into usuarios (id_usuario, nombres, apellido_paterno, apellido_materno, fecha_nacimiento, rol, correo, tel_emergencia, name_emergencia, fecha_alta, password) 
	values ('$id_usuario', '$nombre',  '$paterno', '$materno', '$fecha', '$rol', '$correo', '$tel_emergencia', '$name_emergencia', '$fecha_alta', '$contra');";

//if(!mysql_query($insertar))
if(!$conn->query($insertar))
	die('Error de consulta: '.mysqli_error($conn));
mysqli_close($conn);
}
?>
<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../add-usuario.php">
</body>
</html>
