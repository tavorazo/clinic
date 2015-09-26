<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Pacientes:</title>
  <!-- CSS -->
  		<link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_b-master.css?471741950"/>
  <link rel="stylesheet" type="text/css" href="../css/pacientes.css?4242740055" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/s1.css" />
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu500"><!-- group -->
     <div class="browser_width grpelem" id="u500"><!-- group -->
      <div class="clearfix" id="u500_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u510" href="../index.php"><!-- image --><img class="block" id="u510_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
      </div>
     </div>
     <div class="grpelem" id="u501"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u502" href="../index.php"><!-- state-based BG images --><img id="u502_states" alt="Inicio" src="../images/blank.gif"/></a>
     <div class="grpelem" id="u503"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u504" href="../clinica.php"><!-- state-based BG images --><img id="u504_states" alt="Clinica" src="../images/blank.gif"/></a>
     <div class="grpelem" id="u505"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u506" href="../servicios.php"><!-- state-based BG images --><img id="u506_states" alt="Servicios" src="../images/blank.gif"/></a>
     <div class="grpelem" id="u507"><!-- state-based BG images --></div>
     <a class="nonblock nontext MuseLinkActive grpelem" id="u508" href="../pacientes.php"><!-- state-based BG images --><img id="u508_states" alt="Pacientes" src="../images/blank.gif"/></a>
    </div>
    <div class="colelem" id="u1158" style="border:none; min-height:550px">

    <img src="../images/en4.png" alt="" width="40px" style="float:left">
    <h3 style="font-size:26px; color:#80B4D7; font-family:Aguafina; margin-left:0px; margin-top:10px; margin-left:5px">Pacientes.</h3>
    <br><hr style="border:1px solid #80B4D7">
    <br><br><br><br>

		<form action="confirmar_cita.php" method="POST">

		<?php
		$id = $_POST['id'];
		//echo '<h1>',$id,'</h1>';
		/*$link = mysql_connect('localhost', 'root', '')
		    or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/
		include('../php/base.php');
		include('../php/base3.php');
		include('../php/base2.php');
		$contador = 0;

    $encontro_cita = 0;

			$doctor = $row2[0];
			$result2 = $conn->query("select * from agenda where id_paciente='$id' order by id_cita desc limit 1;");
			//print "select * from agenda where id_paciente='$id' order by id_cita desc limit 1";
			while ($row3 = mysql_fetch_array($result2, MYSQL_NUM)){
				$d = $row3[1];
				$p = $row3[2];
				$doctor = $conn->query("select * from usuarios where id_usuario='$d';");
				$paciente = $conn->query("select * from paciente where id_paciente='$p';");
					while ($row_doctor = mysql_fetch_array($doctor, MYSQL_NUM)){
						$doctor_nombre = $row_doctor[1];
						$doctor_apellido = $row_doctor[2];
						$doctor_apellido2 = $row_doctor[3];
					}
					while ($row_paciente = mysql_fetch_array($paciente, MYSQL_NUM)){
						$paciente_nombre = $row_paciente[1];
						$paciente_apellido = $row_paciente[2];
						$paciente_apellido2 = $row_paciente[3];
					}
				if($row3[10]=='1'){
          $encontro_cita = 1;

          echo "<a href='../pacientes.php' style='float:left'><< Regresar . </a> <h2>| Cita confirmada</h2><hr><br>";
					echo "<br>¡ Hola: ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
					echo "!<br><br>Tu cita esta agendada para el ", $row3[5],"/",$row3[4],"/",$row3[3]," a las ", $row3[6],":", $row3[7];
					echo "<br>Doctor: ",$doctor_nombre," ", $doctor_apellido," ", $doctor_apellido2;
					echo "<br>Preferencia llegar 15 minutos antes.<br>
							<br><h10>Endoperio</h10>
							<br><hr>
							<div style='padding:15px; margin-left:auto;  margin-right:auto; border:1px solid #C13241; height:15px; width:200px; margin-top:40px; text-align:center '>
							<a href='cancelar.php?id=",$row3[0],"'>Cancelar cita</a>
							</div>";
				}else {
          $encontro_cita = 1;

					echo "<a href='../pacientes.php' style='float:left'><< Regresar . </a> <h2>| Cita no confirmada</h2><hr><br>";
					echo "<br>¡Hola ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
					echo "!<br><br>Tu cita esta agendada para el  ", $row3[5],"/",$row3[4],"/",$row3[3]," a las ", $row3[6],":", $row3[7];
					echo "<br>Doctor: ",$doctor_nombre," ", $doctor_apellido," ", $doctor_apellido2;
					echo "<br><br>Te enviaremos un correo electr&oacute;nico para confirmar.<br><br>
							<h10>Endoperio</h10>
							<br><hr>";
  				echo "  <div style='padding:15px; margin-left:auto;  margin-right:auto; border:1px solid #C13241; height:15px; width:200px; margin-top:40px; text-align:center '>
					          <a href='cancelar.php?id=",$row3[0],"' > Cancelar Cita</a>
      						</div>";
							//<a href='cancelar.php?id=",$row3[0],"'>Cancelar cita</a>";		
				}

				$contador = 1;
			}
        if($encontro_cita == 0)
          echo "<a href='../pacientes.php' style='float:left'><< Regresar | </a> 
                <h2 >Lo sentimos, no tienes cita por confirmar o confirmada</h2>";

		?>
		<br>

    <div class="verticalspacer"></div>
    <div class="browser_width colelem" id="u1098" style="margin-top:210px"><!-- simple frame --></div>

  <!--Publicidad--> 
  <div style="width:900px; min-height:50px; position:relative; " >
<?php
  include('../php/base.php');
  include('../php/base3.php');
  include('../php/base2.php');

          $select = 'select * from publicidad where lugar="2";';
          $resul = $conn->query($select) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);

          echo "<img src='../publicidad/images/".$renglon['imagen']."' width='900px'>";

          mysqli_close($conn);
?>
  </div>

    <div class="clearfix colelem" id="pu1105" ><!-- group -->
     <div class="clip_frame grpelem" id="u1105" ><!-- image -->
      <img class="block" id="u1105_img" src="../images/en5.png" alt="" width="32" height="29"/>
     </div>
     <img class="grpelem" id="u1099-7" src="../images/u1099-7.png" alt="Dr. Alejandro González Merlo
CIRUJANO DENTISTA ENDOPERIODONCISTA
" width="268" height="51"/><!-- rasterized frame -->
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