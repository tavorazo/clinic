<?php
@session_start();
if($_SESSION['rol']!='admin'){
  if($_SESSION['rol']!='almacen')
    if($_SESSION['rol']!='secretaria')
      header('location: ../panel.php');
  }
  $usuario = $_SESSION['u'];
  date_default_timezone_set("Mexico/General");
?>



  <!DOCTYPE html>
  <html class="html">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta name="generator" content="7.0.314.244"/>
    <title>Ventas</title>
    <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
    <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
    <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/texto.css" />
    <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
    <link rel="stylesheet" type="text/css" href="../css/2.css"/>
    <link rel="stylesheet" type="text/css" href="filtros.css"/>
    <style>
      table { margin-top: -150px; padding: 100px; background: #f9f9f9; border: #999 solid 1px;}
      td{ padding: 5px 0;}
      tr:nth-child(even){background: #f2f2f2; }
  
    </style>
    <!-- Other scripts -->


  </head>
  <body >
    <div class="clearfix" id="page"><!-- column -->
      <div class="position_content" id="page_position_content">
        <div class="clearfix colelem" id="pu366"><!-- group -->
         <div class="browser_width grpelem" id="u366"><!-- group -->
          <div class="clearfix" id="u366_align_to_page">
           <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
           <div class="grpelem" id="u516"><!-- simple frame --></div>
           <div class="clearfix grpelem" id="u518-5"><!-- content -->
            <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>
          </div>
        </div>
      </div>     
      <a href="../panel.php">
        <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG ../images -->
      </a>
    </div>
    <div class="clearfix colelem" id="pu375"><!-- group -->
      <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
      <a class="nonblock nontext grpelem" style="width:80%; color:#fff; position:absolute;"> 
      </a>
    </div>
    <div class="clearfix colelem" id="pu1078-4"><!-- group -->
      <div style="width:900px; ">
        <h9> Panel de filtros para mercadotecnía. </h9>
      </div>
      <div class="clearfix grpelem" id="u1079-4"><!-- content -->
        <!--p>*Esto es un ejemplo</p-->
      </div>
    </div>
    <!--frame de busqueda de pacientes-->

    <?php include("back/filtros.html"); ?>



    <!--  ..............   -->
    <div class="preload_images">
      <img class="preload" src="../images/u372-r.png" alt=""/>
      <img class="preload" src="../images/u376_states-r.png" alt=""/>
      <img class="preload" src="../images/u376_states-a.png" alt=""/>
      <img class="preload" src="../images/u377_states-r.png" alt=""/>
      <img class="preload" src="../images/u377_states-a.png" alt=""/>
      <img class="preload" src="../images/u378_states-r.png" alt=""/>
      <img class="preload" src="../images/u378_states-a.png" alt=""/>
      <img class="preload" src="../images/u480_states-r.png" alt=""/>
      <img class="preload" src="../images/u480_states-a.png" alt=""/>
      <img class="preload" src="../images/u550_states-r.png" alt=""/>
      <img class="preload" src="../images/u550_states-a.png" alt=""/>
      <img class="preload" src="../images/u552_states-r.png" alt=""/>
      <img class="preload" src="../images/u552_states-a.png" alt=""/>
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