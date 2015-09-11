<?php
$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');

$buscar = $_GET['id'];
?>

<a href="menu.php">Regresar</a>
<?php
$result2 = mysql_query("select * from Paciente where id_paciente='$buscar';");
echo "<h1>Ficha de Paciente</h1>";
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {

echo "<fieldset><legend>Datos Personales</legend>";
echo "Numero de ficha: ", $row2[0], "<br>";
echo "Nombre: ", $row2[1]," ", $row2[2]," ",$row2[3],"<br>";
echo "Fecha de nacimiento: ", $row2[4];
echo "<br>Sexo: ", $row2[16];
echo "<br>Referencia: ", $row2[13];
echo "<br><img src='images_pacientes/",$row2[14],"'>";
echo "</fieldset>";

echo "<fieldset><legend>Direccion</legend>";
echo "Estado: ", $row2[6],"<br>";
echo "Ciudad: ", $row2[7],"<br>";
echo "Colonia: ", $row2[8],"<br>";
echo "Calle: ", $row2[9],"<br>";
echo "Numero: ", $row2[10],"<br>";
echo "Codigo Postal: ", $row2[15], "<br>";
echo "telefono: ", $row2[11]," Celular:", $row2[12];
echo "</fieldset>";

echo "<fieldset><legend>Enfermedades</legend>";
	echo "<a href='agregar_enfermedad.php?id=",$row2[0],"'>Agregar Enfermedad</a><br><br>";
	$result3 = mysql_query("select * from Enfermedades where id_paciente='$buscar';");
	
	while ($row3 = mysql_fetch_array($result3, MYSQL_NUM)) {
		echo "Enfermedad: ", $row3[3];
		echo "<br>Descripcion: ", $row3[2],"";
		echo "<br><a href='editar_enfermedad.php?id=",$row3[0],"'>Editar</a><br><br>";
	}
echo "</fieldset>";
/*ME FALTA AGREGAR ESTAS PARTES*/
echo "<fieldset><legend>Fotografias clinicas</legend>";
	echo "<a href='agregar_foto_clinica.php?id=",$row2[0],"'>Agregar Fotografia Clinica</a><br><br>";
	$result3 = mysql_query("select * from Fotografias_Clinicas where id_paciente='$buscar' order by fecha_foto desc;");
	echo "<table>";
	while ($row_clinica = mysql_fetch_array($result3, MYSQL_NUM)) {
		echo "<tr><td><img src='fotografias_clinicas/",$row_clinica[2],"'><br>",$row_clinica[3],"</td><td>",$row_clinica[4],"</td></tr>";
	}
	echo "</table>";
echo "</fieldset>";

echo "<fieldset><legend>Fotografias Externas</legend>";
	echo "<a href='agregar_foto_externa.php?id=",$row2[0],"'>Agregar Fotografia Externa</a><br><br>";
	$result3 = mysql_query("select * from Fotografias_Externas where id_paciente='$buscar' order by fecha_foto desc;;");
	
	echo "<table>";
	while ($row_externa = mysql_fetch_array($result3, MYSQL_NUM)) {
		echo "<tr><td><img src='fotografias_externas/",$row_externa[2],"'><br>",$row_externa[3],"</td><td>",$row_externa[4],"</td></tr>";
	}
	
	echo "</table>";
echo "</fieldset>";

echo "<fieldset><legend>Radiografias</legend>";
	echo "<a href='agregar_radiografia.php?id=",$row2[0],"'>Agregar Radriografia</a><br><br>";
	$result3 = mysql_query("select * from Radiografias where id_paciente='$buscar' order by fecha_foto desc;;");
	
	echo "<table>";
	while ($row_radio = mysql_fetch_array($result3, MYSQL_NUM)) {
		echo "<tr><td><img src='radiografias/",$row_radio[2],"'><br>",$row_radio[3],"</td><td>",$row_radio[4],"</td></tr>";
	}
	
	echo "</table>";
echo "</fieldset>";
/*HASTA AQUÍ*/
/*aqui tengo que utilizar sesiones*/
echo "<fieldset><legend>Recetas</legend>";
include("base.php");

	echo "<a href='agregar_receta.php?id=",$row2[0],"'>Agregar Receta</a><br><br>";
	$result3 = mysql_query("select * from Recetas where id_paciente='$buscar' order by fecha desc limit 10;");
	echo "Ultimas 10 recetas:<br><br>";
	while ($row_receta = mysql_fetch_array($result3, MYSQL_NUM)) {
		echo "Fecha de receta: <a href='ver_receta.php?id=",$row_receta[0],"' target='_blank'>", $row_receta[5],"</a><br>";
		$select = 'select * from Usuarios where id_usuario="'.$row_receta[1].'";';
		$resul = mysqli_query($conn,) or die ("problema con la solicitud");
		$renglon = mysql_fetch_assoc($resul);
		echo "Asignada por: ", $renglon['nombres']," ", $renglon['apellido_paterno'], " ", $renglon['apellido_materno'], "<br><br>";
	}
echo "</fieldset>";
}
?>
