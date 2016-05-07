<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Panel Administrador</title>
      <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
</head>
<body>
<?php
$id = $_POST['nickname'];
include('../php/base.php');
//include('../php/base3.php');
//include('../php/base2.php');
$sucursal = $_POST['sucursal'];	
$nombre = $_POST['nombre'];
$paterno = $_POST['a_pat'];
$materno = $_POST['a_mat'];
$fecha = $_POST['fecha_nacimiento'];
$correo = $_POST['correo'];
$nom_emergencia = $_POST['name_emergencia'];
$tel_emergencia = $_POST['tel_emergencia'];
$password = $_POST['contra'];
$imagen_vieja = $_POST['imagen_vieja'];
if($_FILES['imagen']['name']!=""){
copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
$imagen=$_FILES['imagen']['name'];
$imagen=htmlspecialchars($imagen);
}
else
$imagen="";
if($imagen!=''){
	rename($imagen,$id);
	$imagen = $id;
}else
	$imagen = $imagen_vieja;
$insertar = "UPDATE usuarios set nombres = '$nombre', 		apellido_paterno = '$paterno',		apellido_materno = '$materno',
				fecha_nacimiento = '$fecha',	name_emergencia = '$nom_emergencia',	tel_emergencia = '$tel_emergencia',
				correo = '$correo', 		password = '$password', imagen = '$imagen', id_sucursal='$sucursal'	 where id_usuario = '$id';";
//if(!$conn->query($insertar))
if(!$conn->query($insertar))
	die('Error de consulta: '.mysqli_error($conn));
mysqli_close($conn);
	
//header('location: lista_usuarios.php');
?>
<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../php/lista_usuarios.php">
</body>
</html>
