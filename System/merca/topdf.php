<?php


  if (isset($_POST["by"]))
    $by = $_POST["by"];
  
  if (isset($_POST["size"]))
    $size = $_POST["size"];
	
require_once("dompdf/dompdf_config.inc.php");
include('../php/base.php');
  $result = $conn->query("SELECT  nombres, apellido_paterno, apellido_paterno, sexo, fecha_nacimiento, edad,  correo FROM  paciente ORDER BY $by ASC LIMIT $size ");
  $return = array();
  $n_pacientes = 0;

$html = <<<HTML
  <html>
	<head>
  		<meta charset="UTF-8">
        <style type="text/css">
        </style>
    </head>
    <body>
HTML;

  while ($pacientes = $result->fetch_row()) {
    $return[$n_pacientes] = $pacientes;
    $n_pacientes++;
  }

  $html .= '<h2>Lista de '.$size.' pacientes filtrados por ' .$by.' </h2>';  
    for ($i=0; $i < $n_pacientes; $i++) {
      $html .= $i.' ';
      for ($j=0; $j< 7; $j++) {
        $html .= $return[$i][$j]. ' '; 
    }$html .='<br>';  
  }
$html .= '</body></html>';

  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->render();
  $dompdf->stream("lista.pdf");
  
?>