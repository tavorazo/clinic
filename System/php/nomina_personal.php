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
  <title>Nomina almacen</title>
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
  <script>
  function ver(){
    document.getElementById("uno").style.display = "none"
    document.getElementById("dos").style.display = "inline"
  }
  function ocultar(){
    document.getElementById("uno").style.display = "inline"
    document.getElementById("dos").style.display = "none"
  }
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
   <!-- formulario editar en nominas -->  
   <?php
   include("base.php");
   //include("base2.php");
   //include("base3.php");
   $id_usuario = $_GET['id'];
   $select = 'SELECT * from nomina where id_usuario="'.$id_usuario.'";';
   $resul = $conn->query($select);
   $renglon = $resul->fetch_assoc();
   //$resul = $conn->query($select, $dbh) or die ("problema con la solicitud");
   //$renglon = mysql_fetch_assoc($resul);
   $select2 = 'SELECT * from usuarios where id_usuario="'.$id_usuario.'";';
   $resul = $conn->query($select2);
   $renglon2 = $resul->fetch_assoc();
   //$resul2 = $conn->query($select2, $dbh) or die ("problema con la solicitud");
   //$renglon2 = mysql_fetch_assoc($resul2);
   ?>
   <h1> <a href="lista_usuarios.php" style="float:left; margin-right:10px"> << Regresar </a> </h1>
   <h1>Nomina de <?php echo $renglon2['nombres'], " ", $renglon2['apellido_paterno']," ", $renglon2['apellido_materno']; ?></h1><hr><br>
   <form action="pagar_empleado.php" method="POST">
     <input type="hidden" name="sueldo" value="<?php echo $renglon['sueldo']; ?>" >
     <input type="hidden" name="vacaciones" value="<?php echo $renglon['vacaciones']; ?>" >
     <input type="hidden" name="aguinaldo" value="<?php echo $renglon['aguinaldo']; ?>" >
     <input type="hidden" value="<?php echo $id_usuario; ?>" name="id_usuario">
     
     <table style="min-width:100%">
      <td>
        <label style="margin-right:10px; float:left">Activar Vacaciones: </label>
      </td><td>
      <select name="vacaciones_" class="campoT" style="width:120px" style="margin-right:10px; float:right">
       <option value="1">No</option>
       <option value="2">Si</option>
     </select>
   </td><td>
   <label style="margin-right:20px; float:left">Activar Aguinaldo: </label>
 </td><td>
 <select name="aguinaldo_" class="campoT" style="width:120px" style="margin-right:19px; float:left">
  <option value="1">No</option>
  <option value="2">Si</option>
</select>
</td><td>
<?php
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria')
  echo '<input type="submit" value="Pagar" style="margin-right:10px; float:left">';
?>
</td>
</table>
</form>
<a href="#" onclick="ver();" id="uno">Modificar nomina</a>
<form action="moficiar_nomina.php" method="POST" style="display:none; margin-right:30px" id="dos" >
  <label style="float:left; margin-right:10px; margin-top:3px ">Sueldo: </label> 
  <input type="text" name="sueldo" class='campoT' style="width:120px; float:left; margin-right:10px;"  value="<?php echo $renglon['sueldo']; ?>">
  <label style="margin-right:10px; float:left; margin-top:3px ">Vacaciones: </label>
  <input type="text" name="vacaciones" class='campoT' style="width:120px; margin-right:10px; float:left"  value="<?php echo $renglon['vacaciones']; ?>">
  <label style="margin-right:10px; float:left; margin-top:3px ">Aguinaldo: </label>
  <input type="text" name="aguinaldo" class='campoT' style="width:120px; margin-right:10px; float:left"   value="<?php echo $renglon['aguinaldo']; ?>">
  <input type="hidden" value="<?php echo $id_usuario; ?>" name="id_usuario">
  <?php
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria')
    echo '<input type="submit" value="Modificar" style="width:90px; height:30px; margin-top:-1px">';
  ?>
  
</form>
<br><br>
<!--br><br>
  <a href="lista_usuarios.php">Regresar</a-->
  </div>
</div>
<div class="verticalspacer"></div>
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