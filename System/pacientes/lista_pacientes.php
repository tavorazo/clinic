<?php
	include("../php/base.php");
  @session_start();
  $sucursal = $_SESSION['sucursal'];
	
$result = $conn->query("SHOW COLUMNS FROM paciente");
?>
<style>
      tr:nth-child(even){background: #f2f2f2; }
</style>

<table>
<tr><td>
<?php
if (mysqli_num_rows($result)> 0) {
   //while ($row = mysql_fetch_assoc($result)) {
   while ($row = $result->fetch_assoc()) {
       echo " | ",$row['Field']. "";
   }
}
?>
<br><br><br></td></tr>
<?php
$result2 = $conn->query(($sucursal==0) ? "SELECT * FROM paciente" : "SELECT * FROM paciente WHERE id_sucursal = $sucursal");
  while ($row2 = $result2->fetch_row()) {
echo "<tr><td>";
      for($i=0; $i<count($row2); $i++){
          echo " ",$row2[$i]," ";
          if($i=='0')
          	echo "/";
      }
       echo "<br><br><hr>";
  echo "</td></tr>";
  }
  ?>
</table>



