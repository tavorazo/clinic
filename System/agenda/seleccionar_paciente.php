<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: ../index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
 <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  
  <meta name="generator" content="7.0.314.244"/>
  <title>agenda</title>
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

<?php

$dia = $_POST['dia'];
$mes_n = $_POST['mes'];
$ano = $_POST['ano'];
$n_dia = $_POST['n_dia'];
$hora = $_POST['hora'];
$minuto = $_POST['minuto'];
$doctor = $_POST['doctor'];


?>

<form action="seleccionar_paciente_final.php" method="POST" style="margin-left:10% ;background:#FFFDFD; padding:28px " >
 <?php echo "
      <a href='seleccionar_hora.php?ano=",$ano,"&mes=mes_n&dia=",$dia,"&n_dia=",$n_dia,"&doctor=",$doctor,"' style='float:left; color:#A4A4A4 ' title='Regresar'><<< </a>
      <h3 style='margin-left:20px;'>Buscar paciente<br></h3 ><br><br><br><br>"  ;
  ?>
  <label style="float:left; width:150px; margin-right:15%">  N. de Expediente </label>
    <input type="text" name="n_registro" class="campoT" placeholder="ej. 999a"><br>
  <label style="float:left; width:150px; margin-right:15%">  Nombre           </label>
    <input type="text" name="nombre" class="campoT" placeholder="ej. Juan"><br>
  <label style="float:left; width:150px; margin-right:15%">Apellido Paterno   </label>
    <input type="text" name="a_pat" class="campoT" placeholder="ej. Martinez"><br>
  <label style="float:left; width:150px; margin-right:15%">Apellido Materno   </label>
    <input type="text" name="a_mat" class="campoT" placeholder="ej.Martinez"><br>
  <label style="float:left; width:150px; margin-right:15%">Tel o Celular </label>
    <input style="float:left; " type="text" name="telefono" class="campoT" placeholder="ej.443-333-3333">

  <br><br><br>
  <?php
    echo '<input type="hidden" value="',$dia,'" name="dia">
          <input type="hidden" value="',$mes_n,'" name="mes">
          <input type="hidden" value="',$ano,'" name="ano">
          <input type="hidden" value="',$hora,'" name="hora">
          <input type="hidden" value="',$minuto,'" name="minuto">
          <input type="hidden" value="',$doctor,'" name="doctor">';
  ?>
  <input type="submit" value="Buscar">
</form>
<!--div id="botn2" style="margin-top:-78px; margin-left:280px; height:15px"> <a href="menu.php">Cancelar</a></div> <br><br-->
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