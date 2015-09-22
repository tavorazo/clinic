<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: ../index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
  error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
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
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
      </div>
     </div>     
       <a href="panel.php">
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

 

    <br><br>

<?php
/*$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');
*/
include('../php/base.php');
/*
include('../php/base3.php');
include('../php/base2.php');*/
//$result3 = mysql_query("select * from Usuarios where rol='dentista';");
$show = 1;
?>


<form action="seleccionar_paciente.php" method="POST">



<?php
$dia = $_GET['dia'];
$mes_n = $_GET['mes'];
$ano = $_GET['ano'];
$n_dia = $_GET['n_dia'];
$hora = $_GET['hora'];
$minuto = $_GET['minuto'];
$doctor = $_GET['doctor'];
$minuto2=$minuto;
$hora2=$hora;

$contador = 0;
  $result = $conn->query("select * from agenda where dia='$dia' and mes='$mes_n' and ano='$ano' and hora='$hora' and minuto='$minuto' and id_usuario='$doctor';");
  
  while($row = $result->fetch_assoc()){
    $contador = 1;
  }

  if($contador==0)
    $espacio = 1;

 
 $lugares=1;
$a = 1;
 while($a<4){ 
  $espacio=1;
    $minuto2 = $minuto2+15;
    if($minuto2 == '60'){
		//echo "entra";
      $minuto2 = '00';
      $hora2++;
    }

    $result_tiempos = $conn->query("select * from agenda where dia='$dia' and mes='$mes_n' and ano='$ano' and hora='$hora2' and minuto='$minuto2' and id_usuario='$doctor';");

    while($fila = $result_tiempos->fetch_assoc()){
      $espacio=0;
    }
    if($espacio == 1)
      $lugares++;
	else
		break;
      $a++;
	 // print "<br>select * from agenda where dia='$dia' and mes='$mes_n' and ano='$ano' and hora='$hora2' and minuto='$minuto2' and id_usuario='$doctor';";

  }

?>
 
<br>
<div style="margin-left:10% ;background:#FFFDFD; padding:18px " >
  <?php

    if($contador == 1){
      print "Hora ocupada<br>";
      echo "<a href='seleccionar_hora.php?dia=",$dia,"&mes=",$mes_n,"&ano=",$ano,"&n_dia=",$n_dia,"&doctor=",$doctor,"'> Seleccionar otra hora</a><br>";
    }else{
      echo "
      <a href='seleccionar_hora.php?ano=",$ano,"&mes=",$mes_n,"&dia=",$dia,"&n_dia=",$n_dia,"&doctor=",$doctor,"' style='float:left; color:#A4A4A4 ' title='Regresar'><<< </a>
      <h3 style='margin-left:20px;'>Hora disponible<br></h3 ><br><br>"  ;
      switch($lugares){
        case 1:
          echo "<br><br>Hay 15 minutos de espacio; seleccionar paciente o";
          echo "<br><a href='seleccionar_hora.php?dia=",$dia,"&mes=",$mes_n,"&ano=",$ano,"&n_dia=",$n_dia,"&doctor=",$doctor,"'>  cambiar hora</a><br>";
          break;
        case 2:
          echo "<br><br>Hay 30 minutos de espacio;  seleccionar paciente o ";
          echo "<a href='seleccionar_hora.php?dia=",$dia,"&mes=",$mes_n,"&ano=",$ano,"&n_dia=",$n_dia,"&doctor=",$doctor,"'>cambiar hora</a><br>";
          break;
        case 3:
          echo "<br><br>Hay 45 minutos de espacio; seleccionar paciente o";
          echo "<a href='seleccionar_hora.php?dia=",$dia,"&mes=",$mes_n,"&ano=",$ano,"&n_dia=",$n_dia,"&doctor=",$doctor,"'>  cambiar hora</a><br>";
          break;
        case 4:
          echo "<br><br>Hay 60 minutos de espacio; seleccionar paciente o ";
          echo "<a href='seleccionar_hora.php?dia=",$dia,"&mes=",$mes_n,"&ano=",$ano,"&n_dia=",$n_dia,"&doctor=",$doctor,"'> cambiar hora</a><br>";

          break;
        default:
          echo "";

      }
      echo '<input type="hidden" value="',$dia,'" name="dia">';
      echo '<input type="hidden" value="',$mes_n,'" name="mes">';
      echo '<input type="hidden" value="',$ano,'" name="ano">';
      echo '<input type="hidden" value="',$hora,'" name="hora">';
      echo '<input type="hidden" value="',$minuto,'" name="minuto">';
	  
      echo '<input type="hidden" value="',$doctor,'" name="doctor">';
      echo '<input type="submit" value="Seleccionar Paciente" id="botn" style=" margin-left:14px; width:200px; font-size: 15px">';
    }
  ?>
</div>

</form>


<div id="botn2" style="margin-top:-68px; margin-left:340px; height:14px; width:150px; "> 
  <?php  echo" <a href='seleccionar_hora.php?ano=",$ano,"&mes=mes_n&dia=",$dia,"&n_dia=",$n_dia,"&doctor=",$doctor,"' style='float:left; font-weight: lighter; '>
  Seleccionar otra hr </a>" ?>
</div> <br><br>


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