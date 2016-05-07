<?php
@session_start();
include('php/base.php');
if($_SESSION['rol']!='admin')
  header('location: index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">';
$usuario = $_SESSION['u'];
$sucursal = $_SESSION['sucursal'];

$result=$conn->query("SELECT id_sucursal from usuarios where id_usuario = '$usuario' ");
if(!$result)
  die('Error de consulta 2: '.mysqli_error($conn));

$usr_sucursal = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html class="html">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="generator" content="7.0.314.244"/>
  <title>add usuario</title>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="css/add-usuario.css?378988628" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += ' js';
  </script>
</head>
<body>
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content" >
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366" ><!-- group -->
      <div class="clearfix" id="u366_align_to_page" >
       <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
         <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesi&oacute;n</h12></a></span></p>
       </div>
     </div>
   </div>
   <a href="panel.php">
    <img class="grpelem" id="u372" alt="servicios" src="images/blank.gif"/><!-- state-based BG images -->
  </a>
</div>
<div class="clearfix colelem" id="pu375"><!-- group -->
 <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
 <a class="nonblock nontext grpelem" id="u376" href="agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="images/blank.gif"/></a>
 <a class="nonblock nontext grpelem" id="u377" href="buscar-paciente.php"><!-- state-based BG images --><img id="u377_states" alt="Buscar paciente" src="images/blank.gif"/></a>
 <a class="nonblock nontext grpelem" id="u378" href="add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="images/blank.gif"/></a>
 <a class="nonblock nontext MuseLinkActive grpelem" id="u480" href="add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="images/blank.gif"/></a>
 <a class="nonblock nontext grpelem" id="u550" href="almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="images/blank.gif"/></a>
 <a class="nonblock nontext grpelem" id="u552" href="contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="images/blank.gif"/></a>
</div>
<div class="clearfix colelem" id="pu485-4"><!-- group -->
 <img class="grpelem" id="u485-4" src="images/u485-4.png" alt="Agregar usuario" width="237" height="29"/><!-- rasterized frame -->
 <div class="clearfix grpelem" id="u483-4" ><!-- content -->
  <!--p>*Esto es un ejemplo</p-->
</div>
</div>
<div class="verticalspacer"></div>
<form action="usuarios/nuevo_usuario.php" method="POST" enctype="multipart/form-data" style="margin-top:50px;z-index:9000; padding:20px; margin-left:0px; background:#FFFFFF; z-index:400; width:90%">
  <?php 
    if($usr_sucursal['id_sucursal']==0){
      echo '<label style="float:left; width:150px; margin-right:15%">Sucursal: </label>';
      echo '<select name="sucursal" class="campoT" required>';
      $result_suc = $conn->query("select * from sucursales");
      while($sucs = $result_suc->fetch_assoc()){
              echo "<option value='".$sucs['id_sucursal']."'> ".$sucs['id_sucursal'].".- ".utf8_encode($sucs['sucursal'])." </option> ";
            }
      echo '</select><br>';
    }
    else{
      echo '<input type=hidden name="sucursal" value="'.$sucursal.'">';
    }
    ?>
  <label style="float:left; width:150px; margin-right:15%" >Nombre(s):</label> 
  <input type="text" name="nombre" class="campoT"  required style="width:250px; "><br>
  <label style="float:left; width:150px; margin-right:15%" >Apellido Paterno: </label>
  <input type="text" name="a_pat" value="" class="campoT"  required style="width:250px; "><br>
  <label style="float:left; width:150px; margin-right:15%" >Apellido Materno: </label>
  <input type="text" name="a_mat"value="" class="campoT"  required style="width:250px; "><br>
  
  <label style="float:left; width:150px; margin-right:15%" >Fecha de nacimiento</label>
  <input type="date" name="fecha_nacimiento" class="campoT"  required style="width:250px; "><br>
  
  <label style="float:left; width:150px; margin-right:15%" >Rol: </label><select name="rol" class="campoT">
  <option value="admin">Administrador General</option>
  <option value="recepcionista">Recepcionista</option>
  <option value="secretaria">Aux administrativo</option>
  <option value="dentista">Dentista</option>
  <option value="almacen">Almacenista</option>
  <option value="becario">Becario</option>
  <option value="publicista">Publicista</option>
</select><br><br>
<label style="float:left; width:150px; margin-right:15%" >Correo</label>
<input type="mail" name="correo" class="campoT"  required style="width:250px; "><br>
<label style="float:left; width:150px; margin-right:15%" >Tel emergencia</label>
<input type="number" name="tel_emergencia" class="campoT"  required style="width:250px; "><br>
<label style="float:left; width:150px; margin-right:15%" >Nombre emergencia</label>
<input type="text" name="name_emergencia" class="campoT"  required style="width:250px; "><br>
      <!--label style="float:left; width:150px; margin-right:15%" >Fecha de alta</label>
      <input type="date" name="fecha_alta" class="campoT"  required style="width:250px; "><br-->
      <label style="float:left; width:150px; margin-right:15%" >Nickname</label><input type="text" name="nickname" class="campoT"  required style="width:250px; "><br>
      <label style="float:left; width:150px; margin-right:15%" >Contrase&ntilde;a</label>
      <input type="password" name="contra" class="campoT"  required style="width:250"><br>
      <label style="float:left; width:150px; margin-right:15%" >Repite Contrase&ntilde;a</label>
      <input type="password" name="contraR" class="campoT"  required style="width:250"><br>
      
      <label style="float:left; width:150px; margin-right:15%">Foto de ingreso</label>
      <input type="file" name="imagen" class="campoT" style="float:left"><br><br><br><br>
      <input type="submit" value="Guardar" style="margin-left:10px">
      <input type="reset" value="Resetear">
      
      <br><br><br><br>
      <div style=" padding:9px; margin-left:auto;  margin-right:auto; border:1px solid #2d455f; height:16px; width:250px; margin-top:12px; text-align:center ">
        <a href="php/lista_usuarios.php" target='_new'>Ver Usuarios Modo Admin</a>
      </div>
    </form>
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
