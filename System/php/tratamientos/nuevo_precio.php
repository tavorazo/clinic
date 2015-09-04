<?php
	@session_start();

	if($_SESSION['rol']!='admin' )
    if($_SESSION['rol']!='secretaria' )
			header('location: ../panel.php');
	$usuario = $_SESSION['u'];
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
      		<link rel="shortcut icon" type="x-icon" href="../../images/icon.png" /><!--para logo en barra-->
  <meta name="generator" content="7.0.314.244"/>
  <title>Insertar precios</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="../../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../../css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="../../css/agregar_receta.css?4008918636" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../../panel.php"><!-- image --><img class="block" id="u1147_img" src="../../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content --> 
       <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../../php/logout.php"><h12> cerrar sesion</h12></a></span></p>

       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5" ><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4" >
     <!-- formulario insertar almacen -->
      <a href="../../contabilidad.php" title="Regresar" style="float:left; "><< Regresar | </a>
      <h3 style="margin-left:10px"> Agregar precio nuevo <a href="lista_precios.php" target="_blank">- Ver precios agregados</a></h3><br><hr><br>

			<form action="procesar_nuevo.php" method="POST" >

			<label style="float:left; margin-right:20px">Nombre de tratamiento</label> <input type="text" name="nombre" class="campoT"><br><br>
			<label style="float:left; margin-left:110px; margin-right:20px">Precio 1: </label><input type="number" name="p1" min="0" class="campoT"><br><br>
			<label style="float:left; margin-left:110px; margin-right:20px">Precio 2: </label><input type="number" name="p2" min="0" class="campoT"><br><br>
			<label style="float:left; margin-left:110px; margin-right:20px">Precio 3: </label><input type="number" name="p3" min="0" class="campoT"><br><br>
      <label style="float:left; margin-left:110px; margin-right:20px">Precio 4: </label><input type="number" name="p4" min="0" class="campoT"><br><br>
      <label style="float:left; margin-left:110px; margin-right:20px">Precio 5: </label><input type="number" name="p5" min="0" class="campoT"><br><br>
			<input type="submit" value="Guardar"><input type="reset" value="Resetear">
			 
			</form>


     </div>
    </div>
    <div class="verticalspacer"></div>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="../../images/u1154-r.png" alt=""/>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">
   if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script type="text/javascript">
   window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
  <script src="../../scripts/museutils.js?3865766194" type="text/javascript"></script>
  <script src="../../scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
  <script src="../../scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
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