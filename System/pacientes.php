<!DOCTYPE html>
<?php
  include('php/base.php');
  include('php/base3.php');
  include('php/base2.php');
?>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Pacientes:</title>
  <!-- CSS -->
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_b-master.css?471741950"/>
  <link rel="stylesheet" type="text/css" href="css/pacientes.css?4242740055" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="css/s1.css" />
  <link rel="stylesheet" type="text/css" href="css/texto.css" />
  <!-- Other scripts -->
    <script type="text/javascript">
       document.documentElement.className += ' js';
    </script>
    <script> 
        //para ocultar y ver menu
          function ver(){
                  document.getElementById("b").style.display = "inline"
                 // document.getElementById("dos").stylfe.display = "none"
          }
    </script>

   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu500"><!-- group -->
     <div class="browser_width grpelem" id="u500"><!-- group -->
      <div class="clearfix" id="u500_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u510" href="index.php"><!-- image --><img class="block" id="u510_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
      </div>
     </div>
     <div class="grpelem" id="u501"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u502" href="index.php"><!-- state-based BG images --><img id="u502_states" alt="Inicio" src="images/blank.gif"/></a>
     <div class="grpelem" id="u503"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u504" href="clinica.php"><!-- state-based BG images --><img id="u504_states" alt="Clinica" src="images/blank.gif"/></a>
     <div class="grpelem" id="u505"><!-- state-based BG images --></div>
     <a class="nonblock nontext grpelem" id="u506" href="servicios.php"><!-- state-based BG images --><img id="u506_states" alt="Servicios" src="images/blank.gif"/></a>
     <div class="grpelem" id="u507"><!-- state-based BG images --></div>
     <a class="nonblock nontext MuseLinkActive grpelem" id="u508" href="pacientes.php"><!-- state-based BG images --><img id="u508_states" alt="Pacientes" src="images/blank.gif"/></a>
    </div>
    <div class="colelem" id="u1158" style="border:none; min-height:550px">

    <img src="images/en4.png" alt="" width="40px" style="float:left">
    <h3 style="font-size:26px; color:#80B4D7; font-family:Aguafina; margin-left:0px; margin-top:10px; margin-left:5px">Pacientes.</h3>
    <br><hr style="border:1px solid #80B4D7">
    <br><br><br><br>

      <div  style="float:left; width:45%;  padding:20px;  background:#FFFF; min-height:190px">
        <form action="paciente_citas/ver_citas_cliente.php" method="POST">
          <h2 style="font-size:20px; color:#80B4D7; font-family: tahoma">Revisa tu cita</h2><br><br><br>
          <h3 style="margin-left:0px">Escribe tu ID de paciente para ver tu cita:</h3><br>
          <input class="campoT " type="text" name="id">
          <input type="submit" value="Revisar">
        </form>
      </div>

      <!--publicidad-->
      <div  style="float:left; width:460px;  border:0px solid #BDBDBD; min-height:150px">
        <?php
          $select = 'select * from publicidad where lugar="1";';
          $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);

          echo "<img src='publicidad/images/".$renglon['imagen']."' width='460px'>";
        ?>
      </div>
       

      <div  style="float:left; width:100%;  margin-top: 50px; padding:20px; border-top:2px solid #A9CEE7; min-height:190px">

        <div style="float:left; width:30%;  min-height:100px; padding-top:200px">
          <h3 style="color:#58ACFA; font-size:25px">¿Quieres una cita?</h3><br><br><br>
        </div>
        
        <div style="float:right; width:70%;  min-height:100px; padding-top:100px; ">

            <center>
            <h3> En Endoperio te atendemos. <br> Ingresa tus datos para obtener una cita. 
            <form action="paciente_citas/cita_paciente02.php" method="POST" style="width:500px;margin-top:40px">
                <a href="#2" onclick="ver();" style="color:#FFF; text_decoration:none " >
                  <div style="color;#FFF; background:green;  width:120px; height:30px; padding:9px; padding-bottom:2px" >
                  Crear cita
                  </div>
                </a>

                <div id="b" style="display:none; ">
                  <hr style="border-color:#D8D8D8">
                  <h2 style="font-size:16px; color:#80B4D7; font-family: tahoma;  " >  Busca tu n&uacute;mero de Paciente</h2><br>
                  <input type="text" class="campoT" name="id"  >
                  
                  <input type="submit" value="Buscate" style='padding:5px; margin-top:-4px'>
                  
                  <hr style="border-color:#D8D8D8">
                </div><br>
            </form><br>
            O bien, comunicate al  (443) 324 8008
            </h3>

          </div>
      </div>
    <div class="verticalspacer"></div>
    <div class="browser_width colelem" id="u1098" style="margin-top:210px"><!-- simple frame --></div>
    

  <!--Publicidad--> 
  <div style="width:900px; min-height:50px; position:relative; " >
        <?php
          $select = 'select * from publicidad where lugar="2";';
          $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);

          echo "<img src='publicidad/images/".$renglon['imagen']."' width='900px'>";

          mysql_close($conexion);
        ?>
  </div>


    <div class="clearfix colelem" id="pu1105" ><!-- group -->
     <div class="clip_frame grpelem" id="u1105" ><!-- image -->
      <img class="block" id="u1105_img" src="images/en5.png" alt="" width="32" height="29"/>
     </div>
     <img class="grpelem" id="u1099-7" src="images/u1099-7.png" alt="Dr. Alejandro González Merlo
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