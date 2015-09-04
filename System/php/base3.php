<?php
$conexion = mysql_connect('localhost', 'endoper2_1', 'qW0!eX-Lk19k');
if (!$conexion){
	die('Error de Conexion: ' .mysql_error());
}

$conexion_base=mysql_select_db('endoper2_1', $conexion);

if (!$conexion_base) {
	die('Error de seleccion de base: ' .mysql_error());
	echo "Error en la conexion";
}
?>
