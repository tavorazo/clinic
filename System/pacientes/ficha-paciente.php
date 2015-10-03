<?php
@session_start();
if($_SESSION['u']=='')
  header('location: index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];

?>
<!DOCTYPE html>
<html class="html">
<head>
  <!--meta http-equiv="Content-type" content="text/html;charset=UTF-8"/-->
  <meta name="generator" content="7.0.314.244"/>
  <title>ficha&#45;paciente</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?4050405232"/>
  <link rel="stylesheet" type="text/css" href="css/ficha-paciente.css?3891735787" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += ' js';
  </script>
  <style type="text/css">
    label{ display: block; width:200px; float:left }
    #container { margin: 0px auto; width: 250px; border: 4px #00BFFF solid; }
    #videoElement { width: 250px; background-color: #666; }
    #canvas { width: 260px;
    background-color: #F2F2F2; }
    .buttom{ background: #A4A4A4; opacity:  0.8; padding: 5px; margin-top: -350px; margin-left: 40px; color: white; width: 120px; height: 30px; }
  </style>
</head>
<body>
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <div class="clip_frame grpelem" id="u513"><!-- image -->
        <img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/>
      </div>
      <div class="grpelem" id="u516"><!-- simple frame --></div>
      <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <!--p>USUARIO&nbsp; | <span id="u518-2">cerrar sesion</span></p-->
      </div>
    </div>
  </div>
  <a href="../panel.php">
    <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG images -->
  </a>
</div>
<div class="clearfix colelem" id="pu375"><!-- group -->
 <div class="browser_width grpelem" id="u375"><!-- simple frame --><br>
   <a href="../buscar-paciente.php"><p style="color:white; margin-left: 15%;  size-text:`10px"> << REGRESAR</p><!-- state-based BG images --></a>
 </div>
</div>
<div class="clearfix colelem" id="u553-4"><!-- content -->
  <!--p>nombre del paciente</p-->
</div>
<!--frame de ficha paciente-->
<?php

include('../php/base.php');
$buscar = $_GET['id'];
?>
<!--a href="menu.php">Regresar</a-->
<?php
$result2 = $conn->query("SELECT * from paciente where id_paciente='$buscar';");
echo " <div class='colelem' style='max-width:800px; width:700px'>";
while ($row2 = $result2->fetch_row()) {
  echo "<h1>Ficha de Paciente <font color='black'> [",$row2[1]," ", $row2[2]," ",$row2[3]," ]</font></h1>";
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='recepcionista')
    echo "<a href='edit-paciente.php?id= ".$row2[0]."&paciente=".$buscar."'> Editar </a>";
  echo "<br><br>";
  echo "<fieldset><legend>Datos Personales</legend>";
  echo "<h2><div id='fieldset1'> ";
  if($row2[21] == "")
    echo "<br><img src='images_pacientes/predeterminado.png'>";
  else
    echo "<br><img src='images_pacientes/",$row2[21],"'>";

  echo "</div><div id='fieldset1' style='padding-top: 50px; margin-left:-200px;'>
  <label style='display: block; width:150px; float:left'>N&uacute;mero de ficha: </label>", $row2[0], "<br>";
  echo "<label style='display: block; width:150px; float:left'>Nombre: </label>", $row2[1]," ", $row2[2]," ",$row2[3],"<br>";
  /*CONCATENO NOMBRE DE PACIENTE Y NUMERO DE FICHA PARA EL DIRECTORIO*/
  $directorio_para_imagenes = "http://192.168.1.140/listar.php?id=".str_replace(" ","",$row2[1])."".$row2[2]."".$row2[3]."".$row2[0];
  echo "<label style='display: block; width:150px; float:left'>Fecha de nacimiento: </label>", $row2[4],"<br>
  <label style='display: block; width:150px; float:left'>Sexo: </label>", $row2[23],"<br>
  <label style='display: block; width:150px; float:left'>Referencia: </label>", $row2[16],"<br>
  <label style='display: block; width:150px; float:left'>
                        <a href='https://twitter.com/search?f=users&vertical=default&q=",$row2[31],"' target='_blank'> Twitter</a>/
                        <a href='https://www.facebook.com/search/results/?init=quick&q=",$row2[31],"' target='_blank'> Facebook</a>: </label>", $row2[31],"<br>
  </div></fieldset><br>
  <fieldset><legend>Direcci&oacute;n</legend><br><h2>
  <label style='display: block; width:200px; float:left'>Estado:  </label>", $row2[6],"<br>
  <label style='display: block; width:200px; float:left'>Ciudad:  </label>", $row2[7],"<br>
  <label style='display: block; width:200px; float:left'>Colonia:  </label>", $row2[8],"<br>
  <label style='display: block; width:200px; float:left'>Calle:  </label>", $row2[9],"<br>
  <label style='display: block; width:200px; float:left'>Numero:  </label>", $row2[10],"<br>
  <label style='display: block; width:200px; float:left'>C&oacute;digo Postal:  </label>", $row2[22], "<br>
  <label style='display: block; width:200px; float:left'>Tel&eacute;fono:  </label>", $row2[11],"<br>
  <label style='display: block; width:200px; float:left'>Celular: </label>", $row2[12],"<br>";
  echo "<label style='display: block; width:200px; float:left'>Correo:  </label>", $row2[13],"<br>";
  echo "<br><br></fieldset><br>";
  echo "<fieldset><legend>Otros Datos</legend><br><h2>";
  echo "<label >Tel. de emergencia:  </label>", $row2[15],"<br>";
  echo "<label >Nombre para emergencia:  </label>", $row2[14],"<br>";
  echo "<label >Num. de recomendados:  </label>";
  $recomendados =  $row2[0];
  $select_reco = 'SELECT count(*) from paciente where recomendado_por="'.$recomendados.'";';
      //echo $select_reco;
  $resul_reco = $conn->query($select_reco);
  $renglon_reco = $resul_reco->fetch_assoc();
  echo $renglon_reco['count(*)'];
  echo "<br>";
  echo "<label style='display: block; width:200px; float:left'>Recomendado por:  </label>";

  $recomendador = $row2[30];

  $select_reco = 'SELECT * from paciente where id_paciente="'.$recomendador.'";';
  $resul_reco = $conn->query($select_reco);
  $renglon_reco = $resul_reco->fetch_assoc();
      //echo $row2[30];
  echo $renglon_reco['nombres'], " ", $renglon_reco['apellido_paterno'], " ", $renglon_reco['apellido_materno'];
  echo " - <a href='cambiar_recomendado.php?id_paciente=",$row2[0],"'>cambiar</a><br>";
  echo "<br><br></fieldset><br>";

  echo "<fieldset><legend>Pagos y Adeudos</legend><br><h2>";
  echo "<label >Pagos:  </label><a href='pago.php?id_paciente=", $row2[0],"'>Pagar adeudo</a><br>";
  echo "<label >Adeudos:  </label><a href='adeudo.php?id_paciente=", $row2[0],"'>Generar adeudo</a><br>";
  echo "<label >Comprobantes:  </label><a href='comprobante_pago.php?id_paciente=", $row2[0],"'>Revisar</a><br>";
  echo "<br><br></fieldset><br>";

  echo "<fieldset><legend>Compras</legend><br><h2>";
  echo "<label >Hacer compra:  </label><a href='compra.php?id_paciente=", $row2[0],"'>Aqui</a><br>";
  echo "<label >Historial de compras:  </label><a href='historial_compras.php?id_paciente=", $row2[0],"'>Revisar</a><br>";
  echo "<label >Diplomados e Instrumental:  </label><a href='../php/diplomados.php?id=", $row2[0],"'>Comprar</a><br>";
  echo "<br><br></fieldset><br>";
  echo "<fieldset><legend></legend><br><h2>";
  echo "<label >Observaciones:  </label><br><br><p style='padding:25px'>", htmlentities($row2[20]), "</p><br>";
  echo "<br><br></fieldset><br>";

  echo "<fieldset><legend>Asegurado</legend><br><h2>";
  echo "<label >Empresa:  </label>", $row2[17],"<br>";
  echo "<label >Fecha de alta:  </label>", $row2[18],"<br>";
  echo "<label >No IMSS:  </label>", $row2[25],"<br>";
  echo "<label >RFC:  </label>", $row2[19],"<br>";

  echo "<br><br></fieldset><br>";
  /*Avance clinico*/
  echo "<fieldset><legend>Avances</legend><h2>";
  include("../php/base.php");
  $result3 = $conn->query("SELECT * from avance_clinico where id_paciente='$buscar' order by fecha desc limit 10;");
  echo "<br>Ultimos 10 avances:<br><br>";
  while ($row_avance = $result3->fetch_row()) {
    echo "<label >Fecha de avance:</label> ", $row_avance[4],"<br><br>";
    echo "<label >Descripci&oacute;n</label> ", $row_avance[3],"<br><br>";
    $SELECT = 'SELECT * from usuarios where id_usuario="'.$row_avance[2].'";';
    $resul = $conn->query($SELECT);
    $renglon = $resul->fetch_assoc();
    echo "<label'> Atendido por: </label>", $renglon['nombres']," ", $renglon['apellido_paterno'], " ", $renglon['apellido_materno'], "<br><br><br>";
  }
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
   echo "<div id='botn' style='margin-left: 5%; width:200px; '>";
   echo "<a   href='avances/crear_avance.php?id_paciente=",$row2[0],"'  >Agregar Avance</a></div><br><br>";
 }
 echo "<a href='historial_completo.php?id_paciente=",$row2[0],"&tipo=1' style='color:gray; font-size:14px; float:right'>Historial de Avences completo</a>";
 echo "</fieldset><br>";
 /* ------------------------- */
 echo "<fieldset><legend>Recetas</legend><h2>";
 include("../php/base.php");
 $result3 = $conn->query("SELECT * from recetas where id_paciente='$buscar' order by fecha desc limit 10;");
 echo "<br>Ultimas 10 recetas:<br><br>";
 /*RECETAS*/
 while ($row_receta = $result3->fetch_row()) {
  echo "<label >Fecha de receta:</label> <a href='../php/ver_receta.php?id=",$row_receta[0],"' target='_blank' >", $row_receta[5],"</a><br>";
  $SELECT = 'SELECT * from usuarios where id_usuario="'.$row_receta[1].'";';
  $resul = $conn->query($SELECT) or die ("problema con la solicitud");
  $renglon = $resul->fetch_assoc();
  echo "<label> Asignada por: </label>", $renglon['nombres']," ", $renglon['apellido_paterno'], " ", $renglon['apellido_materno'], "<br><br>";
}
/*RECETAS*/
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
 echo "<div id='botn' style='margin-left: 5%; width:200px; '>";
 echo "<a   href='../agregar_receta.php?id=",$row2[0],"'  >Agregar Receta</a></div><br><br>";
}
echo "<a href='historial_completo.php?id_paciente=",$row2[0],"&tipo=2' style='color:gray; font-size:14px; float:right'>Historial de recetas completo</a>";

