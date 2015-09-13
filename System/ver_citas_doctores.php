<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>agregar_receta</title>
      		<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="css/agregar_receta.css?4008918636" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu1145"><!-- group -->
     <div class="browser_width grpelem" id="u1145"><!-- group -->
      <div class="clearfix" id="u1145_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="index.php"><!-- image --><img class="block" id="u1147_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
        <p>USUARIO&nbsp; | <span id="u1150-2">cerrar sesion</span></p>
       </div>
      </div>
     </div>
     <img class="grpelem" id="u1154" alt="Agregar " src="images/blank.gif"/><!-- state-based BG images -->
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">

		<?php
			session_start();
			
			$usuario = $_SESSION['u'];
		?>
		<form action="confirmar_cita.php" method="POST">

		<?php
		/*$link = mysql_connect('localhost', 'root', '')
		    or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/
		include('php/base.php');
		$contador = 0;
		$ano=date(Y);
		$mes=date(m);
		$dia=date(d);
			$doctor = $row2[0];
			$result2 = mysql_query("select * from agenda where id_usuario='$usuario' and ano>='$ano' and mes>='$mes' and dia>='$dia';");
			//echo "select * from agenda where id_usuario='$usuario' and ano>='$ano' and mes>='$mes' and dia>='$dia';";
			while ($row3 = mysql_fetch_array($result2, MYSQL_NUM)){
				$p = $row3[2];
				$doctor = mysql_query("select * from usuarios where id_usuario='$usuario';");
				$paciente = mysql_query("select * from paciente where id_paciente='$p';");
					while ($row_doctor = mysql_fetch_array($doctor, MYSQL_NUM)){
						$doctor_nombre = $row_doctor[1];
						$doctor_apellido = $row_doctor[2];
						$doctor_apellido2 = $row_doctor[3];
					}
					while ($row_paciente = mysql_fetch_array($paciente, MYSQL_NUM)){
						$paciente_nombre = $row_paciente[1];
						$paciente_apellido = $row_paciente[2];
						$paciente_apellido2 = $row_paciente[3];
					}
						
				if($row3[9]=='1'){
					echo "<h10>Cita confirmada</h10><br><br>";
					echo "<div style='width:500px; float:left'>
							Doctor: ",$doctor_nombre," ", $doctor_apellido," ", $doctor_apellido2;
					echo "<br>Paciente: ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
					echo "<br>Fecha (aaaa/mm/dd): ", $row3[3],"/",$row3[4],"/",$row3[5]," a las ", $row3[6],":", $row3[7];
					echo "<br></div>
					 <div id='botn5' style='background: #FE2E2E; '>
					 	<a href='cancelar.php?id=",$row3[0],"'>Cancelar cita</a>
					 </div><br><br><br>";
				}else{
					echo "<hr style=background:blue><br><br>
							<h10>Cita no confirmada</h10><br><br>";
					echo "<div style='width:500px; float:left'>
							Doctor: ",$doctor_nombre," ", $doctor_apellido," ", $doctor_apellido2;
					echo "<br>Paciente: ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
					echo "<br>Fecha (aaaa/mm/dd): ", $row3[3],"/",$row3[4],"/",$row3[5]," a las ", $row3[6],":", $row3[7];
					echo "<br></div>
						 <div id='botn5' style='background: #FE2E2E; '>
						 	<a href='cancelar.php?id=",$row3[0],"'>Cancelar cita</a>
						 </div><br><br><br>";		
				}
				echo "<hr>";
			}

		?>

	   </div>
    </div>
    <div class="verticalspacer"></div>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/u1154-r.png" alt=""/>
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