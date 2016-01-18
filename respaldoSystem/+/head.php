<?php
    //head acondicionado para estilos 2, partes del codigo como hisoriales, consultas clinicas etc

    @session_start();
    error_reporting(0);
    if($_SESSION['rol']!='admin'){
        if($_SESSION['rol']!='secretaria')
        header('location: ../panel.php');
    }
    $usuario = $_SESSION['u'];
    include('../php/base.php');
   date_default_timezone_set("Mexico/General");
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Endoperio | <?php echo $title; ?> </title>
          <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="../css/agendatabla.css" />
  <link rel="stylesheet" type="text/css" href="../css/texto.css" />
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
 

  <!-- Other scripts -->
  <script type="text/javascript">
   document.documentElement.className += ' js';
  </script>
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
     <?php
     if($_SESSION['rol']=='admin'){
     echo '
     <a class="nonblock nontext grpelem" id="u376" href="../agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u377" href="../buscar-paciente.php"><!-- state-based BG ../images --><img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
     }
     echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
     if($_SESSION['rol']=='admin'){
     echo '
     <a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';
     }
     ?>
    </div>
    <div class="clearfix colelem" id="pu1078-4"><!-- group -->
    <div style="width:200px; ">
        <h9><?php echo $title;?></h9>
     </div>
     <div class="clearfix grpelem" id="u1079-4"><!-- content -->
      <!--p>*Esto es un ejemplo</p-->
     </div>
    </div>
    <div class="verticalspacer"></div>
    <br><br><br>

<div style="margin-left:10%; background:#FFFDFD; padding:18px; width:98% " >
   