<?php
@session_start();
if($_SESSION['rol']!='admin'){
  if($_SESSION['rol']!='secretaria')
    header('location: ../panel.php');
}
$usuario = $_SESSION['u'];
include('../php/base.php');
// include('../php/base2.php');
// include('../php/base3.php');
date_default_timezone_set("Mexico/General");
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Agregar Egreso</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/2.css"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += ' js';
  </script>
</head>
<body >
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="../index.php"><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
      </div>
    </div>
  </div>     
  <a href="../panel.php">
    <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG ../images -->
  </a>
</div>
<div class="clearfix colelem" id="pu375"><!-- group -->
 <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
 <?php
 if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u376" href="../agenda.php"> <img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista')
  echo '<a class="nonblock nontext  grpelem" id="u377" href="../buscar-paciente.php"> <img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"> <img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"> <img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen')
  echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"> <img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"> <img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';
?>
</div>
<div class="clearfix colelem" id="pu1078-4"><!-- group -->
  <div style="width:200px; ">
    <h9> Agregar Egresos</h9>
  </div>
  <div class="clearfix grpelem" id="u1079-4"><!-- content -->
    <!--p>*Esto es un ejemplo</p-->
  </div>
</div>
<!--frame de vender (contabilidad)-->
<form action="generar_egreso.php" method="POST" style="padding:20px; background:#fff; width:900px; margin-left:40px">
  <label>Categoría</label><br>
  <select name="tipo" class="campoT" style="height:18px">
    <option value="Proveedores">Proveedores</option>
    <option value="Gastos Administrativos">Gastos Administrativos</option>
    <option value="Nomina">Nomina</option>
    <option value="Egresos Laboratorio">Laboratorio</option>
    <option value="Gastos de Publicidad">Publicidad</option>
    <option value="Mantenimiento y Mano de Obra">Mantenimiento y Mano de Obra</option>
    <option value="Gastos de Remodelacion">Remodelación</option>
    <option value="Personales">Personales</option>
    <option value="Gastos Medicos">Gastos Médicos</option>
    <option value="Inbursa">Inbursa</option>
    <option value="Pagos de Tarjeta de Credito">Tarjetas de Crédito</option>
    <option value="Rentas">Rentas</option>
  </select><br><br>
  <label>Concepto:</label><br>
  <textarea name="concepto" style="height:50px" placeholder="Escribe Aqu&iacute;"></textarea><br><br>
  <label>Valor pagado: $</label><br>
  <input type="float" name="cantidad" min="1" class="campoT" style="height:15px" placeholder="Ej. 100.00"><br><br>
  <label for="date">Fecha</label>
  <input type="date" name="fecha_egreso"><br><br>
  <input type="submit" value="Generar Egreso" style="height:35px">
</form>
<!--  ..............   -->
<div class="preload_images">
 <img class="preload" src="../images/u372-r.png" alt=""/>
 <img class="preload" src="../images/u376_states-r.png" alt=""/>
 <img class="preload" src="../images/u376_states-a.png" alt=""/>
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
window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script src="../scripts/museutils.js?3865766194" type="text/javascript"></script>
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
