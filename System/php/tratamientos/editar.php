<?php 
$titulo = "Editar precio tratamiento";
$enlace = "lista_precios.php";
include("../../+/head2.php");
?>
<h3>Editar precio tratamiento</h3>
<br><br><br>
<?php
include('../base.php');
$id = $_GET['id'];
$sql = 'SELECT * FROM tratamiento_dental where id_tratamiento="'.$id.'"';
if ($resultado = $conn->query($sql)) {
	while ($precio = $resultado->fetch_row()) {
		?>
		<form method="POST" action="procesar_editar.php">
			<label style="float:left; margin-right:120px;">Tratamiento: </label><input class="campoT" type="text" name="nombre" value="<?php echo $precio[1];?>"><br>
			<label style="float:left; margin-right:150px;">Precio 1: </label><input class="campoT" type="text" name="p1" value="<?php echo $precio[2];?>"><br>
			<label style="float:left; margin-right:150px;">Precio 2: </label><input class="campoT" type="text" name="p2" value="<?php echo $precio[3];?>"><br>
			<label style="float:left; margin-right:150px;">Precio 3: </label><input class="campoT" type="text" name="p3" value="<?php echo $precio[4];?>"><br>
			<label style="float:left; margin-right:150px;">Precio 4: </label><input class="campoT" type="text" name="p4" value="<?php echo $precio[5];?>"><br>
			<label style="float:left; margin-right:150px;">Precio 5: </label><input class="campoT" type="text" name="p5" value="<?php echo $precio[6];?>"><br>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="submit" value="Editar">
		</form>
		<?php   
	}
	$resultado->close();
} 
include("../../+/footer2.php");?>
