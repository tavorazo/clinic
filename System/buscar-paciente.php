<?php
@session_start();
if($_SESSION['u']=='')
  header('location: index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
$sucursal = $_SESSION['sucursal'];
?>
<!DOCTYPE html>
<html class="html">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  
  <meta name="generator" content="7.0.314.244"/>
  <title>Buscar paciente</title>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="css/buscar-paciente.css?4261381216" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += ' js';
  </script>
</head>
<body>
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesion</h12></a></span></p>
      </div>
    </div>
  </div>
  <a href="panel.php">
    <img class="grpelem" id="u372" alt="servicios" src="images/blank.gif"/><!-- state-based BG images -->
  </a>
</div>
<div class="clearfix colelem" id="pu375"><!-- group -->
 <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
 <?php
 if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u376" href="agenda.php"> <img id="u376_states" alt="Registro de consultas" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista')
  echo '<a class="nonblock nontext MuseLinkActive grpelem" id="u377" href="buscar-paciente.php"> <img id="u377_states" alt="Buscar paciente" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u378" href="add-paciente.php"> <img id="u378_states" alt="Agregar pacientes" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u480" href="add-usuario.php"> <img id="u480_states" alt="Agregar usuarios" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen')
  echo '<a class="nonblock nontext grpelem" id="u550" href="almacen.php"> <img id="u550_states" alt="Almacen" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u552" href="contabilidad.php"> <img id="u552_states" alt="Contabilidad" src="images/blank.gif"/></a>';
?>
</div>
<div class="clearfix colelem" id="pu472-4"><!-- group -->
 <img class="grpelem" id="u472-4" src="images/u472-4.png" alt="Buscar paciente" width="236" height="29"/><!-- rasterized frame -->
 <div class="clearfix grpelem" id="u471-4"><!-- content -->
  <!--p>*Esto es un ejemplo</p-->
</div>
</div>
<div class="colelem" id="u470">
</div>
<div class="verticalspacer"></div>
<form action="buscar-paciente.php" method="POST" style="margin-top:-20px; z-index:300; background:#FFFFFF; padding:20px; width:89%" >
  <label style="float:left; margin-left:60px; margin-right:20px; "> Ingrese nombre del paciente   </label>
  <input type="search" name="b_paciente"  class="campoT" style=" border: 1px solid gray; height:35px; margin-right:20px; ">
  <label style="float:left; margin-left:60px; margin-top:10px; margin-right:50px; "> O ingrese ID del paciente   </label>
  <input type="search" name="id"  class="campoT" style="float:left; border: 1px solid gray; height:35px; margin-right:20px; ">
  
  <input type="submit" value="buscar"  style="color:white; margin-top:-35px; margin-bottom:50px " >
  
</form>
<div style="margin-left:33%;" >   
  <a href="busqueda_avanzada.php"><img src="images/addH.png" alt="Busqueda_Avanzada" style="float:left; width:30px; margin-left:10px;margin-right:10px; margin-top:1px">
  <h1 style="padding:7px">Busqueda avanzada</h1></a><br><br>
  <a href="buscar_sucursal_externa.php">Buscar paciente en otra sucursal</a>
</div><br>
<?php
include('php/base.php');
      //echo '<h9>Resultados para: ',$_POST['b_paciente'],'</h9><br><br><br>';
$buscar = $_POST['b_paciente'];
$id = $_POST['id'];
?>
<!--a href="menu.php">Regresar</a-->
<?php
if($id == 0)
  $result2 = $conn->query(($sucursal==0) ? "SELECT * from paciente where nombres like '%$buscar%' or apellido_paterno like '%$buscar%' or apellido_materno like '%$buscar%' or id_paciente like '%$buscar%' or n_registro like '%$buscar%'  LIMIT 10;" : "SELECT * from paciente where (nombres like '%$buscar%' or apellido_paterno like '%$buscar%' or apellido_materno like '%$buscar%' or id_paciente like '%$buscar%' or n_registro like '%$buscar%') and id_sucursal=$sucursal LIMIT 10;" );
        //$result2 = $conn->query("SELECT * from paciente where nombres like '%$buscar%' or apellido_paterno like '%$buscar%' or apellido_materno like '%$buscar%' or id_paciente like '%$buscar%' or n_registro like '%$buscar%'  LIMIT 10;");
