<?php
@session_start();
if($_SESSION['u']=='')
 header('location: ../index.php');

?>
<?php

  include('base.php');
//  include('base3.php');
//  include('base2.php');
  $id = $_GET['id'];
  
  $select = "SELECT * from usuarios where id_usuario='$id';";
  //$resul = $conn->query($select) or die ("problema con la solicitud");
  //$renglon = mysql_fetch_assoc($resul);
  $resul = $conn->query($select);
  $renglon = $resul->fetch_assoc();
  ?>
  <!DOCTYPE html>
  <html class="html">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="generator" content="7.0.314.244"/>
    <title>Editar usuario</title>
    <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
    <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
    <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
    <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
    <link rel="stylesheet" type="text/css" href="../css/add-usuario.css?378988628" id="pagesheet"/>
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
         <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
         <div class="grpelem" id="u516"><!-- simple frame --></div>
         <div class="clearfix grpelem" id="u518-5"><!-- content -->
           <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
         </div>
       </div>
     </div>
     <a href="../panel.php">
      <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG images -->
    </a>
  </div>
  <div class="clearfix colelem" id="pu375"><!-- group -->
   <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
 </div>
 <div class="clearfix colelem" id="pu485-4"><!-- group -->
   <div class="clearfix grpelem" id="u483-4" ><!-- content -->
    <!--p>*Esto es un ejemplo</p-->
  </div>
</div>
<div class="colelem" id="u484" ><!-- simple frame --></div>
<div style='padding:9px; position:Absolute; float:left;  margin-top:225px; height:20px; width:930px;  z-index:1900; background:#CEE3F6; padding:20px;'>
 <a   href="lista_usuarios.php" style="float:left; margin-right:10px"> << Regresar </a> <h3>| Edita tu perfil</h3><br><br>
</div>
<form action="../usuarios/edit_process_usuario.php" method="POST" enctype="multipart/form-data" style="margin-top:225px; padding:20px; padding-top:60px; margin-left:0px; background:#FFFFFF; z-index:4901; width:930px">
  <label style="float:left; width:150px; margin-right:15%" >Nombre(s):</label> 
  <input type="text" name="nombre" class="campoT"  required style="width:250px; " value="<?php echo $renglon['nombres'];?>"><br>
  <label style="float:left; width:150px; margin-right:15%" >Apellido Paterno: </label>
  <input type="text" name="a_pat" class="campoT"  required style="width:250px;" value="<?php echo $renglon['apellido_paterno'];?>"><br>        
  <label style="float:left; width:150px; margin-right:15%" >Apellido Materno: </label>
  <input type="text" name="a_mat" class="campoT"  required style="width:250px;" value="<?php echo $renglon['apellido_materno'];?>"><br>
  
  <label style="float:left; width:150px; margin-right:15%" >Fecha de nacimiento</label>
  <input type="date" name="fecha_nacimiento" class="campoT"  required style="width:250px; " value="<?php echo $renglon['fecha_nacimiento'];?>"><br>
  <br><br>
  <label style="float:left; width:150px; margin-right:15%" >Correo</label>
  <input type="mail" name="correo" class="campoT"  required style="width:250px; " value="<?php echo $renglon['correo'];?>"><br>
  <label style="float:left; width:150px; margin-right:15%" >Tel emergencia</label>
  <input type="tel" name="tel_emergencia" class="campoT"  required style="width:250px; " value="<?php echo $renglon['tel_emergencia'];?>"><br>
  <label style="float:left; width:150px; margin-right:15%" >Nombre emergencia</label>
  <input type="text" name="name_emergencia" class="campoT"  required style="width:250px; " value="<?php echo $renglon['name_emergencia'];?>"><br>
      <!--label style="float:left; width:150px; margin-right:15%" >Fecha de alta</label>
      <input type="date" name="fecha_alta" class="campoT"  required style="width:250px; "><br-->
      <label style="float:left; width:150px; margin-right:15%" >Nickname</label><input type="text" name="nickname" class="campoT"  required style="width:250px; " value="<?php echo $renglon['id_usuario']?>" readonly="readonly"><br>
      <label style="float:left; width:150px; margin-right:15%" >Contrase&ntilde;a</label>
      <input type="password" name="contra" class="campoT"  required style="width:250" value="<?php echo $renglon['password'];?>"><br>
      <br>
      <img src="../usuarios/<?php echo $renglon['imagen']; ?>" width="100px"><br><br>
      <input type="hidden" name="imagen_vieja" value="<?php echo $renglon['imagen']; ?>">;
      <label style="float:left; width:150px; margin-right:15%" >Cambiar imagen</label>
      <input type="file" name="imagen" class="campoT" style="float:left"><br>
      <br>
      <br>
      <input type="submit" value="Editar" style="margin-left:10px">
      <input type="reset" value="Resetear">
    </form>
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
