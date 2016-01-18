<?php
session_start();
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Pacientes:</title>
    		<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_b-master.css?471741950"/>
  <link rel="stylesheet" type="text/css" href="../css/pacientes.css?4242740055" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/s1.css" />
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu500"><!-- group -->
     <div class="browser_width grpelem" id="u500"><!-- group -->
      <div class="clearfix" id="u500_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u510" href="../index.php"><!-- image --><img class="block" id="u510_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
      </div>
     </div>
     <div class="grpelem" id="u501"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u502" href="../index.php"><!-- state-based BG images --><img id="u502_states" alt="Inicio" src="../images/blank.gif"/></a>
     <div class="grpelem" id="u503"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u504" href="../clinica.php"><!-- state-based BG images --><img id="u504_states" alt="Clinica" src="../images/blank.gif"/></a>
     <div class="grpelem" id="u505"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u506" href="../servicios.php"><!-- state-based BG images --><img id="u506_states" alt="Servicios" src="../images/blank.gif"/></a>
     <div class="grpelem" id="u507"><!-- state-based BG images --></div>
     <a class="nonblock nontext MuseLinkActive grpelem" id="u508" href="../pacientes.php"><!-- state-based BG images --><img id="u508_states" alt="Pacientes" src="../images/blank.gif"/></a>
    </div>
    <div class="colelem" id="u1158" style="border:none; min-height:550px">

<!-- formulario crear cita -->	

	<form action="cita_paciente02.php" method="POST" style="witdh:100%; margin:auto auto ">
			<!--h2 style="font-size:20px; color:#80B4D7; font-family: tahoma">
				Busca por Numero de Expediente
			</h2><br><br><br>
			<input type="text" class="campoT" name="n_registro"><br></center>
		</div-->
		<div style="min-width:400px;  padding:60px;"><center>
			<h2 style="font-size:18px; color:#80B4D7; font-family: tahoma; float:left; margin-right:10px"> 	Busca por Id de Paciente</h2>
			<input type="text" class="campoT" name="id" style='float:left; margin-right:10px'><br></center>
			<input type="submit" value="buscar" style='float:left; margin-top:-20px;'>
	</form>


<!-- ------- -->


 <div class="verticalspacer"></div>
    <div class="browser_width colelem" id="u1098" style="margin-top:210px"><!-- simple frame --></div>
    <div class="clearfix colelem" id="pu1105" ><!-- group -->
     <div class="clip_frame grpelem" id="u1105" ><!-- image -->
      <img class="block" id="u1105_img" src="../images/en5.png" alt="" width="32" height="29"/>
     </div>
     <img class="grpelem" id="u1099-7" src="../images/u1099-7.png" alt="Dr. Alejandro González Merlo
CIRUJANO DENTISTA ENDOPERIODONCISTA
" width="268" height="51"/><!-- rasterized frame -->
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