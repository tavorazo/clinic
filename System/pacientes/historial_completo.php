
<?php
@session_start();
if($_SESSION['u']=='')
	header('location: ../index.php');
	//if($_SESSION['rol']!='admin' )
			//header('location: ../panel.php');
$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
	<meta name="generator" content="7.0.314.244"/>
	<title>Historial completo</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/s1.css"/>
	<link rel="stylesheet" type="text/css" href="../css/2.css"/>
	<link rel="stylesheet" type="text/css" href="../css/texto.css"/>

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
						<a class="nonblock nontext clip_frame grpelem" id="u1147" href="../panel.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
						<div class="grpelem" id="u1149"><!-- simple frame --></div>
						<div class="clearfix grpelem" id="u1150-5"><!-- content --> 
							<p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix colelem" id="pu1132-5"><!-- group -->
				<div class="clearfix grpelem" id="u1132-5" ><!-- content -->
				</div>
				<div class="clearfix grpelem" id="u1134-4"  ><br><br><br>

					<?php
					include("../php/base.php");
		//include("../php/base2.php");
		//include("../php/base3.php");
					$id_paciente = $_GET['id_paciente'];
					$tipo = $_GET['tipo'];
					$select_p = 'select * from paciente where id_paciente="'.$id_paciente.'";';
					$resulp = $conn->query($select_p) or die ("problema con la solicitud");
					//$renglonp = mysql_fetch_assoc($resulp);
					$renglonp = $resulp->fetch_assoc();
					$nombre_paciente =$renglonp['nombres'] ." ".$renglonp['apellido_paterno']." ". $renglonp['apellido_materno'];
					/*+++++++++++++++++++++++++++++++AVANCE CLINICO++++++++++++++++++++++*/
					if($tipo=='1'){
						echo "<a href='ficha-paciente.php?id=",$id_paciente,"' style='float:left; margin-right:10px;'><< Regresar </a>  <h1>|  Avance completo del paciente: ", $nombre_paciente, "</h1><hr>";
						$result2 = $conn->query("select * from avance_clinico where id_paciente = '$id_paciente' order by fecha desc");
						echo "<table>
						<tr>
						<th>Fecha de avance</th>
						<th>Descripci&oacute;n</th>
						<th>Atendido por</th></tr>";
						while ($row_avance = $result2->fetch_row()){
							echo "<tr><td> ", $row_avance[4],"</td>";
							echo "<td>", $row_avance[3],"</td>";
							$select = 'select * from usuarios where id_usuario="'.$row_avance[2].'";';
							$resul = $conn->query($select) or die ("problema con la solicitud");
							$renglon = $resul->fetch_assoc();
							echo "<td>", $renglon['nombres']," ", $renglon['apellido_paterno'], " ", $renglon['apellido_materno'], "</td></tr>";
						}
						echo "</table>";
					}
					/*+++++++++++++++++++++++++++++++ RECETAS ++++++++++++++++++++++*/
					if($tipo=='2'){
						echo "<a href='ficha-paciente.php?id=",$id_paciente,"' style='float:left; margin-right:10px;'><< Regresar </a>  <h1>|  Recetas del paciente: ", $nombre_paciente, "</h1><hr>";
			//echo "Recetas completas del paciente: ", $nombre_paciente;
						$result3 = $conn->query("select * from recetas where id_paciente='$id_paciente' order by fecha desc;");
						echo "<table>
						<tr>
						<th>Fecha de receta</th>
						<th>Asignada por</th>
						<th>Medicamento</th>
						<th>Observaciones</th></tr>";
						while ($row_receta = $result3->fetch_row()) {
							echo "<tr><td>", $row_receta[5],"</td>";
							$select = 'select * from usuarios where id_usuario="'.$row_receta[1].'";';
							$resul = $conn->query($select) or die ("problema con la solicitud");
							$renglon = $resul->fetch_assoc();
							echo "<td>", $renglon['nombres']," ", $renglon['apellido_paterno'], " ", $renglon['apellido_materno'], "</td>";
							echo "<td>", $row_receta[3],"</td>";
							echo "<td>", $row_receta[4],"</td></tr>";
						}
						echo "</table>";
					}
					/*+++++++++++++++++++++++++++++++ FOTOGRAFIAS CLINICAS ++++++++++++++++++++++*/
					if($tipo=='3'){
						echo "<a href='ficha-paciente.php?id=",$id_paciente,"' style='float:left; margin-right:10px;'><< Regresar </a>  <h1>|  Fotografias Cl&iacute;nicas del paciente: ", $nombre_paciente, "</h1><hr>";
			//echo "Fotografias Cl&iacute;nicas del paciente: ", $nombre_paciente;
						$result3 = $conn->query("select * from fotografias_clinicas where id_paciente='$id_paciente' order by fecha_foto desc;");
						echo "<table>
						<tr>
						<th>Imagen</th>
						<th>Descripci&oacute;n</th>
						<th>Fecha</th></tr>";
						while ($row_receta = $result3->fetch_row()) {
							echo "<tr><td><a href='fotografias_clinicas/",$row_receta[2],"'><img src='fotografias_clinicas/", $row_receta[2],"'  width='80px'></a></td>";
							echo "<td>", $row_receta[4],"</td>";
							echo "<td>",$row_receta[3],"</td></tr>";
						}
						echo "</table>";
					}
					/*+++++++++++++++++++++++++++++++ FOTOGRAFIAS EXTERNAS ++++++++++++++++++++++*/
					if($tipo=='4'){
						echo "<a href='ficha-paciente.php?id=",$id_paciente,"' style='float:left; margin-right:10px;'><< Regresar </a>  <h1>|  Fotografias externas del paciente: ", $nombre_paciente, "</h1><hr>";
			//echo "Fotografias Externas del paciente: ", $nombre_paciente;
						$result3 = $conn->query("select * from fotografias_externas where id_paciente='$id_paciente' order by fecha_foto desc;");
						echo "<table>
						<tr>
						<th>Imagen</th>
						<th>Descripci&oacute;n</th>
						<th>Fecha</th></tr>";
						while ($row_receta = $result3->fetch_row()) {
							echo "<tr><td><a href='fotografias_externas/",$row_receta[2],"'><img src='fotografias_externas/", $row_receta[2],"'  width='80px'></a></td>";
							echo "<td>", $row_receta[4],"</td>";
							echo "<td>",$row_receta[3],"</td></tr>";
						}
						echo "</table>";
					}
					/*+++++++++++++++++++++++++++++++ RADIOGRAFIAS ++++++++++++++++++++++*/
					if($tipo=='5'){
						echo "<a href='ficha-paciente.php?id=",$id_paciente,"' style='float:left; margin-right:10px;'><< Regresar </a>  <h1>|  Radiograf&iacute;as del paciente: ", $nombre_paciente, "</h1><hr>";
			//echo "Radiograf&iacute;as del paciente: ", $nombre_paciente;
						$result3 = $conn->query("select * from radiografias where id_paciente='$id_paciente' order by fecha_foto desc;");
						echo "<table>
						<tr>
						<th>Imagen</th>
						<th>Descripci&oacute;n</th>
						<th>Fecha</th></tr>";
						while ($row_receta = $result3->fetch_row()) {
							echo "<tr><td><a href='radiografias/",$row_receta[2],"'><img src='radiografias/", $row_receta[2],"'  width='80px'></a></td>";
							echo "<td>", $row_receta[4],"</td>";
							echo "<td>",$row_receta[3],"</td></tr>";
						}
						echo "</table>";
					}
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