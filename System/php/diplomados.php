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
 <title> Adeudos para usuarios</title>
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
  if(document.getElementById("uno").style.display == "inline"){
   document.getElementById("uno").style.display = "none"
  }
  else{
    document.getElementById("uno").style.display = "inline"
  }

 }
 function ver2(){
  if(document.getElementById("dos").style.display == "inline"){
   document.getElementById("dos").style.display = "none"
  }
  else{
    document.getElementById("dos").style.display = "inline"
  }

 }
 function ver3(){
  if(document.getElementById("tres").style.display == "inline"){
   document.getElementById("tres").style.display = "none"
  }
  else{
    document.getElementById("tres").style.display = "inline"
  }

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
</div>
<div class="clearfix colelem" id="pu1132-5"><!-- group -->
 <div class="clearfix grpelem" id="u1132-5"><!-- content -->
 </div>
 <div class="clearfix grpelem" id="u1134-4">
  <?php
  @session_start();
  $id = $_GET['id'];
  include("base.php");
  ?>
  <h1 style="float:left; margin-right:20px"> <a href="lista_usuarios.php"> << Regresar </a> </h1> 
  <h1> Compras para usuarios </h1> <hr>
  <br>
  <br><h1><a href="#" onClick="ver();"> > Diplomado </a> </h1>
  <hr style="width:200px; float:left"> <br><br>
  <form action="procesar_diplomado.php" method="POST" style="padding-left: 10px; display:none" id="uno">
   <input type="hidden" name="usuario" value="<?php echo $id; ?>">
   <label> Descripción: </label>
   <textarea name="diplomado" style="height:50px" placeholder="Escriba aqu&iacute;..."></textarea><br>
   <br>
   <h1 style="float:left; margin-right:20px">Precio</h1>
   <input type="number" min="0" class="campoT" name="precio" style="width:100px; height:14px; float:left; margin-right:20px" placeholder="$100">
   <label style="float:left; margin-right:20px">Tipo de pago</label>
   <select name="pago" class="campoT" style="width:100px; height:14px; float:left; margin-right:20px">
    <option value="0"  > </option>
    <option value="1">Efectivo</option>
    <option value="2">Cheque</option>
    <option value="3">Tarjeta</option>
    <option value="4">Transferencia</option>
  </select><br><br>
  <label>Descripción de pago</label><br>
  <textarea name="descripcion" style="height:50px" placeholder="Escriba aqu&iacute;..."></textarea><br>
  <input type="submit" value="Crear" style="height:30px">
  <br><hr>
</form>
<br><h1><a href="#" onClick="ver2();"> > Instrumental </a> </h1>
<hr style="width:200px; float:left"> <br><br>
<form action="procesar_instrumental.php" method="POST" style="padding-left: 10px; display:none" id="dos"> 
  <input type="hidden" name="usuario" value="<?php echo $id; ?>">
  <label><br>Descripción de instrumental: </label>
  <textarea name="diplomado" style="height:50px" placeholder="Escriba aqu&iacute;..."></textarea><br><br>
  <h1 style="float:left; margin-right:20px">Precio</h1>
  <input type="number" min="0" name="precio" class="campoT" style="width:100px; height:14px; float:left; margin-right:20px" placeholder="$100">
  <label style="float:left; margin-right:20px">Tipo de pago</label>
  <select name="pago" style="width:100px; height:14px; float:left; margin-right:20px" class="campoT">
    <option value="0"  > </option>
    <option value="1">Efectivo</option>
    <option value="2">Cheque</option>
    <option value="3">Tarjeta</option>
    <option value="4">Transferencia</option>
  </select><br><br>
  <label>Descripción de pago</label><br>
  <textarea name="descripcion" style="height:50px" placeholder="Escriba aqu&iacute;..."></textarea><br>
  <input type="submit" value="Crear" style="height:30px">
</form>
<br><h1><a href="#" onClick="ver3();"> > Uniforme</a> </h1>
<hr style="width:200px; float:left"> <br><br>
<form action="procesar_uniforme.php" method="POST" style="padding-left: 10px; display:none" id="tres"> 
  <input type="hidden" name="usuario" value="<?php echo $id; ?>">
  <label><br>Descripción de uniforme: </label>
  <textarea name="uniforme" style="height:50px" placeholder="Escriba aqu&iacute;..."></textarea><br><br>
  <h1 style="float:left; margin-right:20px">Precio</h1>
  <input type="number" min="0" name="precio" class="campoT" style="width:100px; height:14px; float:left; margin-right:20px" placeholder="$100">
  <label style="float:left; margin-right:20px">Tipo de pago</label>
  <select name="pago" style="width:100px; height:14px; float:left; margin-right:20px" class="campoT">
    <option value="0"  > </option>
    <option value="1">Efectivo</option>
    <option value="2">Cheque</option>
    <option value="3">Tarjeta</option>
    <option value="4">Transferencia</option>
  </select><br><br>
  <label>Descripción de pago</label><br>
  <textarea name="descripcion" style="height:50px" placeholder="Escriba aqu&iacute;..."></textarea><br>
  <input type="submit" value="Crear" style="height:30px">
</form>
<!--  ..............   -->
</div>
<div class="verticalspacer"></div>
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-24.png" alt="" /></a>
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
