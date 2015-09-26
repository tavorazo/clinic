<?php
session_start();
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Paciente</title>
    <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="../css/agendatabla.css"/>
  
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="../css/agregar_receta.css?4008918636" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
        <p>USUARIO&nbsp; | <span id="u1150-2">cerrar sesion</span></p>
       </div>
      </div>
     </div>
     <img class="grpelem" id="u1154" alt="Agregar " src="../images/blank.gif"/><!-- state-based BG images -->
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">
		
		<?php
		$dia = $_GET['dia'];
		$mes_n = $_GET['mes'];
		$ano = $_GET['ano'];
		$n_dia = $_GET['n_dia'];
		$paciente = $_GET['paciente'];
		//echo '';
		$mes[1] = 'Enero';
		$mes[2] = 'Febrero';
		$mes[3] = 'Marzo';
		$mes[4] = 'Abril';
		$mes[5] = 'Mayo';
		$mes[6] = 'Junio';
		$mes[7] = 'Julio';
		$mes[8] = 'Agosto';
		$mes[9] = 'Septiembre';
		$mes[10] = 'Octubre';
		$mes[11] = 'Noviembre';
		$mes[12] = 'Diciembre';

		print "<h3>Día de cita:</h3>  $n_dia $dia de $mes[$mes_n] del $ano";
		?>
		<br><br><br>
		<?php echo'<a href="cita_paciente03.php?paciente=',$paciente,'" title="Regresar" style="float:left; margin-right:5px"><< </a>';?>
		<h3>| Seleccionar hora:</h3><br><hr>
		<br><br>
		<form action="cita_paciente05.php" method="POST">
		<select name="hora">
			<option value="8">08</option>
			<option value="9">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<!--<option value="14">14</option>
			<option value="15">15</option>-->
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
		</select>
		:
		<select name="minuto">
			<option value="00">00</option>
			<option value="15">15</option>
			<option value="30">30</option>
			<option value="45">45</option>
		</select>
		<br><br>
		Observaciones<br><br>
		<textarea name="observaciones" style="width:800px; height:60px; "></textarea><br>
		<input type="hidden" value="<?php echo $dia; ?>" name="dia">
		<input type="hidden" value="<?php echo $n_dia; ?>" name="n_dia">
		<input type="hidden" value="<?php echo $mes_n; ?>" name="mes">
		<input type="hidden" value="<?php echo $ano; ?>" name="ano">
		<input type="hidden" value="<?php echo $paciente; ?>" name="paciente">
		<br>
    <div id="botn2" style="margin-top:9px; margin-left:auto; margin-right:10px; height:14px; float:left"> 
		<a href="../pacientes.php">Cancelar</a>
	</div>
		<input type="submit" value="Crear Cita" style="height:40px;">
		<br><br>
		</form>
	
	 </div>
    </div>
    <div class="verticalspacer"></div>
   </div>

      <!--Publicidad--> 
      <div style="width:100%; min-height:50px; position:relative; " >
<?php
  include('../php/base.php');
  include('../php/base3.php');
  include('../php/base2.php');

          $select = 'select * from publicidad where lugar="2";';
          $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);

          echo "<img src='../publicidad/images/".$renglon['imagen']."' width='900px'>";

          mysqli_close($conn);
?>
      </div>

   
  </div>
  <div class="preload_images">
   <img class="preload" src="../images/u1154-r.png" alt=""/>
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
