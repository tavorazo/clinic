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

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Contabilidad</title>
      		<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/texto.css"/>

  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="css/contabilidad.css?4223761626" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="index.php"><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
      </div>
     </div>
     <a href="panel.php">
      <img class="grpelem" id="u372" alt="servicios" src="images/blank.gif"/><!-- state-based BG images -->
     </a>
    </div>
    <div class="clearfix colelem" id="pu375"><!-- group -->
     <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
<?php
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')

echo '<a class="nonblock nontext grpelem" id="u376" href="agenda.php"> <img id="u376_states" alt="Registro de consultas" src="images/blank.gif"/></a>';



if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista' || $_SESSION['rol']=='becario')

echo '<a class="nonblock nontext grpelem" id="u377" href="buscar-paciente.php"> <img id="u377_states" alt="Buscar paciente" src="images/blank.gif"/></a>';



if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')

echo '<a class="nonblock nontext grpelem" id="u378" href="add-paciente.php"> <img id="u378_states" alt="Agregar pacientes" src="images/blank.gif"/></a>';



if($_SESSION['rol']=='admin')

echo '<a class="nonblock nontext grpelem" id="u480" href="add-usuario.php"> <img id="u480_states" alt="Agregar usuarios" src="images/blank.gif"/></a>';



if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen' || $_SESSION['rol']=='becario')

echo '<a class="nonblock nontext grpelem" id="u550" href="almacen.php"> <img id="u550_states" alt="Almacen" src="images/blank.gif"/></a>';



if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria')

echo '<a class="nonblock nontext grpelem" id="u552" href="contabilidad.php"> <img id="u552_states" alt="Contabilidad" src="images/blank.gif"/></a>';

?>
    </div>
    <div class="clearfix colelem" id="pu1087-4"><!-- group -->

     <img class="grpelem" id="u1087-4" src="images/u1087-4.png" alt="Agregar usuario" width="237" height="29"/><!-- rasterized frame -->
     <div class="clearfix grpelem" id="u1088-4"><!-- content -->
     </div>
    </div>
    

    <div class="colelem" id="u1089"><!-- simple frame -->
      <!-- Div de contabilidad -->
    	<div style="width:400px; height:200px; background:#FFF; margin-top:50px; padding:10px; float:left; ">
    		<h3>Historiales</h3><br><hr>
    		<br>
    		<a href="contabilidad/historial_pagos_.php"> Historial ingresos pagos de clientes</a><br>
    		<a href="contabilidad/historial_ventas_.php"> Historial ingresos ventas</a><br>
        <a href="contabilidad/ingresos_semanales.php"> Historial ingresos por semana</a><br>
        <a href="contabilidad/historial_pagos_tarjeta.php"> Historial pagos con tarjetas</a><br>
       <br><hr><br>
    		<a href="contabilidad/egresos.php"> Historial egresos de gastos en la clinica</a><br>
    		<a href="contabilidad/nomina.php"> Historial egresos en nomina</a>
    		
    	</div>
    	<div style="width:400px; height:200px; background:#FFF; margin-top:50px; padding:10px; float:left; margin-left:30px">
    		<h3>Control</h3><br><hr>
    		<br>
    		<!--Control aqui-->
    		<div style="width:130px; padding:10px; border:1px solid #088A08; float:left; margin-left:30px; margin-top:0px; ">
          <center><a href="contabilidad/vender.php"> Vender </a>
        </div>
        <div style="width:130px; padding:10px; border:1px solid #F781F3; float:left; margin-left:20px; margin-top:0px; ">
          <center><a href="php/tratamientos/nuevo_precio.php">Nuevo precio </a>
        </div>


        <div style="width:130px; padding:10px; border:1px solid #FF8000; float:left; margin-left:30px; margin-top:40px; ">
    			<center><a href="contabilidad/agregar_egreso.php"> Agregar gasto </a>
    		</div>
    		<div style="width:130px; padding:10px; border:1px solid #0101DF; float:left; margin-left:20px; margin-top:40px; ">
    			<center><a href="#">Check in </a>
    		</div>
    		<br><br><br><br><br><br><br><br><br><br>
        <a href="php/tratamientos/lista_precios.php">Lista de precios para tratamientos </a>
    	</div>
    </div>
    

    <div class="verticalspacer"></div>
    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="images/completo7.png" alt="" width="62" height="19"/></a>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/u372-r.png" alt=""/>
   <img class="preload" src="images/u376_states-r.png" alt=""/>
   <img class="preload" src="images/u376_states-a.png" alt=""/>
   <img class="preload" src="images/u377_states-r.png" alt=""/>
   <img class="preload" src="images/u377_states-a.png" alt=""/>
   <img class="preload" src="images/u378_states-r.png" alt=""/>
   <img class="preload" src="images/u378_states-a.png" alt=""/>
   <img class="preload" src="images/u480_states-r.png" alt=""/>
   <img class="preload" src="images/u480_states-a.png" alt=""/>
   <img class="preload" src="images/u550_states-r.png" alt=""/>
   <img class="preload" src="images/u550_states-a.png" alt=""/>
   <img class="preload" src="images/u552_states-r.png" alt=""/>
   <img class="preload" src="images/u552_states-a.png" alt=""/>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="scripts/museutils.js?3865766194" type="text/javascript"></script>
  <script src="scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
  <script src="scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
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