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
       <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
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
     
     </div>
    </div>
    <div class="verticalspacer"></div>
    <br><br><br>

<div style="margin-left:10% ;background:#FFFDFD; padding:18px; height:350px " >
  <?php
  $dia = $_GET['dia'];
  $mes_n = $_GET['mes'];
  $ano = $_GET['ano'];
  $n_dia = $_GET['n_dia'];
  $doctor = $_GET['doctor'];

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

  echo" 
      <a href='seleccionar_fecha.php?doctor=",$doctor,"' style='float:left; color:#A4A4A4 ' title='Regresar'><<< </a>
      <h3 style='margin-left:10px'> Seleccionar hora</h3> <br> <h1>";
   print " [D&iacute;a de cita: $n_dia $dia de $mes[$mes_n] del $ano]";
  echo "</h1>";
  ?>
     
      <br><br>

  <form action="Verificar.php" method="POST"  >
<?php
include('../php/base.php');

//$result = $conn->query("select * from agenda where dia='$dia' and mes='$mes_n' and ano='$ano' and id_usuario='$doctor';");
$hour = 8;
$minute = '00';

$i=0;
$j=0;

for($i=0;$i<12;$i++){
	
	for($j=0; $j<4;$j++){
		$select = 'select * from agenda where hora="'.$hour.'" and minuto="'.$minute.'" and dia="'.$dia.'" and mes="'.$mes_n.'" and ano="'.$ano.'" and id_usuario="'.$doctor.'";';
		$resul = $conn->query($select) or die ("problema con la solicitud");
		$renglon = $resul->fetch_assoc();
		
		if($renglon['id_cita']==''){
			
			echo "
      <a href='Verificar.php?dia=".$dia."&n_dia=".$n_dia."&mes=".$mes_n."&ano=".$ano."&doctor=".$doctor."&hora=".$hour."&minuto=".$minute."'>";
		if($hour!=14 && $hour!=15){
      echo "<div style='border:1px #B2B2A9 solid; border-radius:75px; width:75px; text-align: center; color:#82827F; background:#FAFAB3; padding:4px; float:left; margin-left: 15px; margin-bottom:10px '>
      ". $hour. ":". $minute."
      </div></a>";
		}
		else {
	      echo "<div style='border:1px #B2B2A9 solid; border-radius:75px; width:75px; text-align: center; color:white; background:#F78181; padding:4px; float:left; margin-left: 15px; margin-bottom:10px '>
      ". $hour. ":". $minute."
      </div></a>";
		}
      
 		}
		$minute = $minute + 15;
	}
	$minute = '00';
	$hour++;
}
?>
  <input type="hidden" value="<?php echo $dia; ?>" name="dia">
  <input type="hidden" value="<?php echo $n_dia; ?>" name="n_dia">
  <input type="hidden" value="<?php echo $mes_n; ?>" name="mes">
  <input type="hidden" value="<?php echo $ano; ?>" name="ano">
  <input type="hidden" value="<?php echo $doctor; ?>" name="doctor">
  <br><br>
  </form>
  
  <!--div id="botn2" style="margin-top:200px; margin-left:14px; height:15px; color:#FFF; "> 
  	<a href="../panel.php">Cancelar</a>
  </div> <br><br-->
</div>

    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="Octavio Razo" /></a>
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