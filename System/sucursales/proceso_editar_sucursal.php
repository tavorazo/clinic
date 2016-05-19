<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
</head >
<body>
	<div>
<?php
include('../php/base.php');

$post_id 			=   (isset($_POST['id_sucursal'])  ?   $_POST['id_sucursal']  :   NULL);
$post_sucursal    	=   (isset($_POST['sucursal'])  ?   $_POST['sucursal']  :   NULL);
$post_ciudad      	=   (isset($_POST['ciudad'])    ?   $_POST['ciudad']    :   NULL);
$post_domicilio   	=   (isset($_POST['domicilio']) ?   $_POST['domicilio'] :   NULL);
$post_telefono    	=   (isset($_POST['telefono'])  ?   $_POST['telefono']  :   NULL);

$query = "UPDATE sucursales SET 
		sucursal 	= 	'$post_sucursal',
		ciudad 		= 	'$post_ciudad',
		domicilio 	= 	'$post_domicilio',
		telefono 	=	'$post_telefono'
		WHERE id_sucursal = $post_id";

if(!$conn->query($query)){
	
	echo '<br><br><br><center><img src="../images/alert.png" width="100px" alt=""> <br> ';
	echo "Error! ".mysqli_error($conn)." <br>Revise los datos<br><br><br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	mysqli_close($conn);
	echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=editar_sucursal.php?id_suc='.$post_id.'">';

}
else{
	mysqli_close($conn);
	echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
	echo "Edici&oacute;n con &eacute;xito<br><br><br>";
	echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
	echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=listado_sucursales.php">';
}

?>
</div>
</body>
	</html>