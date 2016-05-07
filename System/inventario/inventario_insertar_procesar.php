<?php
date_default_timezone_set("Mexico/General");
session_start();
$sucursal = $_POST['sucursal'];	
$a = $_POST['nombre'];
$b = $_POST['serial'];
$c = $_POST['descripcion'];
$d = $_POST['cantidad'];
$e = $_POST['abastecer'];
$f = $_POST['minima'];
$venta = $_POST['venta'];
if ($venta == 0) 
	$pventa = 0;
else
	$pventa = $_POST['pventa'];

$pcompra = $_POST['pcompra'];

 
$tipo = $_POST['tipo_definicion'];
$usuario = $_SESSION['u'];
$a = htmlspecialchars($a);
$c = htmlspecialchars($c);
include('../php/base.php');
	$sql = 'SELECT * from inventario where numero_serial="'.$b.'";';
	$result = $conn->query($sql);
	$renglon = $result->fetch_assoc();
	//echo count($renglon);
	if(count($renglon)!=0){
		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Error! No se ha agregado el producto<br>El numero de serie ya existe<br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo '<meta http-equiv="refresh" content="2; url=../almacen.php" />';
	} 
	else{

		$instruccion = "INSERT into inventario (nombre,numero_serial,descripcion,cantidad,reabastesible,cantidad_minima,ultimo_abastecimiento, venta, precio_compra, precio_venta,tipo_definicion,id_sucursal) values ('$a','$b','$c','$d','$e','$f',now(), '$venta', '$pcompra', '$pventa','$tipo','$sucursal');";
		
		//echo $select;
		//if(!$conn->query($instruccion))
		if(!$conn->query($instruccion))
			die('Error de consulta: '.mysqli_error($conn));
		
		//$resul = $conn->query($sql) or die ("problema con la solicitud");
		//$renglon = mysql_fetch_assoc($resul);
		$result = $conn->query($sql);
		$renglon = $result->fetch_assoc(); 
		$producto = $renglon['id_producto'];

		$total = $d * $pcompra;
		$instruccion2 = "INSERT into inventario_historial_entradas (id_producto,cantidad,total_compra,id_usuario,fecha ) values ('$producto', '$d', '$total', '$usuario', now());";
		//if(!$conn->query($instruccion2))
		if(!$conn->query($instruccion2))
			die('Error de consulta: '.mysqli_error($conn));

		mysqli_close($conn);

		echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
		echo "Creaci&oacute;n con &eacute;xito<br><br><br>";
		echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
		echo '<meta http-equiv="refresh" content="2; url=../almacen.php" />';
	}
	
?>