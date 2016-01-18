<?php
$u= $_SESSION['u'];
$id=$_GET['id'];
$name=$_GET['n'];
$apell1=$_GET['a1'];
$apell2=$_GET['a2'];
$fechaN=$_GET['fn'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curriculum</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="../css/s1.css"/>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>
	<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
</head>
<body>
	<?php
	echo "<a href='../panel.php'><img src='images/endoperio-logo.png' width='200px' style='margin-left:120px; margin-top:40px; float:left'></a>
	<h9 style='position:absolute; margin-top:62px; margin-left:40px '> Curiculum  ";
	echo $name," ",$apell1," ",$apell2,"</h9><br><br><br><br><br><br>";
	
	echo "<br><br><center><a href='clinica.php'>Regresar</a></center>";
	echo '<div style="margin:auto auto; border:0px solid #D8D8D8; padding:15px; width:600px; height:300px">';
	
	include('php/base.php');
	$select = 'SELECT * from curriculum where id_usuario="'.$id.'";';
	$resul = $conn->query($select) or die ("problema con la solicitud");
	//$renglon = mysql_fetch_assoc($resul);
	$renglon = $resul->fetch_assoc();
	echo "<hr><h19><br>",nl2br($renglon['descripcion']),"</h19><br><hr>";
	?>
</div>
</body>
</html>   