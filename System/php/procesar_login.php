<html>
<title> Login </title>

<body>
	<?php
	echo "entroaqui";
	@session_start();
	$a=$_POST['nombre'];
	$b=$_POST['password'];

	require_once("base.php");

	$select = 'SELECT * from usuarios where correo="'.$a.'" and password="'.$b.'";';

	$resul = mysqli_query($select, $conn);
	$renglon = mysqli_fetch_assoc($resul);
	
	echo $resul;	
	
	echo "Verificando. . .";
  	?>
  	<center>
	<img src="../images/35.gif" alt="">
	<?php
	if($renglon['correo']==''){
		
		echo '<br><h2>Tu inicio de sesi&oacute;n ha sido incorrecto <br> vuelve a intentar  <META HTTP-EQUIV="Refresh" CONTENT="1; URL=../../log.php">';
	}
	else{
		$_SESSION['u']=$renglon['id_usuario'];
		//echo $renglon['id_usuario'];
		$_SESSION['rol']=$renglon['rol'];
		$_SESSION['nombres'] = $renglon['nombres'];
		echo "<br>Correcto. . .";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=/System/panel.php">';
	}
	mysqli_close ($conn);

	?>
	</body>
</html>