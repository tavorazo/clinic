<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');
  //if($_SESSION['rol']!='admin')
  //    header('location: ../panel.php');
$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="css/agregar_receta.css?4008918636" id="pagesheet"/>
  <title>Felicitación personalizada</title>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <style>
  #u1134-4 img{ padding: 4px 10px 0 4px ;}
  </style>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" ><!-- image --><img class="block" id="u1147_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
         <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
     </div>
   </div>
 </div>
 <div class="clearfix colelem" id="pu1132-5"><!-- group -->
   <div class="clearfix grpelem" id="u1132-5"><!-- content -->
   </div>
   <div class="clearfix grpelem" id="u1134-4">
     <a   href="panel.php" style="float:left; margin-right:10px"> << Regresar </a> <h3  style="margin-right:5px">|</h3>
     <h1>Felicitación personalizada</h1><hr><br>
     <?php
     @session_start();
     include('php/base.php');
     $id_paciente = $_GET['id_paciente'];
     $correo = $_GET['correo'];
     $select = 'select * from paciente where id_paciente="'.$id_paciente.'";';
     $resul = $conn->query($select) or die ("problema con la solicitud");
     $renglon_paciente = $resul->fetch_assoc();
     $nombres = $renglon_paciente['nombres']." ". $renglon_paciente['apellido_paterno']." ".$renglon_paciente['apellido_materno'];

     if($correo1=''){
      echo '<h1>Felicitación personalizada para: '.$renglon_paciente['nombres'].' '.$renglon_paciente['apellido_paterno'].' '.$renglon_paciente['apellido_materno'].' </h1>';
      echo '<br>Correo: '.$correo.'<br><br><br>';
    }else{
      print "Envir felicitación a_<br><br>";
    }
    ?>
    <form method="POST" action="enviar_felicitacion_personalizada.php" enctype="multipart/form-data">
      <input type="text" name="asunto" placeholder="Asunto" class="campoT"><br><br>
      <textarea name="contenido" cols="50" rows="30" placeholder="Contenido del correo" ></textarea><br>
      <input type="hidden" name="correo" value="<?php echo $correo; ?>">
      <input type="file" name="imagen"><br>
      <input class="campoT" type="hidden" name="nombre" value="<?php echo $nombres; ?>">
      <input  type="submit" value="Enviar correo">
    </form>
    <br><hr><h3>Felicitar en redes sociales: </h3><br><br>
    <?php 
    if ($renglon_paciente['redes_sociales'] == '') 
      echo"
    <a href='https://twitter.com/search?f=users&vertical=default&q=".$renglon_paciente['nombres']."' target='_blank'> 
    <img src='https://cdn1.iconfinder.com/data/icons/logotypes/32/square-twitter-20.png'> Buscar en Twitter 
    </a>
    <a href='https://www.facebook.com/search/results/?init=quick&q=".$renglon_paciente['nombres']."' target='_blank'> 
    <img src='https://cdn1.iconfinder.com/data/icons/logotypes/32/square-facebook-20.png'> Buscar en Facebook
    </a> ";
    else
      echo"
    <a href='https://twitter.com/search?f=users&vertical=default&q=".$renglon_paciente['redes_sociales']."' target='_blank'> 
    <img src='https://cdn1.iconfinder.com/data/icons/logotypes/32/square-twitter-20.png'> Buscar en Twitter
    </a>
    <a href='https://www.facebook.com/search/results/?init=quick&q=".$renglon_paciente['redes_sociales']."' target='_blank'> 
    <img src='https://cdn1.iconfinder.com/data/icons/logotypes/32/square-facebook-20.png'> Buscar en Facebook
    </a> ";
    ?>  
  </div>
</div>
<div class="verticalspacer"></div>
</div>
</div>
<div class="preload_images">
 <img class="preload" src="images/u1154-r.png" alt=""/>
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