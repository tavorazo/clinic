<?php
error_reporting(E_ALL & ~E_NOTICE);
$server = "endoperio.com.mx";
$port = "3306";
$username = "endoper2_git";
$password = "T~J{QM=4F;Q#";
$db = "endoper2_1";
 try{
  //$conn = new PDO("mysql:host=$server;dbname= $db;charset=UTF8", $username, $password); 
  $conn = new mysqli($server, $username, $password, $db,$port);
} catch( PDOExecption $e ) { 
    print "Error!: " . $e->getMessage() . "</br>"; 
}
?>
