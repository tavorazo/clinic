<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: ../index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
?><!DOCTYPE html>
<html class="html">
 <head>

  <!--meta http-equiv="Content-type" content="text/html;charset=UTF-8"/-->
  <meta name="generator" content="7.0.314.244"/>
  <title>Editar</title>
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
	<!--input name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" /--> 
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu1145"><!-- group -->
     <div class="browser_width grpelem" id="u1145"><!-- group -->
      <div class="clearfix" id="u1145_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
      </div>
     </div>
     <img class="grpelem" id="u1154" alt="Agregar " src="../images/blank.gif"/><!-- state-based BG images -->
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">
     <!-- formulario agregar receta -->

<div class="wrapper">
      <?php
      $id   = $_GET['id'];
      $cat  = $_GET['cat'];
      $id_p = $_GET['id_p'];

      echo " <h1><a href='../pacientes/ficha-paciente.php?id=",$id_p,"' style='float:left; margin-right:10px'> < Regresar   </a>";
      echo "<h3 style='margin-right:6px'> |</h3><h3> Editar </h3><br><hr><BR>";
      /*
        cat 1 fotos clinicas
        car 2 fotos externas
        cat 3 radiografias
        cat 4 enfermedades el id que recibe es el de  enfermedad no el del paciente, si no mama todo
        
      */

      /*$dbh = mysql_connect('localhost','root','') or die('Error de conexion: ' . mysql_error() );
      $base = mysql_select_db('Endoperio', $dbh) or die('Error de seleccion de base: ' . mysql_error() );*/
      include("base.php");

      if($cat == '1'){
      $select = 'select * from fotografias_clinicas where id_foto="'.$id.'";';
      $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
      $renglon = mysql_fetch_assoc($resul);
      $imagen = $renglon['nombre_foto'];

      echo "<form action='../pacientes/fotografias_clinicas/procesar_editar.php' method='POST' enctype='multipart/form-data'>";
      echo "<img src='../pacientes/fotografias_clinicas/",$renglon['nombre_foto'],"' width='100px'><br>";
      echo "<input type='file' name='imagen'  required>";

      //echo '<input type="hidden" name="id" value="',$id,'">';
      echo "<input type='hidden' name='id' value='",$id,"'>";
      echo "<input type='hidden' name='id_paciente' value='",$renglon['id_paciente'],"'>";

      }

      if($cat == '2'){
      $select = 'select * from fotografias_externas where id_foto="'.$id.'";';
      $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
      $renglon = mysql_fetch_assoc($resul);
      $imagen = $renglon['nombre_foto'];

      echo "<form action='../pacientes/fotografias_externas/procesar_editar.php' method='POST' enctype='multipart/form-data'>";
      echo "<img src='../pacientes/fotografias_externas/",$renglon['nombre_foto'],"' width='100px'><br>";
      echo "<input type='file' class='campoT' name='imagen'  required>";

      echo "<input type='hidden' name='id' value='",$id,"'>";
      echo "<input type='hidden' name='id_paciente' value='",$renglon['id_paciente'],"'>";
       
      }

      if($cat == '3'){
      $select = 'select * from radiografias where id_foto="'.$id.'";';
      $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
      $renglon = mysql_fetch_assoc($resul);
      $imagen = $renglon['nombre_foto'];

      echo "<form action='../pacientes/radiografias/procesar_editar.php' method='POST' enctype='multipart/form-data'>";
      echo "<img src='../pacientes/radiografias/",$renglon['nombre_foto'],"' width='100px'><br>";
      echo "<input type='file' class='campoT' name='imagen'  required>";

      echo "<input type='hidden' name='id' value='",$id,"'>";
      echo "<input type='hidden' name='id_paciente' value='",$renglon['id_paciente'],"'>";
         
      }

      if($cat == '4'){
      $select = 'select * from enfermedades where id_enfermedad="'.$id.'";';
      $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
      $renglon = mysql_fetch_assoc($resul);


      echo "<form action='procesar_editar_enfermedad.php' method='POST' enctype='multipart/form-data'>";
      echo "<label>Nombre de la enfermedad</label>
            <textarea name='nombre' style='height:50px'>",$renglon['nombre_enfermedad'],"</textarea><br>";
      echo "<label>Descripci&oacute;n/Observaciones</label>";
      echo "<textarea name='tipo_enfermedad'>",$renglon['tipo_enfermedad'],"</textarea><br>";

      echo "<input type='hidden' name='id' value='",$id,"'>";
      echo "<input type='hidden' name='id_paciente' value='",$renglon['id_paciente'],"'>";

      }
      echo "<br><input type='submit' class='campoT' value='Editar'><br>";
      echo "</form>";

        

        //echo "<a href='../pacientes/ficha-paciente.php?id=",$renglon['id_paciente'],"'>Regresar</a>";
      //<div id="botn2" style="margin-top:-68px; float:left; margin-left:160px; height:14px"> <a href="../panel.php">Cancelar</a></div> <br><br>
      ?>
	


	
</div>

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