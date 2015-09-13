<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Clinica</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_b-master.css?471741950"/>
  <link rel="stylesheet" type="text/css" href="css/clinica.css?383453551" id="pagesheet"/>
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/2.css"/>
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  <style type="text/css" media="screen">
  #curriculum img{
    border-radius: 50%;
    border: white 1px solid; 
  }
  #curriculum img:hover{
    border: #58ACFA 1px solid; 
    opacity: .8;
  }
  #curriculum a{
    padding: 8px;
    border: #58ACFA solid 1px;
    border-radius: 25px;
  }
  #curriculum h30{
    text-align: center;
    font-size: 16px;
    color: #2A6A88;
    font-weight: 1;
  }
  
  </style>
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
   <a class="nonblock nontext MuseLinkActive grpelem" id="u504" href="clinica.php"><!-- state-based BG images --><img id="u504_states" alt="Clinica" src="images/blank.gif"/></a>
   <div class="grpelem" id="u505"><!-- state-based BG images --></div>
   <a class="nonblock nontext grpelem" id="u506" href="servicios.php"><!-- state-based BG images --><img id="u506_states" alt="Servicios" src="images/blank.gif"/></a>
   <div class="grpelem" id="u507"><!-- state-based BG images --></div>
   <a class="nonblock nontext grpelem" id="u508" href="pacientes.php"><!-- state-based BG images --><img id="u508_states" alt="Pacientes" src="images/blank.gif"/></a>
 </div>
 <!-- crear este texto imagen en texto-->
 <div style="margin:90px 45px; width:85%; height:300px; ">
  <br><br><br>
  <h10> Endo Perio Dental Center </h10><br><br>
  <h12>Es un concepto innovador y único en el estado de Michoacán, nuestro objetivo principal, 
    es brindar atención especializada para la conservación de una salud bucal integral, aplicando las especialidades de endodoncia, 
    periodoncia y cirugía oral, técnicas y tratamiento conjuntos de estas ramas de la odontología, para conservar tus piezas dentales 
    y el estado óptimo de tus encías. <br><br>Contamos con los equipos más modernos, cámaras intraorales, equipos ultrasónicos, radiología digital. 
    
    Sistemas de cómputo para control de pacientes y citas además de muchas más innovaciones para la mejor atención de sus enfermedades bucodentales. <br><br>
    Somos un equipo de trabajo, constituido por personal altamente calificado, y con el unido propósito de brindarte de manera cordial, la mejor atención.
  </h12>
</div><!-- rasterized frame -->
<div class="colelem" id="u906" style="margin-top:-100px;"><!-- simple frame --></div>
<h10 style="margin: -10px 30px;">Equipo Profesional Endoperio Dental Center</h10>
<?php
$tabla="usuarios";
include('php/base.php');
include('php/base3.php');
include('php/base2.php');
      //Consultamos a la base de datos para sacar las columnas de la tabla
$result = mysql_query("SHOW COLUMNS FROM $tabla");
echo "<div style='margin:auto auto' id='curriculum'>";
      //ahora consultamos a la base de datos para sacar los registros contenidos
