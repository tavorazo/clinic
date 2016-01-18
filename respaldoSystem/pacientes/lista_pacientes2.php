<?php
include("../php/base.php");
//Consultamos a la base de datos para sacar las columnas de la tabla
$result = $conn->query("SHOW COLUMNS FROM paciente");
?>
<style>
      tr:nth-child(even){background: #f2f2f2; }
</style>

<table >
<tr>
<?php
if ($result->fetch_row() > 0) {
   while ($row = $result->fetch_assoc()) {
   	if($row['Field']!='apellido_paterno' && $row['Field']!='apellido_materno')
       echo "<td>",$row['Field'],"</td>";
   }
}
?>
</tr>
<?php
//ahora consultamos a la base de datos para sacar los registros contenidos
$result2 = $conn->query("SELECT * FROM paciente");
while ($row2 = $result2->fetch_row()) {
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