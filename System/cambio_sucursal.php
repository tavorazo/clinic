<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');

include('php/base.php');
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d");

$usuario = $_SESSION['u'];
$sucursal = $_SESSION['sucursal'];

if($_SESSION['rol']!='admin')
	header('location: panel.php');

$result=$conn->query("SELECT id_sucursal from usuarios where id_usuario = '$usuario' ");
if(!$result)
	die('Error de consulta 2: '.mysqli_error($conn));

$usr_sucursal = $result->fetch_assoc();

if($usr_sucursal['id_sucursal']!=0)
	header('location: panel.php');
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>

  <title>Endoperio | Citas Web</title>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="css/agregar_receta.css?4008918636" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">

     <a   href="panel.php" style="float:left; margin-right:10px"> << Regresar </a> <h3  style="margin-right:5px">|</h3>
		<br>
<?php  
$sel_sucursal		=	(isset($_POST['sucursal'])?$_POST['sucursal']:$sucursal);

$result=$conn->query("SELECT * from sucursales");
if(!$result)
	die('Error de consulta 4: '.mysqli_error($conn));

?>
		<div style="padding:30px 30px 30px 50px">
			<h1 style="font-size:35px;">Ver datos como sucursal: </h1><br>
			<form method="post" action="cambio_sucursal.php" accept-charset="utf-8" style="position: relative;">
				<select name="sucursal" class="campoT">
					<?php  
						while($sucs = $result->fetch_assoc()){
							echo "<option value='".$sucs['id_sucursal']."'> ".$sucs['id_sucursal'].".- ".$sucs['sucursal']." </option> ";
						}
					?>
				</select>
				<input type="submit" value="Cambiar" class="campoT"></input>
			</form>
<?php 
	echo "<p>Sucursal actual: <b>".$sel_sucursal."</b></p>"; 
	if($sel_sucursal!=$sucursal)
		$_SESSION['sucursal']=$sel_sucursal;
?>
		</div>
</div>
    <div class="verticalspacer"></div>
  </div>
</div>
<div class="preload_images">
 <img class="preload" src="images/u372-r.png" alt=""/>
 <img class="preload" src="images/u376-r.png" alt=""/>
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
<script src="scripts/museutils.js?3840766194" type="text/javascript"></script>
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
