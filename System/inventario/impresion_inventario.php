<?php
//---------Es similar a funciones_historial.php sólo que en lugar de hacer echos se almacena todo en la variable $html
require_once("../dompdf/dompdf_config.inc.php");

if(isset($_GET["date"])) 
  $date = $_GET['date'];
else
  $date = '';
if(isset($_GET["month"])) 
  $month = $_GET['month'];
else
  $month = '';
if(isset($_GET["week"])) 
  $week = $_GET['week'];
else
  $week = '';


function paint($material, $usuario, $cantidad, $fecha){
  return '<tr><td>'.$material.'</td><td>'.$usuario.'</td><td>'.$cantidad.'</td><td>'.$fecha.'</td></tr>';
}

function get_user($id){
  include("../php/base.php"); 
  $result = $conn->query('SELECT nombres, apellido_paterno FROM usuarios WHERE id_usuario="'.$id.'"');
  $name = $result->fetch_row();
  return $name[0]." ".$name[1]." - ";
}

function get_producto($id){
  include("../php/base.php"); 
  $result = $conn->query('SELECT * FROM inventario WHERE id_producto ='.$id);
  $producto = $result->fetch_row();
  return $producto[1]." - ";
}

$html = '<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Inventario</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/agendatabla.css" />
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += " js";
  </script>
  <style>
    h2{ font-size: 19px; color:#333; margin-bottom: 10px;}
    h5{ font-size: 13px; color:#333; margin:auto 0 10px 0;}
    h5 strong{ color:#FA5858; font-weight:300;}
  </style>
</head>
<body>';

  include("../php/base.php"); 
  //buscar el dia de hoy
  $html.="<img src='../images/endoperio-logo.png' width='25%'/>";
  if ($date == '' && $month == '' && $week == '') {
    $date =date('Y-m-d');
    $html.= "<br><br><h2 style='text-align: right;'> Historial del dia de hoy ( ".$date." )<br><br> </h2>";
	$html.= "<table>";
    $html.= "<tr><td>Material usado</td><td>Encargado de movimiento</td><td>Cantidad</td><td>Fecha</td></tr>";
    $result = $conn->query('SELECT * FROM inventario_historial WHERE CAST( fecha AS DATE ) =  "'.$date.'" order by fecha desc');
    while ($xdia = $result->fetch_row()) {
      $html .= paint(get_producto($xdia[2]), get_user($xdia[1]),$xdia[3] , $xdia[4] );
    }
  }
  //buscar dia especifico
  else if ($date != '' && $month == '' && $week == '') {
    $html.= "<br><br><h2 style='text-align: right;'> Historial del dia ( ".$date." )<br><br> </h2>";
	$html.= "<table>";
	$html.= "<tr><td>Material usado</td><td>Encargado de movimiento</td><td>Cantidad</td><td>Fecha</td></tr>";
    $result = $conn->query('SELECT * FROM inventario_historial WHERE CAST( fecha AS DATE ) =  "'.$date.'" order by fecha desc');
    while ($xdia = $result->fetch_row()) {
      $html .= paint(get_producto($xdia[2]), get_user($xdia[1]),$xdia[3] , $xdia[4] );
    }  
  }
  //buscar por mes especifico
  else if ($date == '' && $month != '' && $week == '') {
    $html.= "<br><br><h2 style='text-align: right;'> Historial del mes de ( ".strftime("%B", strtotime($month))." )<br><br> </h2>";
	$html.= "<table>";
	$html.= "<tr><td>Material usado</td><td>Encargado de movimiento</td><td>Cantidad</td><td>Fecha</td></tr>";
    $year = strftime("%Y", strtotime($month)); //sacar año
    $month = strftime("%m", strtotime($month)); //sacar mes
    $result = $conn->query('SELECT * FROM inventario_historial WHERE YEAR(fecha) = "'.$year.'" AND MONTH(fecha) = "'.$month.'" order by fecha desc');
    while ($xmonth = $result->fetch_row()) {
      $html .= paint(get_producto($xmonth[2]), get_user($xmonth[1]),$xmonth[3] , $xmonth[4] );
    }
  }
  //buscar por semana especifica
  else if ($date == '' && $month == '' && $week != '') {
    $n_week = explode("W", $week);
    $date = date("Y-m-d", strtotime($week)); //rescatar fecha de semana
    $html.= "<br><br><h2 style='text-align: right;'> Historial de la semana ( ".$n_week[1]." )<br><br> </h2>";
	$html.= "<table>";
	$html.= "<tr><td>Material usado</td><td>Encargado de movimiento</td><td>Cantidad</td><td>Fecha</td></tr>";
    $n_week = strftime("%m", strtotime($week)); //sacar mes
    $result = $conn->query('SELECT * FROM `inventario_historial` WHERE  WEEK(fecha) = WEEK("'.$date.'") order by fecha desc');
    while ($xweek = $result->fetch_row()) {
      $html .= paint(get_producto($xweek[2]), get_user($xweek[1]),$xweek[3] , $xweek[4] );
    } 
  }

$html.='</body></html>';

//echo $html;
$dompdf = new DOMPDF();
$dompdf->load_html(utf8_encode($html));
$dompdf->render();
if( file_put_contents('historial.pdf', $dompdf->output()) ) 
	header('Location: historial.pdf'); 

//-------------------Se renderiza la variable $html dentro del pdf y se visualiza automáticamente---------------
?>