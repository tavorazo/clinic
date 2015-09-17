<?php
	//$dbh = mysql_connect('endoperio.com.mx:3306','endoper2_git','T~J{QM=4F;Q#') or die('Error de conexion: ' . mysql_error() );
	//$base = mysql_select_db('endoper2_1', $dbh) or die('Error de seleccion de base: ' . mysql_error() );

//$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
/*

$db_host = 'endoperio.com.mx';  //  hostname
$port    = '3306';
$db_name = 'endoper2_1';  //  databasename
$db_user = 'endoper2_git';  //  username
$user_pw = '~J{QM=4F;Q#';  //  password

//new PDO('mysql:host=hotsname;port=3309;dbname=dbname', 'root', 'root');

$conn = new PDO('mysql:host='.$db_host.'; port='.$port.'; dbname='.$db_name, $db_user, $user_pw);  
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$conn->exec("SET CHARACTER SET utf8");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 */
$server = "endoperio.com.mx";
$port = "3306";
$username = "endoper2_git";
$password = "T~J{QM=4F;Q#";
$db = "endoper2_1";

$conn = new mysqli($server, $username, $password, $db,$port);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
/*if (!$conn) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;

mysqli_close($conn);*/
?>
