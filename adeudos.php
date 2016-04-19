<?php 
include('System/php/base.php');
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d");
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>

  <title>Endoperio | Adeudos</title>
  <link rel="shortcut icon" type="x-icon" href="System/images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="System/css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="System/css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="System/css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="System/css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="System/css/agregar_receta.css?4008918636" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="System/images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
       </div>
      </div>
     </div>
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">

     <a   href="index.php" style="float:left; margin-right:10px"> << Regresar </a> <h3  style="margin-right:5px">|</h3>
    <br>
    <div style="padding:30px 30px 30px 50px">
      <h1 style="font-size:35px;">Adeudos por paciente</h1><br>
      <form method="post" action="adeudos.php" accept-charset="utf-8" style="position: relative;">
        <br>
      <p>ID. de paciente: <input type="text" name="idPaciente" id="idPaciente" class="campoT" required></p>
      <br>
      <input type="submit" value="Solicitar" id="solicitar" class="campoT">
      </form>
    </div>

<?php 

$idPaciente   = (isset($_POST['idPaciente'])?$_POST['idPaciente']:NULL);

if($idPaciente!=NULL){
  $adeudos=adeudos($idPaciente);
  jsonToTable($adeudos);
}

else {
  echo "<h3> Seleccione un paciente </h3>";
} 

  function adeudos($idPaciente){
    global $conn;
    $result=$conn->query("SELECT CONCAT(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) ".
     "AS nombre_completo, a.id_adeudo, a.adeudo, a.pagado, a.descripcion, a.fecha ".
     "FROM paciente AS p, pago_adeudo AS a WHERE a.id_paciente=p.id_paciente and a.id_paciente='$idPaciente';");
    if(!$result)
      die('Error de consulta 4: '.mysqli_error($conn));
    else {
      $rows =array();
      while ($r = $result->fetch_assoc()) {
          $rows[] = $r;
      }
    }
    
    return json_encode($rows);
  }

  function jsonToTable($json){
    $data =  json_decode($json);
    echo "<table style='width:100%;'>";
    echo "<tr style='background-color:#f2f2f2; height:40px;'>";
    echo "<th>Nombre completo</th><th>No. Adeudo</th><th>Adeudo</th><th>Pagado</th><th>Descripcion del adeudo</th><th>Fecha</th>";
    echo "</tr>";

    foreach ($data as $object) {
      echo "<tr style='height:40px;'>";
      echo "<td>".    $object->{'nombre_completo'}   ."</td>";
      echo "<td>".    $object->{'id_adeudo'}         ."</td>";
      echo "<td>".    $object->{'adeudo'}            ."</td>";
      echo "<td>".    $object->{'pagado'}            ."</td>";
      echo "<td>".    $object->{'descripcion'}       ."</td>";
      echo "<td>".    $object->{'fecha'}             ."</td>";
      echo "</tr>";
    }

    echo "</table>";
  }
  
?>

</div>
    <div class="verticalspacer"></div>
  </div>
</div>
<div class="preload_images">
 <img class="preload" src="System/images/u372-r.png" alt=""/>
 <img class="preload" src="System/images/u376-r.png" alt=""/>
 <img class="preload" src="System/images/u377_states-r.png" alt=""/>
 <img class="preload" src="System/images/u377_states-a.png" alt=""/>
 <img class="preload" src="System/images/u378_states-r.png" alt=""/>
 <img class="preload" src="System/images/u378_states-a.png" alt=""/>
 <img class="preload" src="System/images/u480_states-r.png" alt=""/>
 <img class="preload" src="System/images/u480_states-a.png" alt=""/>
 <img class="preload" src="System/images/u550_states-r.png" alt=""/>
 <img class="preload" src="System/images/u550_states-a.png" alt=""/>
 <img class="preload" src="System/images/u552_states-r.png" alt=""/>
 <img class="preload" src="System/images/u552_states-a.png" alt=""/>
</div>
<!-- JS includes -->
<script type="text/javascript">
if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script type="text/javascript">
window.jQuery || document.write('\x3Cscript src="System/scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script src="System/scripts/museutils.js?3840766194" type="text/javascript"></script>
<script src="System/scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
<script src="System/scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
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
