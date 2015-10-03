<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<title>Listo</title>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<style type="text/css" media="screen">
	body{
		background: #2d455f;
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
	@session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	$id_usuario = $_SESSION['u'];
	date_default_timezone_set("Mexico/General");
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
	else
		$imagen="predeterminado.png";

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
	$redes_sociales = $_POST['red_social'];
	$nom_emergencia = $_POST['name_emergencia'];
	$tel_emergencia = $_POST['tel_emergencia'];
	$referencia = $_POST['referencia'];
	$empresa = $_POST['empresa'];
	$fecha_alta = date('Y-m-d');
	$RFC = $_POST['RFC'];
	$observaciones = $_POST['observaciones'];
	$observaciones = htmlspecialchars($observaciones);
	$Num_seguro = $_POST['Num_seguro'];
	$terminos = $_POST['validar'];

	include('../../php/base.php');
	$select = 'SELECT * from paciente order by id_paciente desc limit 1;';
	try {
		$result = $conn->query($select);	
	} catch (Exception $e) {
		printf('Error: %s', $e->getMessage());  
	}
	$renglon = $result->fetch_assoc();
	$ultimo_registro = $renglon['id_paciente'];
	$ultimo_registro = $ultimo_registro+1;
	$insertar = "INSERT into paciente (id_paciente, nombres,  apellido_paterno, apellido_materno, fecha_nacimiento, edad, estado, ciudad, colonia, calle, numero, telefono, celular, correo, name_emergencia, tel_emergencia, referencia, empresa, fecha_alta, RFC, observaciones, foto_ingreso, CP, sexo, n_registro, Num_seguro, n_recomendados,terminos_condiciones, redes_sociales) 
				values ('$ultimo_registro','$nombre','$paterno','$materno','$fecha','$edad','$estado','$ciudad','$colonia','$calle','$numero','$telefono','$celular', '$correo', '$nom_emergencia', '$tel_emergencia', '$referencia', '$empresa', now(), '$RFC', '$observaciones', '$imagen','$CP','$sexo','$expediente', '$Num_seguro','0','$terminos','$redes_sociales');";
	
	//$insertar = "insert into paciente (nombres,apellido_paterno, apellido_materno, fecha_nacimiento, edad, estado, ciudad, colonia, calle, numero, telefono, celular, referencia, CP, sexo, n_registro) values ('$a','$b','$c','$fecha_nac','$edad','$d','$e','$f','$g','$h', '$i', '$j', '$k', '$cp', '$sexo', '$exp')";
	$conn->query($insertar);
	$id_p = $conn->insert_id;
	$historial = "INSERT into historial_tabla_pacientes (id_paciente, id_usuario, estado, fecha) values ('$ultimo_registro','$id_usuario','Ha agregado al paciente',now())";
	$resul = $conn->query($historial);
	/****************************************/
	if($imagen!='predeterminado.png'){
		//$renglon = mysql_fetch_assoc($resul);
		$ultimo = $renglon['id_paciente'];
		rename($imagen,$ultimo_registro);
		echo $imagen = $ultimo_registro;
		$sentencia = "UPDATE paciente SET foto_ingreso='$ultimo_registro' WHERE id_paciente='$ultimo_registro';";
		//echo "<br>".$sentencia;
		if(!$conn->query($sentencia))
			die('Error de consulta 4: '.mysqli_error($conn));
		mysqli_close($conn);
	}
	/****************************************/
	//header('location: ../agregar_paciente.php');
	?>
	<?php
		//echo $ultimo_registro;
	echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "Creaci&oacute;n con &eacute;xito<br><br><br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo "<a href='../ficha-paciente.php?id=".$ultimo_registro."'>Ir a ficha</a>";
		//echo "<a href='../add-usuario.php' > <font color='white'>Regresar </a></center></div>";
	echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../ficha-paciente.php?id='.$ultimo_registro.'">';
?>
</body>
</html>