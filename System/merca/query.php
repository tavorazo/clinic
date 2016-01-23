<?php
if (file_exists('pacientes.zip')) unlink('pacientes.zip'); //Limpia los archivos hechos antes

include('../php/base.php');

$zip = new ZipArchive();
$zip->open('pacientes.zip', ZipArchive::CREATE);  //Inicia la funcion para comprimir en ZIP

$xml = new XMLWriter();
$xml->openMemory(); 
$xml->setIndent(true);  //Inicia la función para escribir documentos XML
$xml->startDocument(); 
 
$xml->startElement('pacientes');    //Añade el elemento principal con el valor de búsqueda como atributo
//$xml->writeAttribute($by, $buscar); 
 
ini_set('max_execution_time', 300); //Si la query es muy larga no se detendrá el server hasta que termine la query

$edad = (isset($_POST['edad'])?$_POST['edad']:NULL);
$ciudad = (isset($_POST['ciudad'])?$_POST['ciudad']:NULL);
$estado = (isset($_POST['estado'])?$_POST['estado']:NULL);
$sexo = (isset($_POST['sexo'])?$_POST['sexo']:NULL);
$fecha = (isset($_POST['fecha'])?$_POST['fecha']:NULL);
$semana = (isset($_POST['semana'])?$_POST['semana']:NULL);
$mes = (isset($_POST['mes'])?$_POST['mes']:NULL);
$orden = (isset($_POST['orden'])?$_POST['orden']:NULL);
//echo $semana;

$select = "SELECT CONCAT(p.`apellido_paterno`,' ',p.`apellido_materno`,' ',p.`nombres`) AS nombre_completo,".
				"p.`estado`,".
				"p.`ciudad`,".
				"p.`fecha_nacimiento`,".
				"p.`edad`,".
				"p.`sexo`,".
				"p.`correo`,".
				"a.`observacion`,".
				"max(a.`fecha`) as fecha_consulta ".
			"FROM agenda as a, paciente as p ";	
$where = "WHERE a.id_paciente = p.id_paciente AND a.fecha <= CURDATE() ";


if($edad!=NULL) 
	$where .= "AND p.edad like '".$edad."' ";
if($ciudad!=NULL)
	$where .= "AND p.ciudad like '%".$ciudad."%' ";
if($estado!=NULL)
	$where .= "AND p.estado like '%".$estado."%' ";
if($sexo!="A")
	$where .= "AND p.sexo like '".$sexo."%' ";

if($fecha!=NULL && $semana==NULL && $mes==NULL){
	$where .= "AND a.fecha = '".$fecha."%' ";
}
else if($fecha==NULL && $semana!=NULL && $mes==NULL){
	$fecha = date("Y-m-d", strtotime($semana));
	$where .= 'AND WEEK(a.fecha) = WEEK("'.$fecha.'") ';
}
else if($fecha==NULL && $semana==NULL && $mes!=NULL){
	$anio = strftime("%Y", strtotime($mes)); //sacar año
    $mes = strftime("%m", strtotime($mes)); //sacar mes
    $where .= 'AND YEAR(a.fecha) = "'.$anio.'" AND MONTH(a.fecha) = "'.$mes.'" ';
}
$group = "GROUP BY a.`id_paciente` ";
$orderBy = "ORDER BY p.`".$orden."` ASC";


$query=$select.$where.$group.$orderBy;
//echo $query;

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