$result2 = mysql_query("SELECT * FROM $tabla");
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) { 
  if($row2[5] == 'admin' && $row2[1] !=  'webox'){
    echo"  <div style='width:25%; margin:0 auto; padding:20px; float:left;'>
    <br><center><img src='usuarios/",$row2[11],"' style='float:bottom; margin-right:30px; margin-top:-5px; padding:10px; width:160px; height:160px'><br>";
    echo "<h30><br>", $row2[1]," ",$row2[2]," ", $row2[3],"</h30><br>";
                              //echo "<br><label>Fecha de Nacimiento: </label>", $row2[4];
    echo "<br><h12> Dentista";
                             // echo "<br>", $row2[5];
    echo "<br>", $row2[6];
                              //echo "<br><label>Contacto de emergencia: </label>",$row2[8];
                              //echo "<br><label>Telefono de emergencia: </label>", $row2[7];
                              //echo "<br><label>Fecha de alta: </label>", $row2[9];
                            //  echo "<br><label>Password: </label>", $row2[10];
    $select = 'select * from curriculum where id_usuario="'.$row2[0].'";';
    $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
    $renglon = mysql_fetch_assoc($resul);
    
    echo "  </h12>
    <br><br>
    <a href=' curriculum.php?id=",$row2[0],"&n=",$row2[1],"&a1=",$row2[2],"&a2=",$row2[3],"&fn=",$row2[4],"' >Ver Curriculum </a><br>";
    echo "<br>
    </div>";
  } 
}
$result2 = mysql_query("SELECT * FROM $tabla");
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) { 
  if($row2[5] == 'dentista'){
    echo "<div style='width:25%; margin:0 auto; padding:20px; float:left;'>
    <br><center><img src='usuarios/",$row2[11],"' style='float:bottom; margin-right:30px; margin-top:-5px; padding:10px; width:160px; height:160px'><br>";
    echo "<h30><br>", $row2[1]," ",$row2[2]," ", $row2[3],"</h30><br>";
                              //echo "<br><label>Fecha de Nacimiento: </label>", $row2[4];
    echo "<br><h12>", $row2[5];
    echo "<br>", $row2[6];
                              //echo "<br><label>Contacto de emergencia: </label>",$row2[8];
                              //echo "<br><label>Telefono de emergencia: </label>", $row2[7];
                              //echo "<br><label>Fecha de alta: </label>", $row2[9];
                            //  echo "<br><label>Password: </label>", $row2[10];
    $select = 'select * from curriculum where id_usuario="'.$row2[0].'";';
    $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
    $renglon = mysql_fetch_assoc($resul);
    echo "  </h12>
    <br><br>
    <a href=' curriculum.php?id=",$row2[0],"&n=",$row2[1],"&a1=",$row2[2],"&a2=",$row2[3],"&fn=",$row2[4],"' >Ver Curriculum </a><br>";
    echo "<br>
    </div>";;
  } 
}
$result2 = mysql_query("SELECT * FROM $tabla");
while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) { 
  if($row2[5] != 'dentista' && $row2[5] != 'admin'){
    echo " <div style='width:25%; margin:0 auto; padding:20px; float:left;'>
    <br><center><img src='usuarios/",$row2[11],"' style='float:bottom; margin-right:30px; margin-top:-5px; padding:10px; width:160px; height:160px'><br>";
    echo "<h30><br>", $row2[1]," ",$row2[2]," ", $row2[3],"</h30><br>";
                              //echo "<br><label>Fecha de Nacimiento: </label>", $row2[4];
    echo "<br><h12>", $row2[5];
    echo "<br>", $row2[6];
                              //echo "<br><label>Contacto de emergencia: </label>",$row2[8];
                              //echo "<br><label>Telefono de emergencia: </label>", $row2[7];
                              //echo "<br><label>Fecha de alta: </label>", $row2[9];
                            //  echo "<br><label>Password: </label>", $row2[10];
    $select = 'select * from curriculum where id_usuario="'.$row2[0].'";';
    $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
    $renglon = mysql_fetch_assoc($resul);
    echo "  </h12>
    <br><br>
    <a href=' curriculum.php?id=",$row2[0],"&n=",$row2[1],"&a1=",$row2[2],"&a2=",$row2[3],"&fn=",$row2[4],"' >Ver Curriculum </a><br>";
    echo "<br>
    </div>";
  } 
}
?>
</div></div>
<!---->
<div class="verticalspacer" ></div>
<div class="browser_width colelem" id="u1098" style="margin-top:350px"><!-- simple frame --></div>
<div class="clearfix colelem" id="pu1105" ><!-- group -->
 <div class="clip_frame grpelem" id="u1105"><!-- image -->
  <img class="block" id="u1105_img" src="images/en5.png" alt="" width="32" height="29"/>
