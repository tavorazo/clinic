<?php
		include('../php/base2.php');

		$pagina = $_GET['p'];

		if($pagina=='' || $pagina<1)
			$pagina = 0;

		$pagina = $pagina * 10;
		$sql = "SELECT * FROM paciente";
		$result = mysql_query($sql);
		$numero_de_registros = mysql_num_rows($result);

		$ultima_pagina = floor($numero_de_registros/10);


?>
<html>

<head>
<meta charset="utf-8">
	<style type="text/css">
		table{

			width:90%;
			font-weight: 200;
			margin: auto auto;
			border: gray solid 1px;
		}
		th{
			font-weight: 200;
			background: #58ACFA;
			color:	#F2F2F2;
		}
		td{
			width: 25%;
			background: #F2F2F2;
			color:	#2E2E2E;
		}
		.up{
			width: 80px;
			padding: 3px;
			color: #F2F2F2;
			background: #58ACFA;
			margin-top: 10px;
			border-radius: 10px;
			margin-left: 70%;
			box-shadow: 0

		}
		h10{
			font-weight: 100;
			font-size: 28px;
			color: #848484;
		}
		hr{
			border: solid 1px #58ACFA;
			width: 80%;
		}

	</style>

</head>

<body>
	<br><br><br><br>
	<center><h10>Panel para subir fotos </h10></center>
	<hr>
	<br><br>
	<center>
		<!--<a hreF="fotos.php">Primera Página</a>-->
	<?php
		/*echo "<a href='?p=".(($pagina/10)-1)."'> Página Anterior</a> ";
		echo " <a href='?p=".(($pagina/10)+1)."'> Página Siguiente</a>";
		echo " <a href='?p=".($ultima_pagina)."'> Última Página </a>";*/
	?>

</center>
	<table>
		<tr>
			<th>Foto</th>
			<th>ID</th>
			<th>Nombre </th>
			<th>Subir Imagen</th>
		</tr>

<?php


		//$result2 = mysql_query("SELECT * FROM paciente limit $pagina,10");
		$result2 = mysql_query("SELECT * FROM paciente");
		while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
			echo "<tr>";
				echo "<td><center><img src='../pacientes/images_pacientes/".$row2[21]."' width='100px'></center></td>";
				echo "<td><center>".$row2[0]."</center></td>";
				echo "<td>".$row2[1]." ".$row2[2]." ".$row2[3]."</td>";
				echo "<td>
					<form method='POST' action='../pacientes/images_pacientes/editar_foto.php' enctype='multipart/form-data'>
						<input type='hidden' name='id_paciente' value='".$row2[0]."'>
						<input type='hidden' name='p' value='".($pagina/10)."'>
						<input type='file' size='60' name='imagen' class='file'>
						<input type='submit' value='Subir' class='up'>
					</form>
				</td>";
			echo "</tr>";
		}
?>		
	</table>
</body>

</html>