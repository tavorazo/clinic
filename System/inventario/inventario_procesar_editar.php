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

//echo $c, " ", $b;
include('../php/base.php');
include('../php/base3.php');

	$insertar = "update inventario set cantidad='$total', ultimo_abastecimiento = now() where id_producto='$a'";
	$insertar2 = "insert into inventario_historial (id_usuario, id_producto, cantidad, fecha) values ('$usuario', '$a', '$c', now())";

	//print "insert into inventario_historial (id_usuario, id_producto, cantidad, fecha) values ('$usuario', '$a', '$c', now())";

if(1){

	$select = 'select * from inventario where id_producto="'.$a.'";';
	//echo $select, "<br>";
	$resul = mysqli_query($conn,) or die ("problema con la solicitud");
	$renglon = mysql_fetch_assoc($resul);
	
	$cantidad = $renglon['precio_compra'] * $c;
$instruccion3 = "insert into inventario_historial_entradas (id_producto,cantidad,total_compra,id_usuario,fecha ) values ('$a', '$c', '$cantidad', '$usuario', now());";
}
if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());
	
if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());
if($c>0)
if(!mysqli_query($conn,))
	die('Error de consulta: '.mysql_error());


mysqli_close($conn);

header ("Location: ../almacen.php");

?>