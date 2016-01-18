<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
		body{ background: #2d455f; color: #1C1C1C; }
		a, a:hover{ color: white; text-decoration: none; }
	</style>
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
		include('../php/base.php');
		//include('../php/base3.php');
		//include('../php/base2.php');
		if($_FILES['imagen']['name']!=""){
			copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
			$imagen=$_FILES['imagen']['name'];
			$imagen=htmlspecialchars($imagen);
		}
		else
			$imagen="predeterminado.png";
		if($imagen!='predeterminado.png'){
			rename($imagen,$nickname);
			$imagen = $nickname;
		}
		if (!$conn){
			die('Error de Conexion: ' .mysqli_error($conn));
		}
		
		$insertar = "INSERT into usuarios (id_usuario,nombres,apellido_paterno,apellido_materno,fecha_nacimiento,rol,correo,tel_emergencia,name_emergencia,fecha_alta,password,imagen) 
values ('$id_usuario', '$nombre',  '$paterno', '$materno', '$fecha', '$rol', '$correo', '$tel_emergencia', '$name_emergencia', '$fecha_alta', '$contra', '$imagen');";
//if(!$conn->query($insertar, $conn)){	
if(!$conn->query($insertar)){	
	echo "<br>Tal vez el nickname ya esté en uso, intenta con otro o rellena algún campo faltante<br>";
	echo "<br><a href='../add-usuario.php'>Regresar</a><br><br>";
	die('O reporta el siguiente error a tu administrador de la página: '.mysqli_error($conn));
}
//mysql_close($conn);
$conn->close();
echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
echo "Creaci&oacute;n con &eacute;xito<br><br><br>";
echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
echo "<a href='../add-usuario.php' > <font color='white'>Regresar </a></center></div>";
} 
//header('location: calendario.php');
echo'<META HTTP-EQUIV="Refresh" CONTENT="2; URL=../add-usuario.php">';
?>
</body>
</html>