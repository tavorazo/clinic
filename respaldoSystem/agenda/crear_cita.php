<form action="seleccionar_fecha.php" method="POST">
<select name="doctor">
<?php
/*$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/
include('../php/base.php');
//include('../php/base3.php');
$contador = 0;

	$doctor = $row2[0];
	$result2 = $conn->query("select * from Usuarios where rol='dentista';");

	while ($row3 = mysql_fetch_array($result2, MYSQL_NUM)){
		echo "<option value='",$row3[0],"'>", $row3[1]," ",$row3[2]," ",$row3[3],"</option>";
	}

?>
</select>
<br>
<input type="submit" value="Siguiente Paso">


</form>
