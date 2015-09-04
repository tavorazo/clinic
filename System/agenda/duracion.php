<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: ../index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="generator" content="7.0.314.244"/>
  <title>Agenda</title>
    		<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/agendatabla.css" />
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>

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
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesi&oacute;n</h12></a></span></p>
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
echo '<a class="nonblock nontext MuseLinkActive grpelem" id="u376" href="../agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista')     
echo '<a class="nonblock nontext grpelem" id="u377" href="../buscar-paciente.php"><!-- state-based BG ../images --><img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
echo '<a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
echo '<a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen')
echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
echo '<a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';

?>
    </div>
    <div class="clearfix colelem" id="pu1078-4"><!-- group -->
     <img class="grpelem" id="u1078-4" src="../images/u1078-4.png" alt="Agregar usuario" width="237" height="29"/><!-- rasterized frame -->
     <div class="clearfix grpelem" id="u1079-4"><!-- content -->
      <!--p>*Esto es un ejemplo</p-->
     </div>
    </div>
    <div class="verticalspacer"></div>
    <br><br><br>

<div style="margin-left:20px ;background:#FFFDFD; padding:18px " >
 
<?php
$dia = $_GET['dia'];
$mes_n = $_GET['mes'];
$ano = $_GET['ano'];
$hora = $_GET['hora'];
$minuto = $_GET['minuto'];
$doctor = $_GET['doctor'];
$paciente = $_GET['paciente'];
//echo $mes_n;

?>

<form action="creacion_exitosa.php" method="POST" >
<h3 style="margin-left:0px">Duraci&oacute;n aproximada de la cita</h3><br><br><br>
  <input name="duracion" type="radio" value="15" >
    15 min &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="duracion" type="radio" value="30" checked="checked">
    30 min &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="duracion" type="radio" value="45"  >
    45 min  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="duracion" type="radio" value="60"  >
    60 min  

<br><br>
<h3 style="margin-left:0px">Observaciones para la cita: </h3>
<!--textarea name="duracion" ></textarea-->
	<textarea name="observacion"></textarea>
  <input type="hidden" name="dia" value="<?php echo $dia; ?>">
  <input type="hidden" name="mes_n" value="<?php echo $mes_n; ?>">
  <input type="hidden" name="ano" value="<?php echo $ano; ?>">
  <input type="hidden" name="hora" value="<?php echo $hora; ?>">
  <input type="hidden" name="minuto" value="<?php echo $minuto; ?>">
  <input type="hidden" name="doctor" value="<?php echo $doctor; ?>">
  <input type="hidden" name="paciente" value="<?php echo $paciente; ?>">
<input type="submit" value="Crear cita"> 
</form>


  <div id="botn2" style="margin-top:-50px; margin-left:146px; height:15px"> <a href="../panel.php">Cancelar</a></div> <br><br>
</div>

    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="" width="62" height="19"/></a>
   </div>
  </div>
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