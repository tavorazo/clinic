<?php
//if (file_exists('pacientes.zip')) unlink('pacientes.zip'); //Limpia los archivos hechos antes

include('../php/base.php');
 
ini_set('max_execution_time', 300); //Si la query es muy larga no se detendrá el server hasta que termine la query

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
//header("Pragma: public");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=merca.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

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

$tabla="<table><tr><th>Nombre completo</th><th>Estado</th><th>Ciudad</th><th>Fecha de nacimiento</th><th>Edad</th>".
		"<th>Genero</th><th>Correo</th><th>Ultima consulta</th><th>Fecha</th></tr>";

while ($pacientes = $result->fetch_assoc()) {
	$tabla	.=	"<tr>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['nombre_completo'])	."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['estado'])			."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['ciudad'])			."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['fecha_nacimiento'])	."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['edad'])				."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['sexo'])				."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['correo'])			."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['observacion'])		."</td>";
	$tabla	.=	"<td style='vnd.ms-excel.numberformat:@'>".	utf8_encode($pacientes['fecha_consulta'])	."</td>";
	$tabla	.=	"</tr>";
    $i++;
}

$tabla.="</table>";

echo $tabla;

?>