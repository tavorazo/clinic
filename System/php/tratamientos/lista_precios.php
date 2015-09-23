

<?php 
	$titulo = "Lista de precios";
	$enlace = "../../panel.php";
	include("../../+/head2.php"); 
?>
<h3>Lista de precios</h3>
<br><br><br><br><br>

	<table style="width:100%; padding:20px">
		<tr style="background:#A9D0F5;  height:30px">
			<th>Tratamiento</th>
			<th>Precio 1</th>
			<th>Precio 2</th>
			<th>Precio 3</th>
			<th>Precio 4</th>
			<th>Precio 5</th>
			<th colspan="2">Acciones</th>

		</tr>
	<?php
		include('../base.php');
		setlocale(LC_MONETARY, 'en_US');
		//$result = mysql_query("select * from tratamiento_dental");
		$i = 0;

		$sql = "SELECT * FROM tratamiento_dental";
    	$result = $conn->query($sql);
		while ($tratamiento = $result->fetch_assoc()) {
			if ($i%2 == 0) 
				$bg= "#fff";
			else
				$bg= "#E6E6E6";

			echo '<tr style="background:'.$bg.'; height:30px">';
				echo "<td>".$tratamiento['tratamiento']."</td>";
				echo "<td>".money_format('%(#10n', $tratamiento['precio_1'])."</td>";
				echo "<td>".money_format('%(#10n', $tratamiento['precio_2'])."</td>";
				echo "<td>".money_format('%(#10n', $tratamiento['precio_3'])."</td>";
				echo "<td>".money_format('%(#10n', $tratamiento['precio_4'])."</td>";
				echo "<td> - - - </td>";
				echo "<td><a href='editar.php?id=".$tratamiento['id_tratamiento']."'>Editar</a></td>";
				echo "<td><a href='eliminar.php?id=".$tratamiento['id_tratamiento']."'>Eliminar</a></td>";
			echo "</tr>";
			$i++;
		}
	?>
	</table>

<?php include("../../+/footer2.php");?>