echo "</fieldset><br>";
/*Enfermedades    */
echo "<fieldset><legend>Enfermedades</legend><h2>";
echo "<br><br>";
$result3 = $conn->query("SELECT * from enfermedades where id_paciente='$buscar';");

while ($row3 = $result3->fetch_row()) {
  echo "<div id='fieldset1' style='width:60%'>
  <label >Enfermedad: </label>", $row3[3];
  echo "<br><label style='margin-right:10px; float:left; height:50px'>Observaciones: </label>
  <div style='width:80%'><p>", $row3[2],"</p></div>";
          //esto aunnno esta **************
  echo "</div>";
  /*------------------------------ENFERMEDADES*/
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
    echo "
    <div id='botn' style='float:left; margin-bottom:30px'>
    <a href=' ../php/editar.php?cat=4&id=",$row3[0],"&id_p=",$row2[0],"' >  
    Editar</a>
    </div>
    <div style='margin-left:735px; margin-top:0px; position:absolute; width:40px; margin-bottom:100px'  >
    <a href='../php/eliminar.php?cat=4&id=",$row3[0],"&id_p=",$row2[0],"'  >
    <img src='../images/eliminar.png' style='width:50px; margin-left:30px; margin-top:7px' id='a1'>
    </a>
    </div><br><br><br><br><br>";
  }
}
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
  echo "<div id='botn' style='margin-left: 5%; max-heigth:25px; margin-top:10px; width:200px; background:#04B486; position:relative'>";

  echo "<a href='../agregar_enfermedad.php?id=",$row2[0],"'   >Agregar Enfermedad</a>";
  echo "</div>";
}
echo "<br></fieldset><br>";
/*ALERGIAS*/
echo "<fieldset><legend>Alergias</legend><h2>";
echo "<br><br>";
$result3 = $conn->query("SELECT alergias from paciente where id_paciente='$buscar';");

