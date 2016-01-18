<?php
session_start();
?>
<!DOCTYPE html>
<html class="html">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta name="generator" content="7.0.314.244"/>
	<title>Pacientes:</title>
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
						<a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
						<div class="grpelem" id="u1149"><!-- simple frame --></div>
						<div class="clearfix grpelem" id="u1150-5"><!-- content -->
							<!--p>USUARIO&nbsp; | <span id="u1150-2">cerrar sesion</span></p-->
						</div>
					</div>
				</div>
				<img class="grpelem" id="u1154" alt="Agregar " src="../images/blank.gif"/><!-- state-based BG images -->
			</div>
			<div class="clearfix colelem" id="pu1132-5"><!-- group -->
				<div class="clearfix grpelem" id="u1132-5"><!-- content -->
				</div>
				<div class="clearfix grpelem" id="u1134-4">
					<!-- formulario cita 2 -->
					<?php
		/*$link = mysql_connect('localhost', 'root', '')
		    or die('No se pudo conectar: ' . mysql_error());
		    mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/
		    include('../php/base.php');

		//$a = $_POST['n_registro'];
		    $b = $_POST['id'];
		    $vacio = 0;
		    if($a=='' and $b==''){
		    	$vacio = 1;
		    }
		    else if($a=='' and $b!=''){
		    	$result2 = $conn->query("SELECT* from paciente where id_paciente='$b';");
		    }
		    else if($a!='' and $b==''){
		    	$result2 = $conn->query("SELECT* from paciente where n_registro='$a';");
		    }
		    else if($a!='' and $b!=''){
		    	$result2 = $conn->query("SELECT* from paciente where n_registro='$a' or id_paciente='$b';");
		    }
		//print "SELECT* from paciente where n_registro='$b'";
		//$result2 = $conn->query("SELECT* from paciente where nombres like '%$buscar%' or apellido_paterno like '%$buscar%' or apellido_materno like '%$buscar%' or id_paciente like '%$buscar%' or n_registro like '%$buscar%';");
		//echo '<h1>Resultados para: ',$_POST['b_paciente'],'</h1>';
		    if($vacio!=1){

		//}
		    	$a = 0;
		    	//while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
		    	while ($row2 = $result2->fetch_row()) {
		    		echo'<h2 style="font-size:14px; color:#888; font-family: tahoma; float:left; margin-right:10px">
		    		<a href="../pacientes.php"> <<  </a> | Esto fue lo que encontramos sobre el paciente con No. de paciente ',$b, ' </h2><br><hr>';
		    		$a = 1;
		    		echo "<div style='width:80%; border: #2E9AFE 1px solid; padding:30px; margin-top:50px'>";
		    		echo "<fieldset><h2 style='font-size:20px; color:#80B4D7; font-family: tahoma'>
		    		Revisa tus datos personales</h2><br>";
		    		echo "<div style='width:40%; float:left'><br>
		    		<img src='../pacientes/images_pacientes/",$row2[21],"' style='border-radius:200px; border: blue 1px solid; width:200px; height:200px;'>";
		    		echo "</div><div style='width:40%; float:left; margin-top:40px'>
		    		<h3><label>Nombre: </label>", $row2[1]," ", $row2[2]," ",$row2[3],"<br>";
		    		echo "	<br><label>Fecha de nacimiento: </label>", $row2[4];
		    		echo "	<br>
		    		<br><label>Correo electronico: </label><br>", $row2[13];

		    		echo "</h3></div>
		    		<br>";
		    		echo "</fieldset>";
		    		echo "</div>
		    		<div  style='padding:9px;  margin-left:auto;  margin-right:auto; opacity:0.7; float:left; background:#01A9DB; height:22px; width:150px; margin-top:12px; text-align:center;'>
		    		<a href='../pacientes.php' style=' text-decoration:none; color:white; font-size:16px'>No soy yo</a>
		    		</div>
		    		<div style=' padding:9px;  margin-left:auto;  margin-right:100px; background:#45953F;  height:22px; width:150px; margin-top:12px; text-align:center;  '>
		    		<a href='cita_paciente03.php?paciente=",$row2[0],"' style=' text-decoration:none; color:white; font-size:18px'>Siguiente paso</a>
		    		</div>";
		    	}

		    	if($a==0)
		    		echo "<br><br> 
		    	<a href='pacientes.php' style=' text-decoration:none; color:gray; font-size:16px'><< Regresar</a>
		    	<h2>Lo sentimos, no te encontramos en nuestras bases.</h2>";


		    }
		    else
		    	print "<br> Campos Vacios";
		    ?>
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