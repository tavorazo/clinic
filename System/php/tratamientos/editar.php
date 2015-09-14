<?php 
	$titulo = "Editar precio tratamiento";
	$enlace = "lista_precios.php";
	include("../../+/head2.php");
?>
<h3>Editar precio tratamiento</h3>
<br><br><br>

	<?php
		include('../base.php');
		include('../base3.php');
		include('../base2.php');

		$id = $_GET['id'];
		$select = 'select * from tratamiento_dental where id_tratamiento="'.$id.'";';
		$resul = mysqli_query($conn,) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);
	?>

	<form method="POST" action="procesar_editar.php">
		<label style="float:left; margin-right:120px;">Tratamiento: </label><input class="campoT" type="text" name="nombre" value="<?php echo $renglon['tratamiento'];?>"><br>
		<label style="float:left; margin-right:150px;">Precio 1: </label><input class="campoT" type="text" name="p1" value="<?php echo $renglon['precio_1'];?>"><br>
		<label style="float:left; margin-right:150px;">Precio 2: </label><input class="campoT" type="text" name="p2" value="<?php echo $renglon['precio_2'];?>"><br>
		<label style="float:left; margin-right:150px;">Precio 3: </label><input class="campoT" type="text" name="p3" value="<?php echo $renglon['precio_3'];?>"><br>
		<label style="float:left; margin-right:150px;">Precio 4: </label><input class="campoT" type="text" name="p4" value="<?php echo $renglon['precio_4'];?>"><br>
		<label style="float:left; margin-right:150px;">Precio 5: </label><input class="campoT" type="text" name="p5" value="<?php echo $renglon['precio_5'];?>"><br>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="submit" value="Editar">
	</form>

<?php include("../../+/footer2.php");?>
