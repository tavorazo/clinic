<?php


  if (isset($_POST["by"]))
    $by = $_POST["by"];
  
  if (isset($_POST["size"]))
    $size = $_POST["size"];

	
include('../php/base.php');




function to_pdf($return, $n_pacientes){
  require_once("dompdf/dompdf_config.inc.php");

$html = <<<HTML
  <html>
  <head>
      <meta charset="UTF-8">
        <style type="text/css">
        </style>
    </head>
    <body>
HTML;

  $html .= '<h2>Lista de '.$size.' pacientes filtrados por ' .$by.' </h2>';  
    for ($i=0; $i < $n_pacientes; $i++) {
      $html .= ($i+1).' ';
      for ($j=0; $j< 7; $j++) {
        $html .= $return[$i][$j]. ' '; 
    }$html .='<br>';  
  }
  $html .= '</body></html>';

  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->render();
  $dompdf->stream("lista.pdf");
}




//function main()
  $n_pacientes = 0;
  $return = array();  

  if ($size != 0){
    $sql = "SELECT  nombres, apellido_paterno, apellido_paterno, sexo, fecha_nacimiento, edad,  correo FROM  paciente ORDER BY $by ASC LIMIT $size ";
    $result = $conn->query($sql);
    while ($pacientes = $result->fetch_row()) {
        $return[$n_pacientes] = $pacientes;
        $n_pacientes++;
    }
    to_pdf($return, $n_pacientes);
  }else{
    $from = 0;
    $to = 1000;
      //cuento registros
    $sql = "SELECT  nombres, apellido_paterno, apellido_paterno, sexo, fecha_nacimiento, edad,  correo FROM  paciente ORDER BY $by ";
    $result = $conn->query($sql);
    $row_cnt = $result->num_rows;
      //hago querys

      $sql = "SELECT  nombres, apellido_paterno, apellido_paterno, sexo, fecha_nacimiento, edad,  correo FROM  paciente ORDER BY $by ASC LIMIT $row_cnt";
      $result = $conn->query($sql);      
      while ($pacientes = $result->fetch_row()) {
        $return[$n_pacientes] = $pacientes;
        $n_pacientes++;
      }
      to_pdf($return, $row_cnt);
      //$from = $from + $to;
      //$to = $to + $to;
      //$n_pacientes = 0; //retorno a 0 el indice de arreglo

  }


?>