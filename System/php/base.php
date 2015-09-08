<?php
	//$dbh = mysql_connect('endoperio.com.mx:3306','endoper2_git','T~J{QM=4F;Q#') or die('Error de conexion: ' . mysql_error() );
	//$base = mysql_select_db('endoper2_1', $dbh) or die('Error de seleccion de base: ' . mysql_error() );

//$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = "endoperio.com.mx:3306";
$username = "endoper2_git";
$password = "T~J{QM=4F;Q#";
$db = "endoper2_1";

$conn = new mysqli($server, $username, $password, $db);

?>
