<?php
	@session_start();
		if($_SESSION['u']=='')
			header('location: ../index.php');
	//if($_SESSION['rol']!='admin')
	//		header('location: ../panel.php');
	//$usuario = $_SESSION['u'];
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Receta </title>
      <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="index.html"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
         <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
      </div>
     </div> 
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">
     <!-- formulario agregar foto clinica -->

<div class="wrapper">


<?php
      include("base.php");

          $id_receta = $_GET['id'];
          $select = 'select * from recetas where id_receta="'.$id_receta.'";';
          $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);
          $doctor = $renglon['id_usuario'];
          $paciente = $renglon['id_paciente'];
          
          $select_medico = 'select * from usuarios where id_usuario="'.$doctor.'";';
          $resul_doc = mysql_query($select_medico, $dbh) or die ("problema con la solicitud");
          $renglon_doc = mysql_fetch_assoc($resul_doc);
          
          $select_paciente = 'select * from paciente where id_paciente="'.$paciente.'";';
          $resul_paciente = mysql_query($select_paciente, $dbh) or die ("problema con la solicitud");
          $renglon_paciente = mysql_fetch_assoc($resul_paciente);
          
          echo"<div style='margin-left:5%'>";
          echo '<div style="width:45%; min-height:70px;  float:left;">
                <img src="../images/endoperio-logo.png" alt="" width="224" />
              </div>
              <div style="  margin-top:-8px; margin-left:40%; position:absolute; padding:5px; text-align: center; width:52%; min-height:70px; background:#1F70C6; float:left;">
                <h14>Dr. Alejandro Gonzales Merlo</h14>
                <br><h15>Cirujano Dentista - Endoperiodoncista</h15>
                <br><h14>U N A M</h14>
                <br><h15>Cedula: 4831055 - Cedula Especialidad: 2630146</h15><br>
              </div><br><br><br><br><br><hr>
              ';

          echo "<br><h3><label> Paciente:</label> ",$renglon_paciente['nombres']," ",$renglon_paciente['apellido_paterno']," ",$renglon_paciente['apellido_materno'];
          $p =$renglon_paciente['nombres'].$renglon_paciente['apellido_paterno'].$renglon_paciente['apellido_materno'];
          echo "<label style='margin-left:360px'>Fecha:</label> ", $renglon['fecha'],"</h3><br>";
          $f = $renglon['fecha'];

    $medicament = nl2br($renglon['medicamento']);
    $observac   = nl2br($renglon['observaciones']);

          echo "  <div style='border:1px solid #A9E2F3; min-height:200px'>
                  <br><h3>",$medicament,"</h3><br><br>";
          echo "  </div><br>
                  <div style='border:1px solid #A9E2F3; min-height:100px'>
                  <h3>",$observac,"</h3><br>";
          echo "  </div>";
          echo "  <div style='width:99%; margin-top:10px; min-height:20px; background:#D4F2F8; padding:5px; '>
                  <h16>Planta infiernillo Nº 101 Col Electrisistas Citas (443) 324 8008 Urgencias 044 443 114 4047 </h16>
                  </div> 
                  <div style='width:99%; margin-top:10px; min-height:20px; background:#10BEE5; padding:5px'>
                  <h17>www.endoperio.com.mx</h17>
                  </div> 
                </div>

                <div style='padding:15px; margin-left:auto;  margin-right:auto; border:1px solid #298A08; height:15px; width:200px; margin-top:40px; text-align:center '>
					          <a href='imprimir_receta.php?id=",$id_receta,"' > Imprimir Receta</a>
      					</div>
                <div style='padding:15px; margin-left:auto;  margin-right:auto; border:1px solid #298A08; height:15px; width:200px; margin-top:40px; text-align:center '>
                    <a href='recetapdf.php?id=",$id_receta,"&p=",$p,"&f=",$f,"&m=",$medicament,"&o=",$observac,"' > PDF</a>
                </div>";
      						
         // echo "<a href='imprimir_receta.php?id=",$id_receta,"'> imprimir </a>";

          //echo "  <br><br>R E C E T A - No [ ] - <label style='margin-left:50%'> Dr </label>", $renglon_doc['nombres']," ", $renglon_doc['apellido_paterno']," ",$renglon_doc['apellido_materno'],"";

      ?>
</div>

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
   window.jQuery || document.write('\x3Cscript src="../scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
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