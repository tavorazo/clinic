<?php

include("base.php");
require_once("../dompdf/dompdf_config.inc.php");

$html='
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Receta </title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="../css/agregar_receta.css?4008918636" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += " js";
  </script>
</head>
<body>
';
      
	  
$id_receta = $_GET['id'];
$select = 'SELECT * from recetas where id_receta="'.$id_receta.'";';
$resul = $conn->query($select);
$renglon = $resul->fetch_assoc();

$doctor = $renglon['id_usuario'];
$paciente = $renglon['id_paciente'];
      
$select_medico = 'SELECT * from usuarios where id_usuario="'.$doctor.'";';
$resul = $conn->query($select_medico);
$renglon_doc = $resul->fetch_assoc();

$select_paciente = 'SELECT * from paciente where id_paciente="'.$paciente.'";';
$resul = $conn->query($select_paciente);
$renglon_paciente = $resul->fetch_assoc();

$html .= "<div style='margin-left:5%'>";
$html .= '<table style="width:99%"><tr><td style="width:45%; min-height:70px; float:left;">
      <img src="../images/endoperio-logo.png" alt="" width="224" /></td>
      <td style="padding:1%; text-align: center; width:52%; background:#1F70C6; float:right;">
      <h14>Dr. Alejandro Gonzales Merlo</h14>
      <br><h15>Cirujano Dentista - Endoperiodoncista</h15>
      <br><h14>U N A M</h14>
      <br><h15>Cedula: 4831055 - Cedula Especialidad: 2630146</h15><br>
      </td></tr></table><br><hr>';

$html .= "<br><table style='width:99%'><tr><td><h3><label> Paciente:</label> "
		.$renglon_paciente['nombres']." ".$renglon_paciente['apellido_paterno']." ".$renglon_paciente['apellido_materno']."</h3></td>";
$html .= "<td style='text-align:right;'><h3><label>Fecha:</label> ".$renglon['fecha']."</h3></td></tr></table>";
$medicament = nl2br($renglon['medicamento']);
$observac   = nl2br($renglon['observaciones']);
$html .= "  <div style='border:1px solid #A9E2F3; height:45%'>
      <br><h3>".$medicament."</h3><br><br>";
$html .= "  </div><br>
      <div style='border:1px solid #A9E2F3; height:20%'>
      <h3>".$observac."</h3><br>";
$html .= "  </div>";
$html .= "  <div style='width:99%; margin-top:10px; background:#D4F2F8; padding:5px; text-align:right; '>
      <p style='color:#1F70C6;'>Planta infiernillo No. 101 Col. Electricistas Citas (443) 324 8008 Urgencias 044 443 114 4047<p></div> 
      <div style='width:99%; margin-top:10px; min-height:20px; background:#10BEE5; padding:5px'>
      <h17>www.endoperio.com.mx</h17>
      </div> 
      </div>";

$html.='</body></html>';

//echo $html;
$dompdf = new DOMPDF();
$dompdf->load_html(utf8_encode($html));
$dompdf->render();
if( file_put_contents('receta.pdf', $dompdf->output()) ) 
	header('Location: receta.pdf'); 

?>