<?php
	include("../php/base2.php");
	
$result = mysql_query("SHOW COLUMNS FROM paciente");
?>
<table border=1>
<tr>
<?php
if (mysql_num_rows($result)> 0) {
   while ($row = mysql_fetch_assoc($result)) {
       echo "<td>",$row['Field'],"</td>";
   }
}
?>
</tr>
</table>
<?php
//ahora consultamos a la base de datos para sacar los registros contenidos
$result2 = mysql_query("SELECT * FROM paciente");
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
//echo "<tr>";
    for($i=0; $i<count($row2); $i++){
    		
        echo " ",$row2[$i]," ";
        if($i=='0')
        	echo "/";
        
    }
     echo "<br><br><hr>";
//echo "</tr>";
}
?>