while ($row3 = $result3->fetch_row()) {
  echo "<div id='fieldset1' style='width:60%; padding-left:10px'>";
                //<label style='margin-right:25px;'>Alergias: </label>"
  echo $row3[0];
  echo "<br>";
          //esto aunnno esta ************** ok entonces que esta aqui que debe de estar?
  echo "</div>";

  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
    echo "
    <div id='botn' style='float:left; margin-bottom:30px'>
    <a href=' editar_alergia.php?id=",$row3[0],"' >  
    Modificar</a>
    </div>
    <div style='margin-left:735px; margin-top:0px; position:absolute; width:40px; margin-bottom:100px'  >
    ";
    echo "</div><br><br><br><br><br>";
  }
}
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
          //echo "<div id='botn' style='margin-left: 5%; max-heigth:25px; margin-top:10px; width:200px; background:#04B486; position:relative'>";

                  //echo "<a href='../agregar_enfermedad.php?id=",$row2[0],"'   >Agregar Enfermedad</a>";
            //    echo "</div>";
}
echo "<br></fieldset><br>";
/*TERMNA ALERGIAS*/ 

echo "<fieldset><legend>Fotografias clinicas</legend><h2><br><br>";
      //$directorio_clinicas = $directorio_para_imagenes."&seccion=1";
      //echo "<a href='".$directorio_clinicas."' target='_blank'>Ver Fotografias Clinicas</a><br><br><br><br>";
