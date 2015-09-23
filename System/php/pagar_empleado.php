<?php
include("base.php");
		///include("base3.php");
$id_usuario = $_POST['id_usuario'];
$sueldo = $_POST['sueldo'];
$vacaciones = $_POST['vacaciones'];
$aguinaldo = $_POST['aguinaldo'];
$aguinaldo_= $_POST['aguinaldo_'];
$vacaciones_ = $_POST['vacaciones_'];
$total = $sueldo;
$semana = date(W);
$y = date(Y);
if($aguinaldo_=='2')
	$total = $total + $aguinaldo;
if($vacaciones_=='2')
	$total = $total + $vacaciones;
if($aguinaldo_=='2' && $vacaciones_=='2')
	$insertar = "INSERT into nomina_historial (id_usuario, sueldo, vacaciones, aguinaldo, pago_total, fecha, aprobada, semana, y) 
values ('$id_usuario','$sueldo','$vacaciones','$aguinaldo', '$total', now(),'0','$semana','$y');";
if($aguinaldo_=='2' && $vacaciones_=='1')
	$insertar = "INSERT into nomina_historial (id_usuario, sueldo, vacaciones, aguinaldo, pago_total, fecha, aprobada, semana, y) 
values ('$id_usuario','$sueldo','0','$aguinaldo', '$total', now(),'0','$semana','$y');";
if($aguinaldo_=='1' && $vacaciones_=='2')
	$insertar = "INSERT into nomina_historial (id_usuario, sueldo, vacaciones, aguinaldo, pago_total, fecha, aprobada, semana, y) 
values ('$id_usuario','$sueldo','$vacaciones','0', '$total', now(),'0','$semana','$y');";
if($aguinaldo_=='1' && $vacaciones_=='1')
	$insertar = "INSERT into nomina_historial (id_usuario, sueldo, vacaciones, aguinaldo, pago_total, fecha, aprobada, semana, y) 
values ('$id_usuario','$sueldo','0','0', '$total', now(),'0','$semana','$y');";
if(!$conn->query($insertar))
	die('Error de consulta: '.mysqli_error($conn));
//if(!mysql_query($insertar, $conexion))
//	die('Error de consulta: '.mysql_error());
//mysql_close($conexion);
$conn->close();
echo "Pago realizado con &eacute;xito<br><a href='nomina_personal.php?id=",$id_usuario,"'>Regresar</a>";
?>