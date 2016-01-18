<?php
	@session_start();
	include('php/base.php');
	//include('php/base2.php');
	//include('php/base3.php');
	if($_SESSION['u']=='')
		echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
	if($_SESSION['rol']!='admin')
		echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=panel.php">';
?>

      <?php
       $result = $conn->query("SHOW COLUMNS FROM Inventario_Historial");
      ?>

<table border=1>
<tr>
<?php
if ( $result->num_rows > 0) {
   /*while ($row = mysql_fetch_assoc($result)) {
       echo "<td>",$row['Field'],"</td>";
   }*/
   echo "<td>No.</td>";
   echo "<td>Responsable de Movimiento</td>";
   echo "<td>Producto</td>";
   echo "<td>Cantidad</td>";
   echo "<td>Fecha</td>";
}
?>
</tr>

      <?php
      //ahora consultamos a la base de datos para sacar los registros contenidos
      $result2 = $conn->query("SELECT * FROM inventario_historial order by fecha desc");
      //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
      while ($row2 = $result2->fetch_row()) {
      	echo "<tr>";
          //for($i=0; $i<count($row2); $i++){

					echo "<td>",$row2[0],"</td>";
					
					$u = $row2[1];
					$p = $row2[2];
					
					$select = 'SELECT * from usuarios where id_usuario="'.$u.'";';
					
					$resul = $conn->query($select) or die ("problema con la solicitud");
               //$renglon = mysql_fetch_assoc($resul);
					$renglon = $resul->fetch_assoc();

					echo "<td>",$renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"</td>";

					$select = 'SELECT * from inventario where id_producto="'.$p.'";';
					$resul = $conn->query($select) or die ("problema con la solicitud");
					//$renglon = mysql_fetch_assoc($resul);
               $renglon = $resul->fetch_assoc();

					echo "<td>",$renglon['nombre'],"</td>";
					
					echo "<td>",$row2[3],"</td>";
					echo "<td>",$row2[4],"</td>";
              
				//}
			//echo "<td><a href='editar.php?id=",$row2[0],"'>Editar</a></td><td><a href='eliminar_noticia.php?id=",$row2[0],"'>Eliminar</a></td>";
      	echo "</tr>";
      }
      ?>
      </table>