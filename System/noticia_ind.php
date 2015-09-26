<!DOCTYPE html>
<html class="html">
 <head>

          <?php
                  
                  $n = $_GET['n'];
                  
                  /*$host="localhost";
                  $usuario="root";
                  $contrasena="";
                  $bdd="Endoperio";*/
				  include('php/base2.php');
                  //$tabla="Noticias";
                  //mysql_connect($host,$usuario,$contrasena);
                  //mysql_select_db($bdd);
                  //Consultamos a la base de datos para sacar las columnas de la tabla
                  //$result = $conn->query("SHOW COLUMNS FROM $tabla");
          
                  //ahora consultamos a la base de datos para sacar los registros contenidos
                  $result2 = $conn->query("SELECT * FROM noticias where id_noticia='$n'");
                
                  while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
              ?>
  <!--meta http-equiv="Content-type" content="text/html;charset=UTF-8"/-->
  <meta name="generator" content="7.0.314.244"/>
  <title>Noticia_ind [<?php echo $row2[3]?>]</title>
  <!-- CSS ->
  <link rel="stylesheet" type="text/css" href="css/text.css"/-->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>

  		<link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_b-master.css?471741950"/>
  <link rel="stylesheet" type="text/css" href="css/noticia_ind.css?528612588" id="pagesheet"/>
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
     <a class="nonblock nontext grpelem" id="u508" href="pacientes.php"><!-- state-based BG images --><img id="u508_states" alt="Pacientes" src="images/blank.gif"/></a>
    </div>
    <div class="clearfix colelem" id="u532-4"><!-- content -->
     <p ><?php echo $row2[3],"</p><font size='2' color='gray'>", nl2br($row2[4])?> </font>
    </div>
    <div class="clearfix colelem" id="pu533"><!-- group -->
     <div class="clearfix grpelem" id="u533"><!-- group -->
      <div class="clearfix grpelem" id="u536-3"><!-- content -->

              <?php


                      echo "",nl2br($row2[2]),"<br><br>";
              
              ?>

      </div>
     </div>
     <div class="clearfix grpelem" id="pu534"><!-- column -->
      <div class="rounded-corners colelem"  >
        <!-- simple frame -->
        <?php echo "<br><img src='Noticias/",$row2[1],"' align='left' width='300px;  style='border:1px solid gray; '>"; 
        }
        ?>
      </div>
      <div class="clearfix colelem" id="ppu537"><!-- group -->
       <a class="nonblock nontext grpelem" id="u537" href="index.php"><!-- state-based BG images --><img id="u537_states" alt="Regresar.." src="images/blank.gif"/></a>
      <a href="http://twitter.com/home?status=leyendo%20http://www.webox.org.mx">
       <div class="clip_frame grpelem" id="u538"><!-- image -->
        <img class="block" id="u538_img" src="images/twitter.png" alt="" width="24" height="23"/>
       </div>
      </a><a href="http://www.facebook.com/sharer.php?u=www.webox.org.mx">
       <div class="clip_frame grpelem" id="u540"><!-- image -->
        <img class="block" id="u540_img" src="images/facebook.png" alt="" width="24" height="23"/>
       </div>
      </a>
      </div>
     </div>
    </div>
    <div class="verticalspacer"></div>
    <div class="browser_width colelem" id="u1098"><!-- simple frame --></div>
    <div class="clearfix colelem" id="pu1105"><!-- group -->
     <div class="clip_frame grpelem" id="u1105"><!-- image -->
      <img class="block" id="u1105_img" src="images/en5.png" alt="" width="32" height="29"/>
     </div>
     <img class="grpelem" id="u1099-7" src="images/u1099-7.png" alt="Dr. Alejandro González Merlo
CIRUJANO DENTISTA ENDOPERIODONCISTA
" width="268" height="51"/><!-- rasterized frame -->
    </div>
    <!--div class="clearfix colelem" id="ppu1112"><!-- group --
     <div class="clearfix grpelem" id="pu1112"><!-- column --
      <div class="clip_frame colelem" id="u1112"><!-- image --
       <img class="block" id="u1112_img" src="images/direccion.png" alt="" width="32" height="32"/>
      </div>
      <div class="clip_frame colelem" id="u1110"><!-- image --
       <img class="block" id="u1110_img" src="images/phone.png" alt="" width="35" height="35"/>
      </div>
      <div class="clip_frame colelem" id="u1108"><!-- image --
       <img class="block" id="u1108_img" src="images/email.png" alt="" width="35" height="35"/>
      </div>
     </div>
     <div class="clearfix grpelem" id="pu1102-6"><!-- column --
      <img class="colelem" id="u1102-6" src="images/u1102-6.png" alt="Planta El Infiernillo No. 101 , Col. Electricistas. Morelia Michoacán. México." width="321" height="34"/>
        <!-- rasterized frame --
      <div class="clearfix colelem" id="pu1107-6"><!-- group --
       <img class="grpelem" id="u1107-6" src="images/u1107-6.png" alt="CITAS
+52 443 324 8008" width="138" height="37"/><!-- rasterized frame --
       <img class="grpelem" id="u1100-6" src="images/u1100-6.png" alt="URGENCIAS
044 443 114 4047" width="152" height="40"/><!-- rasterized frame --
      </div>
      <img class="colelem" id="u1101-4" src="images/u1101-4.png" alt="contacto@endoperio.com.mx" width="200" height="17"/>
      <!-- rasterized frame --
     </div>
     <div class="grpelem" id="u1115"><!-- simple frame --</div>
     <div class="clearfix grpelem" id="u1114-4"><!-- content --
      <p>sesion</p>
     </div>
    </div>
    <a class="nonblock nontext clip_frame colelem" id="u1103" href="http://www.webox.org.mx"><
      !-- image --<img class="block" id="u1103_img" src="images/completo7.png" alt="" width="89" height="28"/></a>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/home1h-u501-r.png" alt=""/>
   <img class="preload" src="images/u502_states-r.png" alt=""/>
   <img class="preload" src="images/u502_states-a.png" alt=""/>
   <img class="preload" src="images/homeh-u503-r.png" alt=""/>
   <img class="preload" src="images/u504_states-r.png" alt=""/>
   <img class="preload" src="images/u504_states-a.png" alt=""/>
   <img class="preload" src="images/en2h-u505-r.png" alt=""/>
   <img class="preload" src="images/u506_states-r.png" alt=""/>
   <img class="preload" src="images/u506_states-a.png" alt=""/>
   <img class="preload" src="images/en3h-u507-r.png" alt=""/>
   <img class="preload" src="images/u508_states-r.png" alt=""/>
   <img class="preload" src="images/u508_states-a.png" alt=""/>
   <img class="preload" src="images/u537_states-r.png" alt=""/>
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