<?php
@session_start();
date_default_timezone_set("Mexico/General");
$a = $_POST['id'];
$b = $_POST['cantidad'];
$c = $_POST['nueva_cantidad'];
if($c=='')
	$c=0;
$usuario = $_SESSION['u'];
$total = $b + $c;
include('../php/base.php');
$insertar = "UPDATE inventario set cantidad='$total', ultimo_abastecimiento = now() where id_producto='$a'";
$insertar2 = "INSERT into inventario_historial (id_usuario, id_producto, cantidad, fecha) values ('$usuario', '$a', '$c', now())";
if(1){
	$sql = 'SELECT * from inventario where id_producto="'.$a.'";';
	//echo $select, "<br>";
	//$resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
	$result = $conn->query($sql);
	while ($renglon = $result->fetch_assoc()) {
	//$renglon = mysql_fetch_assoc($resul);
	$cantidad = $renglon['precio_compra'] * $c;
	$instruccion3 = "INSERT into inventario_historial_entradas (id_producto,cantidad,total_compra,id_usuario,fecha ) values ('$a', '$c', '$cantidad', '$usuario', now());";
	}
}
//if(!mysql_query($insertar))
if(!$conn->query($insertar))
	die('Error de consulta: '.mysqli_error());
//if(!mysql_query($insertar2))
if(!$conn->query($insertar2))
	die('Error de consulta: '.mysqli_error());
if($c>0)
	//if(!mysql_query($instruccion3))
	if(!$conn->query($instruccion3))
		die('Error de consulta: '.mysqli_error());
	mysqli_close($conn);
	header ("Location: ../almacen.php");
?>