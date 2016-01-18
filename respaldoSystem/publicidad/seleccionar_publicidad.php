<?php
include('../php/base.php');
//include('../php/base3.php');
//include('../php/base2.php');
//$result2 = $conn->query("SELECT * from publicidad");
echo "<h1>Costado</h1><br><br>";
echo "<form action='actualizar.php' method='POST'>";
//while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
$result2 = $conn->query("SELECT * from publicidad");
while ($row2 = $result2->fetch_row()){
	echo "<input type='radio' name='costado' value='".$row2[0]."'>";
	echo $row2[2];
	echo "<br><img src='images/".$row2[1]."'><br>";
}
echo "<h1>Abajo</h1><br><br>";
//$result2 = $conn->query("select * from publicidad");
//while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
$result2 = $conn->query("SELECT * from publicidad");
while ($row2 = $result2->fetch_row()){
	echo "<input type='radio' name='abajo' value='".$row2[0]."'>";
	echo $row2[2];
	echo "<br><img src='images/".$row2[1]."'><br>";
}
echo "<br><br><input type='submit' value='Cambiar'>";
echo "</form>";
?>