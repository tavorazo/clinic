<?php 
include('System/php/base.php');
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d");
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Panel</title>
</head>
<body>

<h1>Solicitar cita</h1>
<div>
	<form method="post" action="cita.php" >
	<p>ID. de paciente: <input type="text" name="idPaciente" id="idPaciente" required></p>
	<p>Día: <input type="date" name="dia" min="<?php echo $fechaActual; ?>" id="dia" required></p>
	<p>Hora: <select name="hora" id="hora"><?php horario(); ?> </select></p>
	<p>Descripción de la consulta<p>
	<textarea name="observacion" id="observacion" required> </textarea>
	<p>Doctor: <select name="doctor" id="doctor"> <?php doctor(); ?> </select></p>
	<input type="submit" value="Solicitar" id="solicitar">
	</form>
</div>
</body>

<?php 

$idPaciente		=	(isset($_POST['idPaciente'])?$_POST['idPaciente']:NULL);
$dia			=	(isset($_POST['dia'])?$_POST['dia']:NULL);
$hora			=	(isset($_POST['hora'])?$_POST['hora']:NULL);
$observacion	=	(isset($_POST['observacion'])?$_POST['observacion']:NULL);
$doctor			=	(isset($_POST['doctor'])?$_POST['doctor']:NULL);

if($idPaciente!=NULL && $dia!=NULL && $hora!=NULL && $observacion!=NULL && $doctor!=NULL)
	consultaNueva($idPaciente,$dia,$hora,$observacion,$doctor);

function horario(){
	$i=8;
	$j=0;
	while($i<20){
		while($j<60){
			$h = sprintf("%02s", $i);
			$m = sprintf("%02s", $j);
			echo "<option value='$h:$m'>$h : $m</option>";
			$j+=15;
		}
		$j=0;
		$i++;
	}
}

function doctor(){
	global $conn;
	$result=$conn->query("SELECT * from usuarios where rol='dentista'");
	if(!$result)
			die('Error de consulta 4: '.mysqli_error($conn));
	while ($doctores = $result->fetch_assoc()) {
		//echo $doctores['id_usuario'];
		echo "<option value='".$doctores['id_usuario']."'>".$doctores['nombres']." ".$doctores['apellido_paterno']." ".$doctores['apellido_materno']."</option>";
	}
}

function consultaNueva($idPaciente,$dia,$hora,$observacion,$doctor){
	global $conn;
	$horaMin = explode(":", $hora);

	$insert= "INSERT INTO agenda ".
			"VALUES(0,'".$doctor."','".$idPaciente."', '".date("W", strtotime($dia))."', '".date("Y", strtotime($dia))."', '".date("m", strtotime($dia))."', '".date("d", strtotime($dia))."', '".$horaMin[0]."'".
			",'".$horaMin[1]."','".$observacion."','1','0','15','".$dia."','".$idPaciente."', '".date("Y-m-d H:i:s")."' )";

	$result=$conn->query($insert);
	if(!$result)
		die('Error de consulta 4: '.mysqli_error($conn));
	else
		echo "<h1>La cita ha sido enviada, espere su confirmación</h1>";
}
?>

</html>