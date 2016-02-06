<?php 
include('System/php/base.php');
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d");
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>

  <title>Endoperio | Citas Web</title>
  <link rel="shortcut icon" type="x-icon" href="System/images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="System/css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="System/css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="System/css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="System/css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="System/css/agregar_receta.css?4008918636" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="System/images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
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

     <a   href="index.php" style="float:left; margin-right:10px"> << Regresar </a> <h3  style="margin-right:5px">|</h3>
		<br>
		<div style="padding:30px 30px 30px 50px">
			<h1 style="font-size:35px;">Solicitar cita</h1><br>
			<form method="post" action="cita.php" accept-charset="utf-8" style="position: relative;">
				<br>
			<p>ID. de paciente: <input type="text" name="idPaciente" id="idPaciente" class="campoT" required></p>
			<br>
			<p>Día: <input type="date" name="dia" min="<?php echo $fechaActual; ?>" class="campoT" id="dia" required></p>
			<br>
			<p>Hora: <select name="hora" id="hora" class="campoT"><?php horario(); ?> </select></p>
			<br>
			<p>Descripción de la consulta<p>
			<textarea name="observacion" id="observacion" required> </textarea>
				<br>				
			<p>Doctor: <select name="doctor" id="doctor" class="campoT"> <?php doctor(); ?> </select></p>
			<br>
			<input type="submit" value="Solicitar" id="solicitar" class="campoT">
			</form>
		</div>

<?php 

$idPaciente		=	(isset($_POST['idPaciente'])?$_POST['idPaciente']:NULL);
$dia			=	(isset($_POST['dia'])?$_POST['dia']:NULL);
$hora			=	(isset($_POST['hora'])?$_POST['hora']:NULL);
$observacion	=	(isset($_POST['observacion'])?$_POST['observacion']:NULL);
$doctor			=	(isset($_POST['doctor'])?$_POST['doctor']:NULL);

if($idPaciente!=NULL && $dia!=NULL && $hora!=NULL && $observacion!=NULL && $doctor!=NULL)
	consultaNueva($idPaciente,$dia,$hora,$observacion,$doctor);

function horario(){
	$i=8;
	$j=0;
	while($i<20){
		while($j<60){
			$h = sprintf("%02s", $i);
			$m = sprintf("%02s", $j);
			echo "<option value='$h:$m'>$h : $m</option>";
			$j+=15;
		}
		$j=0;
		$i++;
	}
}

function doctor(){
	global $conn;
	$result=$conn->query("SELECT * from usuarios where rol='dentista'");
	if(!$result)
			die('Error de consulta 4: '.mysqli_error($conn));
	while ($doctores = $result->fetch_assoc()) {
		//echo $doctores['id_usuario'];
		echo "<option value='".$doctores['id_usuario']."'>".$doctores['nombres']." ".$doctores['apellido_paterno']." ".$doctores['apellido_materno']."</option>";
	}
}

function consultaNueva($idPaciente,$dia,$hora,$observacion,$doctor){
	global $conn;
	$horaMin = explode(":", $hora);

	$insert= "INSERT INTO agenda ".
			"VALUES(0,'".$doctor."','".$idPaciente."', '".date("W", strtotime($dia))."', '".date("Y", strtotime($dia))."', '".date("m", strtotime($dia))."', '".date("d", strtotime($dia))."', '".$horaMin[0]."'".
			",'".$horaMin[1]."','".$observacion."','1','0','15','".$dia."','".$idPaciente."', '".date("Y-m-d H:i:s")."' )";

	$result=$conn->query($insert);
	if(!$result)
		die('Error de consulta 4: '.mysqli_error($conn));
	else
		echo "<h1>La cita ha sido enviada, espere su confirmación</h1>";
}
?>

</div>
    <div class="verticalspacer"></div>
  </div>
</div>
<div class="preload_images">
 <img class="preload" src="System/images/u372-r.png" alt=""/>
 <img class="preload" src="System/images/u376-r.png" alt=""/>
 <img class="preload" src="System/images/u377_states-r.png" alt=""/>
 <img class="preload" src="System/images/u377_states-a.png" alt=""/>
 <img class="preload" src="System/images/u378_states-r.png" alt=""/>
 <img class="preload" src="System/images/u378_states-a.png" alt=""/>
 <img class="preload" src="System/images/u480_states-r.png" alt=""/>
 <img class="preload" src="System/images/u480_states-a.png" alt=""/>
 <img class="preload" src="System/images/u550_states-r.png" alt=""/>
 <img class="preload" src="System/images/u550_states-a.png" alt=""/>
 <img class="preload" src="System/images/u552_states-r.png" alt=""/>
 <img class="preload" src="System/images/u552_states-a.png" alt=""/>
</div>
<!-- JS includes -->
<script type="text/javascript">
if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script type="text/javascript">
window.jQuery || document.write('\x3Cscript src="System/scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script src="System/scripts/museutils.js?3840766194" type="text/javascript"></script>
<script src="System/scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
<script src="System/scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
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