$result3 = $conn->query("SELECT * from fotografias_clinicas where id_paciente='$buscar' order by fecha_foto desc;");
echo "<table width='100%'><br><br>";
while ($row_clinica = $result3->fetch_row()) {
  echo  "<tr>
  <td width='25%'>
  <a href='fotografias_clinicas/",$row_clinica[2],"' >
  <img src='fotografias_clinicas/",$row_clinica[2],"'' width='108px' style='border: 1px solid gray; margin-left:5% '> 
  </a> 
  </td><td width='40%'><div> 
  <font color='black'>",$row_clinica[3],"</font><br>",$row_clinica[4],"</div>
  </td><td width='10%'>";
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
    echo "<div style='width:40px; margin-left:100px;' id='a1'>
    <a href='../php/eliminar.php?cat=1&id=",$row_clinica[0],"&id_p=",$row2[0],"' >
    <img src='../images/eliminar.png' style='width:40px;   '>
    </a>
    </div>
    </td><td width='10%'>
    <div style='width:40px; margin-left:0px; margin-right:10px' id='a1'>
    <a href='../php/editar.php?cat=1&id=",$row_clinica[0],"&id_p=",$row2[0],"'  >
    <img src='../images/editar.png' style='width:40px; '>
    </a>
    </div>
    </td>";
  }
  echo "</tr>";
}
echo "</table><br>";
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
 echo" <div id='botn' style='float:left; margin-left: 5%; width:280px; background:#04B486 '>
 <a href='../agregar_foto_clinica.php?id=",$row2[0],"' >Agregar Fotograf&iacute;a Clinica</a>
 </div><br><br><br><br>";
}
echo "<a href='historial_completo.php?id_paciente=",$row2[0],"&tipo=3' style='color:gray; font-size:14px; float:right'>Historial completo</a>";
echo "</fieldset><br>";
echo "<fieldset><legend>Fotografias Externas</legend><h2><br><br>";
      //$directorio_externas = $directorio_para_imagenes."&seccion=2";
      //echo "<a href='".$directorio_externas."' target='_blank'>Ver Fotografias Externas</a><br><br><br><br>";
$result3 = $conn->query("SELECT * from fotografias_externas where id_paciente='$buscar' order by fecha_foto desc;;");

echo "<table width='100%'><br><br>";
while ($row_externa = $result3->fetch_row()) {
  echo "<tr>
  <td width='25%'>
  <a   href='fotografias_externas/",$row_externa[2],"'    >
  <img src='fotografias_externas/",$row_externa[2],"'' width='125px' style='border: 1px solid gray; margin-left:5% '> 
  </td><td width='40%'>
  <div style='margin-left:10%; width:200px'> 
  <font color='black'>",$row_externa[3],"</font><br>",$row_externa[4],"</div>
  </td><td width='10%'>";
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
    echo "<div style='width:40px; margin-left:68px' id='a1'>
    <a href='../php/eliminar.php?cat=2&id=",$row_externa[0],"&id_p=",$row2[0],"' >
    <img src='../images/eliminar.png' style='width:40px;   '>
    </a>
    </div>
    </td><td width='10%'>
    <div style='width:40px; margin-left:0px; margin-right:10px' id='a1'>
    <a href='../php/editar.php?cat=2&id=",$row_externa[0],"&id_p=",$row2[0],"' >
    <img src='../images/editar.png' style='width:40px; '>
    </a>
    </div>
    </td>";
  }
  echo "</tr>";
}

