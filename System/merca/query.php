<?php
if (file_exists('pacientes.zip')) unlink('pacientes.zip'); //Limpia los archivos hechos antes

include('../php/base.php');

$by = $_POST['by'];
$buscar = $_POST['buscar'];

$zip = new ZipArchive();
$zip->open('pacientes.zip', ZipArchive::CREATE);  //Inicia la funcion para comprimir en ZIP

$xml = new XMLWriter();
$xml->openMemory(); 
$xml->setIndent(true);  //Inicia la función para escribir documentos XML
$xml->startDocument(); 
 
$xml->startElement('pacientes');    //Añade el elemento principal con el valor de búsqueda como atributo
$xml->writeAttribute($by, $buscar); 
 
ini_set('max_execution_time', 300);


if($by=='fecha')
	$by="a.".$by;
else
	$by="p.".$by; 

$query = "SELECT CONCAT(p.`nombres`, ' ', p.`apellido_paterno`, ' ', p.`apellido_materno`) AS nombre_completo,".
				"p.`id_paciente`,".
				"p.`estado`,".
				"p.`ciudad`,".
				"p.`fecha_nacimiento`,".
				"p.`edad`,".
				"p.`sexo`,".
				"p.`correo`,".
				"a.`observacion`,".
				"max(a.`fecha`) as fecha_consulta ".
			"FROM agenda as a, paciente as p ".
			"WHERE a.id_paciente = p.id_paciente AND ".$by." LIKE '".$buscar."%' AND a.fecha <= CURDATE() ".
			"GROUP BY a.`id_paciente` ".
			"ORDER BY p.`id_paciente` ASC";
			
$result=$conn->query($query);
if(!$result)
			die('Error de consulta 4: '.mysqli_error($conn));
		
$return = array();
$i = 0;

while ($pacientes = $result->fetch_assoc()) {
	$xml->startElement('paciente');  //Cada paciente es un elemento
	$xml->writeElement('nombre_completo',utf8_encode($pacientes['nombre_completo']));
	$xml->writeElement('estado',utf8_encode($pacientes['estado']));
	$xml->writeElement('ciudad',utf8_encode($pacientes['ciudad']));
	$xml->writeElement('fecha_nacimiento',utf8_encode($pacientes['fecha_nacimiento']));
	$xml->writeElement('edad',utf8_encode($pacientes['edad']));
	$xml->writeElement('sexo',utf8_encode($pacientes['sexo']));
	$xml->writeElement('correo',utf8_encode($pacientes['correo']));
	$xml->writeElement('ultima_consulta',utf8_encode($pacientes['observacion']));
	$xml->writeElement('fecha_consulta',utf8_encode($pacientes['fecha_consulta']));
	$xml->endElement();
    $i++;
}
$xml->endElement();

file_put_contents('pacientes.xml', $xml->flush(true), FILE_APPEND); //Escribe el archivo

$zip->addFile('pacientes.xml', 'pacientes.xml');  //Dentro del zip se guardará el archivo pacientes.xml con la misma dirección dentro del archivo
$zip->close();
unlink('pacientes.xml');  //Borra el archivo xml con el fin de no tener archivos extra en el servidor
header('Location: pacientes.zip');

?>