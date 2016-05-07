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
	if($_POST['val']!=""){
		$imagen=$_POST['ruta'];
	}
	else
		$imagen="predeterminado.png";

	$expediente = $_POST['expediente'];
	$nombre = $_POST['nombre'];  if(strlen($nombre) > 50) $nombre = substr($nombre,0,50);        //Se limitan los valores que en el form pudieran ser rebazados
	$paterno = $_POST['a_pat'];  if(strlen($paterno) > 100) $paterno = substr($paterno,0,100);
	$materno = $_POST['a_mat'];  if(strlen($materno) > 100) $materno = substr($materno,0,100);
	$fecha = $_POST['fechaNacimiento'];

	$edad = edad($fecha);
	$edad = floor($edad);

	$sucursal = $_POST['sucursal'];	
	$sexo = $_POST['sexo'];			
	$estado = $_POST['estado'];		if(strlen($estado) > 100) $estado = substr($estado,0,100);
	$ciudad = $_POST['ciudad']; 	if(strlen($ciudad) > 100) $ciudad = substr($ciudad,0,100);
	$colonia = $_POST['colonia']; 	if(strlen($colonia) > 100) $colonia = substr($colonia,0,100);
	$calle = $_POST['calle']; 		if(strlen($calle) > 100) $calle = substr($calle,0,100);
	$CP = $_POST['cp']; 			if(strlen($CP) > 5) $CP = substr($CP,0,5);
	$numero = $_POST['numero'];     if(strlen($numero) > 9) $numero = substr($numero,0,9);
	$telefono = $_POST['telefono']; if(strlen($telefono) > 20) $telefono = substr($telefono,0,20);
	$celular = $_POST['celular'];	if(strlen($celular) > 20) $celular = substr($celular,0,20);
	$correo = $_POST['correo'];		if(strlen($correo) > 90) $correo = substr($correo,0,90);
	$redes_sociales = $_POST['red_social'];				if(strlen($redes_sociales) > 30) $redes_sociales = substr($redes_sociales,0,30);
	$nom_emergencia = $_POST['name_emergencia']; 		if(strlen($nom_emergencia) > 25) $nom_emergencia = substr($nom_emergencia,0,25);
	$tel_emergencia = $_POST['tel_emergencia']; 		if(strlen($tel_emergencia) > 12) $tel_emergencia = substr($tel_emergencia,0,12);
	//$tel_emergencia = abs($tel_emergencia); echo strlen($tel_emergencia);			//Se limita a que sólo haya enteros positivos
	$referencia = $_POST['referencia'];					if(strlen($referencia) > 100) $referencia = substr($referencia,0,100);
	$empresa = $_POST['empresa'];						if(strlen($empresa) > 25) $empresa = substr($empresa,0,25);
	$fecha_alta = date('Y-m-d');
	$RFC = $_POST['RFC'];								if(strlen($RFC) > 12) $RFC = substr($RFC,0,12);
	$observaciones = $_POST['observaciones'];
	$observaciones = htmlspecialchars($observaciones);
	$alergias = $_POST['alergias'];
	$Num_seguro = $_POST['Num_seguro'];					if(strlen($Num_seguro) > 8) $Num_seguro = substr($Num_seguro,0,8);
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
	$insertar = "INSERT into paciente (id_paciente, nombres,  apellido_paterno, apellido_materno, fecha_nacimiento, edad, estado, ciudad, colonia, calle, numero, telefono, celular, correo, name_emergencia, tel_emergencia, referencia, empresa, fecha_alta, RFC, observaciones, foto_ingreso, CP, sexo, n_registro, Num_seguro, n_recomendados,terminos_condiciones, redes_sociales, alergias, id_sucursal) 
				values ('$ultimo_registro','$nombre','$paterno','$materno','$fecha','$edad','$estado','$ciudad','$colonia','$calle','$numero','$telefono','$celular', '$correo', '$nom_emergencia', '$tel_emergencia', '$referencia', '$empresa', now(), '$RFC', '$observaciones', '$imagen','$CP','$sexo','$expediente', '$Num_seguro','0','$terminos','$redes_sociales', '$alergias', '$sucursal');";
	
	//$insertar = "insert into paciente (nombres,apellido_paterno, apellido_materno, fecha_nacimiento, edad, estado, ciudad, colonia, calle, numero, telefono, celular, referencia, CP, sexo, n_registro) values ('$a','$b','$c','$fecha_nac','$edad','$d','$e','$f','$g','$h', '$i', '$j', '$k', '$cp', '$sexo', '$exp')";
	$insertChk = $conn->query($insertar);
	if(!$insertChk) die('Error de consulta 4: '.mysqli_error($conn));
	$id_p = $conn->insert_id;
	$historial = "INSERT into historial_tabla_pacientes (id_paciente, id_usuario, estado, fecha) values ('$ultimo_registro','$id_usuario','Ha agregado al paciente',now())";
	$resul = $conn->query($historial);
	/****************************************/
	if($imagen!='predeterminado.png'){
		//$renglon = mysql_fetch_assoc($resul);
		$ultimo = $renglon['id_paciente'];
		//rename($imagen,$ultimo_registro);
		echo $imagen = $ultimo_registro;
		$sentencia = "UPDATE paciente SET foto_ingreso='p_".$ultimo_registro."' WHERE id_paciente='$ultimo_registro';";
		//echo "<br>".$sentencia;
		if(!$conn->query($sentencia))
			die('Error de consulta 4: '.mysqli_error($conn));
		
	}
	/****************************************/
	//header('location: ../agregar_paciente.php');

	if($insertChk){
		mysqli_close($conn);
		echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Creaci&oacute;n con &eacute;xito<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='../ficha-paciente.php?id=".$ultimo_registro."'>Ir a ficha</a>";
		//echo "<a href='../add-usuario.php' > <font color='white'>Regresar </a></center></div>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=../ficha-paciente.php?id='.$ultimo_registro.'">';
		
	}
	else{
		echo '<br><br><br><center><img src="../../images/alert.png" width="100px" alt="" style="background-color:lightblue;"> <br> ';
		echo "<p style='color:RED'><strong>Error:</strong></p> No se ha creado el paciente, por favor revise los datos<br><br><br>";
		//echo $ultimo_registro;
		mysqli_close($conn);
	}
?>
</body>
</html>