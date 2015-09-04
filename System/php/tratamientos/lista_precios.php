

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
		include('../base3.php');
		include('../base2.php');
		setlocale(LC_MONETARY, 'en_US');
		$result = mysql_query("select * from tratamiento_dental");
		$i = 0;
		while ($row2 = mysql_fetch_array($result, MYSQL_NUM)) {
			if ($i%2 == 0) 
				$bg= "#fff";
			else
				$bg= "#E6E6E6";

			echo '<tr style="background:'.$bg.'; height:30px">';
				echo "<td>".$row2[1]."</td>";
				echo "<td>".money_format('%(#10n', $row2[2])."</td>";
				echo "<td>".money_format('%(#10n', $row2[3])."</td>";
				echo "<td>".money_format('%(#10n', $row2[4])."</td>";
				echo "<td>".money_format('%(#10n', $row2[5])."</td>";
				echo "<td> - - - </td>";
				echo "<td><a href='editar.php?id=".$row2[0]."'>Editar</a></td>";
				echo "<td><a href='eliminar.php?id=".$row2[0]."'>Eliminar</a></td>";
			echo "</tr>";
			$i++;
		}
	?>
	</table>

<?php include("../../+/footer2.php");?>