else
  $result2 = $conn->query(($sucursal==0) ?  "SELECT * from paciente where  id_paciente like '%$id%'  LIMIT 10;" : "SELECT * from paciente where  id_paciente like '%$id%' and id_sucursal=$sucursal LIMIT 10;" );
        //$result2 = $conn->query("SELECT * from paciente where  id_paciente like '%$id%'  LIMIT 10;");
while ($row2 = $result2->fetch_row()) {
    //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM) ) {
      //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
  
  echo ' <br><br><fieldset><legend style="width:90%; background:#585A5A; padding:6px; padding-left:24px;">
  <h10 style="color:#FFFFFF">Datos Personales</legend></h10>';
  echo "<div style='width:90%; background:#FFFFFF; padding:15px;  '>
  <div  style='width:25%; height:220px; float:left; '>";
  echo "<br><br>";
  if($row2[21] == "")
    echo "<img src='pacientes/images_pacientes/predeterminado.png' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;'> </div>";
  else
    echo "<img src='pacientes/images_pacientes/imagenes/",$row2[21],"' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;'> </div>";
    echo "<div  style='width:50%; height:220px; float:left; margin-left:-5%; ' ><br><br><br>";
    echo "<label style='width:200px; float:left; margin-left:15px; '>Numero de ficha:</label> ", $row2[0], "<br>";

    $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$row2[33]);
    $renglon_sucursal  =   $result_sucursal->fetch_assoc();
    echo "<label style='width:200px; float:left; margin-left:15px; '>Sucursal:</label> ", $renglon_sucursal['sucursal'], "<br>";

    echo "<label style='width:200px; float:left; margin-left:15px; '>Nombre: </label>", $row2[1]," ", $row2[2]," ",$row2[3],"<br>";
    echo "<label style='width:200px; float:left; margin-left:15px; '>Fecha de nacimiento: </label>", $row2[4];
    echo "<br><label style='width:200px; float:left; margin-left:15px;'>Sexo: </label>", $row2[23];
    echo "<br><label style='width:200px; float:left; margin-left:15px;'>Referencia: </label>", $row2[16];
    echo "</div>
    <div  style='width:25%; height:220px; floar:right; margin-left:70%'> ";
    echo "<br><br><br><br><br>
    <div id='botn'><a href='pacientes/ficha-paciente.php?id=",$row2[0],"'>Revisar</a></div><br>";
    echo "</div></div></fieldset>";
      //echo "<hr style='margin-bottom:20px;'>";
}
?>
<a href='buscar-paciente.php'> << Regresar </a> 
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-32.png"alt="Octavio Razo" /></a>
</div>
</div>
<div class="preload_images">
 <img class="preload" src="images/u372-r.png" alt=""/>
 <img class="preload" src="images/u376_states-r.png" alt=""/>
 <img class="preload" src="images/u376_states-a.png" alt=""/>
 <img class="preload" src="images/u377_states-r.png" alt=""/>
 <img class="preload" src="images/u377_states-a.png" alt=""/>
 <img class="preload" src="images/u378_states-r.png" alt=""/>
 <img class="preload" src="images/u378_states-a.png" alt=""/>
 <img class="preload" src="images/u480_states-r.png" alt=""/>
 <img class="preload" src="images/u480_states-a.png" alt=""/>
 <img class="preload" src="images/u550_states-r.png" alt=""/>
 <img class="preload" src="images/u550_states-a.png" alt=""/>
 <img class="preload" src="images/u552_states-r.png" alt=""/>
 <img class="preload" src="images/u552_states-a.png" alt=""/>
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