echo "</table>";
echo "<br>";
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
  echo "<div id='botn' style='float:left; margin-left: 5%; width:280px; background:#04B486 '>
  <a href='../agregar_foto_externa.php?id=",$row2[0],"'   >Agregar Fotograf&iacute;a Externa</a>
  </div><br><br><br><br>";
}
echo "<a href='historial_completo.php?id_paciente=",$row2[0],"&tipo=4' style='color:gray; font-size:14px; float:right'>Historial completo</a>";
echo "</fieldset><br>";
echo "<fieldset><legend>Radiografias</legend><h2><br><br>";
/*LISTO LAS RADIOGRAFÍAS*/

      //$directorio_radiografias = $directorio_para_imagenes."&seccion=3";
/*llamo los archivos*/
      //listFiles($directorio_radiografias);
      //echo "<a href='".$directorio_radiografias."' target='_blank'>Ver Radiograf&iacute;as</a>";
$result3 = $conn->query("SELECT * from radiografias where id_paciente='$buscar' order by fecha_foto desc;;");

echo "<table width='100%'>";
while ($row_radio = $result3->fetch_row()) {
  echo "<tr>
  <td width='25%'>
  <a href='radiografias/",$row_radio[2],"'  >
  <img src='radiografias/",$row_radio[2],"'' width='125px' style='border: 1px solid gray; margin-left:5% '> 
  </a>
  </td><td width='40%'>";
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista'){
    echo "<div style='margin-left:10%; width:500px'>",$row_radio[3],"<br>",$row_radio[4],"</div>
    </td><td width='10%'>
    <div style='width:40px; margin-left:50px' id='a1'>
    <a href='../php/eliminar.php?cat=3&id=",$row_radio[0],"&id_p=",$row2[0],"'  >
    <img src='../images/eliminar.png' style='width:40px;   '>
    </a>
    </div>
    </td><td width='10%'>
    <div style='width:40px; margin-left:0px; margin-right:10px' id='a1'>
    <a href='../php/editar.php?cat=3&id=",$row_radio[0],"&id_p=",$row2[0],"' >
    <img src='../images/editar.png' style='width:40px; '>
    </a>
    </div>
    </td>";
  }
  echo " </tr>";
}

echo "</table><br>";
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista' || $_SESSION['rol']=='recepcionista'){
 echo " <div id='botn' style='float:left; margin-left: 5%; width:280px; background:#04B486 '>
 <a href='../agregar_radiografia.php?id=",$row2[0],"'   >Agregar Radriografia</a></div>";
 echo "<br><br><br><br>";
}
echo "<a href='historial_completo.php?id_paciente=",$row2[0],"&tipo=5' style='color:gray; font-size:14px; float:right'>Historial completo</a>";
echo "</fieldset><br>";
}
?>

    </div>
    <div class="verticalspacer"></div>
    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="" width="62" height="20"/></a>
  </div>
</div>
<div class="preload_images">
 <img class="preload" src="../images/u372-r.png" alt=""/>
 <img class="preload" src="../images/u376-r.png" alt=""/>
 <img class="preload" src="../images/u377_states-r.png" alt=""/>
 <img class="preload" src="../images/u377_states-a.png" alt=""/>
 <img class="preload" src="../images/u378_states-r.png" alt=""/>
 <img class="preload" src="../images/u378_states-a.png" alt=""/>
 <img class="preload" src="../images/u480_states-r.png" alt=""/>
 <img class="preload" src="../images/u480_states-a.png" alt=""/>
 <img class="preload" src="../images/u550_states-r.png" alt=""/>
 <img class="preload" src="../images/u550_states-a.png" alt=""/>
 <img class="preload" src="../images/u552_states-r.png" alt=""/>
 <img class="preload" src="../images/u552_states-a.png" alt=""/>
</div>
<!-- JS includes -->
<script type="text/javascript">
if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script type="text/javascript">
window.jQuery || document.write('\x3Cscript src="../scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script src="../scripts/museutils.js?3840766194" type="text/javascript"></script>
<script src="../scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
<script src="../scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
<!-- Other scripts -->
<script type="text/javascript">
$(document).ready(function() { try {
  Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
  $('.browser_width').toBrowserWidth();/* browser width elements */
  Muse.Utils.prepHyperlinks(true);/* body */
  Muse.Utils.fullPage('#page');/* 100% height page */
  Muse.Utils.showWidgetsWhenReady();/* body */
  Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
} catch(e) { Muse.Assert.fail('Error calling selector function:' + e); }});
</script>
   </body>
</html>
