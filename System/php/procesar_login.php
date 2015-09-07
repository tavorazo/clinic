<html>
<title> Login </title>

<body>
	<?php
	@session_start();
	$a=$_POST['nombre'];
	$b=$_POST['password'];
	//echo $a;
	//echo $b;
	include("http://www.endoperio.com.mx/System/php/base.php");
	//include("base.php");
	$select = 'select * from usuarios where correo="'.$a.'" and password="'.$b.'";';
	//echo $select, "<br>";
	$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
	$renglon = mysql_fetch_assoc($resul);
	
	
	echo "Verificando. . .";
  	?>
  	<center>
	<img src="../images/35.gif" alt="">
	<?php
	if($renglon['correo']==''){
		
		echo '<br><h2>Tu inicio de sesi&oacute;n ha sido incorrecto <br> vuelve a intentar  <META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://www.endoperio.com.mx/log.php">';
	}
	else{
		$_SESSION['u']=$renglon['id_usuario'];
		//echo $renglon['id_usuario'];
		$_SESSION['rol']=$renglon['rol'];
		$_SESSION['nombres'] = $renglon['nombres'];
		echo "<br>Correcto. . .";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://www.endoperio.com.mx/System/panel.php">';
	}
	?>
	
	</body>
</html>