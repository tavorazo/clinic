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

		<?php
		$a = $_POST['id'];
		$b = $_POST['id_paciente'];

		if($_FILES['imagen']['name']!=""){
			copy($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);
			$imagen=$_FILES['imagen']['name'];
		}
		else
			$imagen="";

		include('../../php/base.php');
		include('../../php/base3.php');
		$select = 'select * from fotografias_externas where id_foto="'.$a.'";';


		$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);
		$ficha = $renglon['id_paciente'];


		if($imagen!="")
			$ultimo = $renglon['id_foto'];
			unlink($renglon['nombre_foto']);
			rename($imagen,$ultimo);

			$insertar = "update fotografias_externas set nombre_foto='$ultimo' where id_foto='$a'";

		if(!mysql_query($insertar))
			die('Error de consulta: '.mysql_error());
		mysqli_close($conn);
		
		$a = '../ficha-paciente.php?id='.$ficha;

		echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Foto subida con exito<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo "<a href='",$a,"' > <font color='white'>Regresar </a></center></div>";
	
		
		//header('location: ../ficha-paciente.php?id='.$ficha);
		echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
		?>


  </body>
</html>