<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Editar Alergias </title>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
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
  include('../php/base.php');
    //include('../php/base3.php');
  
  $id = $_GET['id'];
  ?>
  <!--frame de editar alergia de paciente-->
  <div style=" width:90%; position:static; margin-top:0px; margin-left:100px;">
   <?php
          //echo "<a href='ficha-paciente.php?id=",$id,"' style='float:left; margin-right:4px'><< </a>";
   echo " <h1><a href='ficha-paciente.php?id=",$id,"' style='float:left; margin-right:4px'> < Regresar   |</a>";
   $select = 'select * from paciente where id_paciente="'.$id.'";';
   $resul = $conn->query($select) or die ("problema con la solicitud");
   $renglon = $resul->fetch_assoc();
   ?>
   Alergias de paciente <br><hr><br>
   <h2>Paciente: <?php echo $renglon['nombres'], " ", $renglon['apellido_paterno']; ?></h2>
   <form action="editar_alergia_proceso.php" method="POST">
    <textarea name="alergia" style="width:500px;  margin-top:10px; margin-left:0px; height:100px; padding:8px; border:#BDBDBD 1px solid"><?php echo $renglon['alergias'];?></textarea>
    <input type="hidden" value="<?php echo $id;?>" name="id">
    <input type="submit" value="Editar" style="margin-top:10px; margin-left:180px">
  </form>
</div>
<!--  ..............   -->
</div>
<div class="verticalspacer"></div>
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="" width="62" height="20"/></a>
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