</div>
<img class="grpelem" id="u1099-7" src="images/u1099-7.png" alt="Dr. Alejandro González Merlo
CIRUJANO DENTISTA ENDOPERIODONCISTA
" width="268" height="51"/><!-- rasterized frame -->
</div>
<div class="clearfix colelem" id="ppu1112"><!-- group -->
 <div class="clearfix grpelem" id="pu1112"><!-- column -->
  <div class="clip_frame colelem" id="u1112"><!-- image -->
   <img class="block" id="u1112_img" src="images/direccion.png" alt="" width="32" height="32"/>
 </div>
 <div class="clip_frame colelem" id="u1110"><!-- image -->
   <img class="block" id="u1110_img" src="images/phone.png" alt="" width="35" height="35"/>
 </div>
 <div class="clip_frame colelem" id="u1108"><!-- image -->
   <img class="block" id="u1108_img" src="images/email.png" alt="" width="35" height="35"/>
 </div>
</div>
<div class="clearfix grpelem" id="pu1102-6"><!-- column -->
  <img class="colelem" id="u1102-6" src="images/u1102-6.png" alt="Planta El Infiernillo No. 101 , Col. Electricistas. Morelia Michoacán. México." width="321" height="34"/><!-- rasterized frame -->
  <div class="clearfix colelem" id="pu1107-6"><!-- group -->
   <img class="grpelem" id="u1107-6" src="images/u1107-6.png" alt="CITAS
   +52 443 324 8008" width="138" height="37"/><!-- rasterized frame -->
   <img class="grpelem" id="u1100-6" src="images/u1100-6.png" alt="URGENCIAS
   044 443 114 4047" width="152" height="40"/><!-- rasterized frame -->
 </div>
 <img class="colelem" id="u1101-4" src="images/u1101-4.png" alt="contacto@endoperio.com.mx" width="200" height="17"/><!-- rasterized frame -->
</div>
<div class="grpelem" id="u1115"><!-- simple frame --></div>
<div class="clearfix grpelem" id="u1114-4"><!-- content -->
  <!--sesion-->
  <?php
  @session_start();
  if($_SESSION['u']=='')
  {
//  $usuario = $_SESSION['u'];
    ?> 
    <form action="php/procesar_login.php" method="POST" style="margin-left:50%; margin-top:0">
     <input id="nombre" name="nombre" type="text" class="campoTexto" required placeholder="e-mail">
     <input id="password" name="password" type="password" class="campoTexto" required placeholder="password">
     <input type="submit" value="Login">
   </form>
   <?php } else  
   echo '  <div  style="margin: 0 auto 0 auto; padding: 10px; text-decoration: none; height:15px; width:130px; border: red 1px solid;"> <a href="php/logout.php">
   <h12>  Salir </h12>
   </a></div> ';
   ?>
 </div>
</div>
<a class="nonblock nontext clip_frame colelem" id="u1103" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u1103_img" src="images/completo7.png" alt="" width="89" height="28"/></a>
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
 <!--img class="preload" src="images/dr1-u897-r-fr.png" alt=""/-->  
 <img class="preload" src="images/u907_states-r.png" alt=""/>
    <!--img class="preload" src="images/azamudio-u908-r-fr.png" alt=""/>
   * <img class="preload" src="images/atames-u918-r-fr.png" alt=""/>
   * <img class="preload" src="images/gurincho-u919-r-fr.png" alt=""/>
   * <img class="preload" src="images/mgarcia-u956-r-fr.png" alt=""/>
   * <img class="preload" src="images/atamesm-u957-r-fr.png" alt=""/>
   * <img class="preload" src="images/gguzman-u955-r-fr.png" alt=""/>
   * <img class="preload" src="images/cserrato-u1005-r-fr.png" alt=""/>
   * <img class="preload" src="images/amarin-u995-r-fr.png" alt=""/>
   * <img class="preload" src="images/maburto-u994-r-fr.png" alt=""/-->
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