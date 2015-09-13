<!DOCTYPE html>
<html class="html">

<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
include("php/base.php");

include('php/base.php');

?>

 
 <head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Buscar paciente</title>
        <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>

  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="css/buscar-paciente.css?4261381216" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
</script>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="index.php"><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
 <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesion</h12></a></span></p>
       </div>
      </div>
     </div>
     <a href="panel.php">
      <img class="grpelem" id="u372" alt="servicios" src="images/blank.gif"/><!-- state-based BG images -->
     </a>
    </div>
    <div class="clearfix colelem" id="pu375"><!-- group -->
    
    </div>
 



    <div class="verticalspacer"></div>
    
        <br><br><br>

    <a href="busqueda_avanzada.php">Regresar</a>
    <?php

    //$buscar = $_POST['b_paciente'];
    $a = $_POST['n_registro'];
    $e = $_POST['nombre'];
    $b = $_POST['a_pat'];
    $c = $_POST['a_mat'];
    $d = $_POST['telefono'];
    //$e = $_POST['celular'];


    //if($a!='' and $b!='' and $c!='' and $d!='' and $e!='')
    //  $result2 = mysql_query("select * from paciente where nombres like '%$n%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$e%' or n_registro like '%$a%';");



    $vacio = 0;
    if($a=='' and $b=='' and $c=='' and $d=='' and $e=='')
    $vacio = 1;
    if($a=='' and $b=='' and $c=='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%';");
    if($a=='' and $b=='' and $c=='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where telefono like '%$d%' or celular like '%$d%'");
    if($a=='' and $b=='' and $c=='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%';");
    if($a=='' and $b=='' and $c!='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_materno like '%$c%'");
    if($a=='' and $b=='' and $c!='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%';");
    if($a=='' and $b=='' and $c!='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");
    if($a=='' and $b=='' and $c!='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");
    if($a=='' and $b!='' and $c=='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_paterno like '%$b%';");
    if($a=='' and $b!='' and $c=='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%';");
    if($a=='' and $b!='' and $c=='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%';");
    if($a=='' and $b!='' and $c=='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%';");
    if($a=='' and $b!='' and $c!='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_paterno like '%$b%' or apellido_materno like '%$c%';");
    if($a=='' and $b!='' and $c!='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%';");
    if($a=='' and $b!='' and $c!='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");
    if($a=='' and $b!='' and $c!='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");

    if($a!='' and $b=='' and $c=='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c=='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c=='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c=='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c!='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_materno like '%$c%' or id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c!='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%' or id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c!='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b=='' and $c!='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c=='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c=='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c=='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c=='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c!='' and $d=='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_paterno like '%$b%' or apellido_materno like '%$c%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c!='' and $d=='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c!='' and $d!='' and $e=='')
    $result2 = mysql_query("select * from paciente where apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
    if($a!='' and $b!='' and $c!='' and $d!='' and $e!='')
    $result2 = mysql_query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");

    echo'<hr><h3>Resultados para: ',$a,' ',$e,' ',$b,' ',$c,' ',$d,'<hr></h3>';
    //}

    //$result2 = mysql_query("select * from paciente where nombres like '%$buscar%' or apellido_paterno like '%$buscar%' or apellido_materno like '%$buscar%' or id_paciente like '%$buscar%' or n_registro like '%$buscar%';");

    //echo '<h1>Resultados para: ',$_POST['b_paciente'],'</h1>';

    if($vacio!=1){
        $a = 0;
        while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
          
            $a = 1;

          echo "<fieldset><legend><br><br><h10>Datos Personales</h10></legend><br><br>  ";

          echo "<br><div  style='width:25%; height:220px; float:left; '>
              <img src='pacientes/images_pacientes/",$row2[21],"' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;'>
              </div>";

          echo "<label style='width:200px; float:left; margin-left:15px; '>
                Numero de ficha:</label> ", $row2[0], "<br>";
          echo "<label style='width:200px; float:left; margin-left:15px; '>
                Nombre: </label>", $row2[1]," ", $row2[2]," ",$row2[3],"<br>";
          echo "<label style='width:200px; float:left; margin-left:15px; '>
                Fecha de nacimiento:</label> ", $row2[4];
          echo "<br><label style='width:200px; float:left; margin-left:15px; '>
                Sexo: </label>", $row2[16];
          echo "<br><label style='width:200px; float:left; margin-left:15px; '>
                Referencia: </label>", $row2[13];
          echo "<br><div id='botn' style='margin-left:80%'><a href='pacientes/ficha-paciente.php?id=",$row2[0],"'>Revisar</a><br>";
          echo "</div></fieldset>";

          echo "<hr style='margin-bottom:20px;'>";
        }
        
        if($a==0)
          print "no hay resultados";
    }
    else
      print "Campos Vacios";

    ?>






    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="images/completo7.png" alt="" width="62" height="19"/></a>
   </div>
  </div>
  <div class="preload_images">
   <img class="preload" src="images/u372-r.png" alt=""/>
   <img class="preload" src="images/u376_states-r.png" alt=""/>
   <img class="preload" src="images/u376_states-a.png" alt=""/>
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