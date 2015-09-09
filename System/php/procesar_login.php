<html>
<title> Login </title>

<body>
	<?php
	@session_start();
	$a=$_POST['nombre'];
	$b=$_POST['password'];

	require_once("base.php");

	$select = 'SELECT * from usuarios where correo="'.$a.'" and password="'.$b.'";';

	$resul = mysqli_query($select, $conn);
	$renglon = mysqli_fetch_assoc($resul);
	
	echo $a . "  ----  " .$b;
	
	echo "Verificando. . .";
  	?>
  	<center>
	<img src="../images/35.gif" alt="">
	<?php
	if($renglon['correo']==''){
		
		echo '<br><h2>Tu inicio de sesi&oacute;n ha sido incorrecto <br> vuelve a intentar  <META HTTP-EQUIV="Refresh" CONTENT="10; URL=../../log.php">';
	}
	else{
		$_SESSION['u']=$renglon['id_usuario'];
		//echo $renglon['id_usuario'];
		$_SESSION['rol']=$renglon['rol'];
		$_SESSION['nombres'] = $renglon['nombres'];
		echo "<br>Correcto. . .";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../panel.php">';
	}
	mysqli_close ($conn);

	?>
	</body>
</html>