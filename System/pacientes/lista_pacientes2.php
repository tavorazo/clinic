<?php
include("../php/base2.php");
//Consultamos a la base de datos para sacar las columnas de la tabla
$result = mysql_query("SHOW COLUMNS FROM paciente");
?>
<table border=1>
<tr>
<?php
if (mysql_num_rows($result)> 0) {
   while ($row = mysql_fetch_assoc($result)) {
   	if($row['Field']!='apellido_paterno' && $row['Field']!='apellido_materno')
       echo "<td>",$row['Field'],"</td>";
   }
}
?>
</tr>
<?php
//ahora consultamos a la base de datos para sacar los registros contenidos
$result2 = mysql_query("SELECT * FROM paciente");
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
echo "<tr>";
    for($i=0; $i<count($row2); $i++){
    	if($i==1){
    		echo "<td>";
    		echo $row2[$i], " ";
    		$i++;
    		echo $row2[$i], " ";
    		$i++;
    		echo $row2[$i], " ";
    		echo "</td>";
    	}
    	else
        echo "<td>",$row2[$i],"</td>";
    }
echo "</tr>";
}
?>
</table>