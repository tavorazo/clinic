<?php
	@session_start();
	include('../php/base.php');
	include('../php/base2.php');
	include('../php/base3.php');
	if($_SESSION['u']=='')
		header('location: ../../index.php');
	if($_SESSION['rol']!='admin')
		if($_SESSION['rol']!='almacen')
			header('location: ../panel.php');
	$fecha=$_GET['fecha'];
$ano=$_GET['ano'];
$mes=$_GET['mes'];
$dia=$_GET['dia'];
	
$MESCOMPLETO[1] = 'Enero';
$MESCOMPLETO[2] = 'Febrero';
$MESCOMPLETO[3] = 'Marzo';
$MESCOMPLETO[4] = 'Abril';
$MESCOMPLETO[5] = 'Mayo';
$MESCOMPLETO[6] = 'Junio';
$MESCOMPLETO[7] = 'Julio';
$MESCOMPLETO[8] = 'Agosto';
$MESCOMPLETO[9] = 'Septiembre';
$MESCOMPLETO[10] = 'Octubre';
$MESCOMPLETO[11] = 'Noviembre';
$MESCOMPLETO[12] = 'Diciembre';

?>

      <?php
      /*$host="localhost";
      $usuario="root";
      $contrasena="12qwaszx";
      $bdd="Endoperio";
      $tabla="Inventario_Historial";
      mysql_connect($host,$usuario,$contrasena);
      mysql_select_db($bdd);
      //Consultamos a la base de datos para sacar las columnas de la tabla*/
      $result = $conn->query("SHOW COLUMNS FROM Inventario_Historial");
      ?>

<table border=1>
<tr>
<?php
if (mysql_num_rows($result)> 0) {
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
<h1>Historial de fecha <?php echo $dia," ", $MESCOMPLETO[$mes]," ", $ano;?></h1>
      <?php
      //ahora consultamos a la base de datos para sacar los registros contenidos
      $result2 = $conn->query("SELECT * FROM Inventario_Historial where fecha like '%$fecha%' order by fecha desc");
      while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
      	echo "<tr>";
          //for($i=0; $i<count($row2); $i++){

					echo "<td>",$row2[0],"</td>";
					
					$u = $row2[1];
					$p = $row2[2];
					
					$select = 'select * from usuarios where id_usuario="'.$u.'";';
					
					$resul = $conn->query($select) or die ("problema con la solicitud");
					$renglon = mysql_fetch_assoc($resul);

					echo "<td>",$renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"</td>";

					$select = 'select * from inventario where id_producto="'.$p.'";';
					$resul = $conn->query($select) or die ("problema con la solicitud");
					$renglon = mysql_fetch_assoc($resul);

					echo "<td>",$renglon['nombre'],"</td>";
					
					echo "<td>",$row2[3],"</td>";
					echo "<td>",$row2[4],"</td>";
              
				//}
			//echo "<td><a href='editar.php?id=",$row2[0],"'>Editar</a></td><td><a href='eliminar_noticia.php?id=",$row2[0],"'>Eliminar</a></td>";
      	echo "</tr>";
      }
      ?>
      </table>