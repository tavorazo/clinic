<?php
@session_start();
if($_SESSION['u']=='')
  header('location: index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Compras paciente</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/2.css"/>
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?4050405232"/>
  <link rel="stylesheet" type="text/css" href="css/ficha-paciente.css?3891735787" id="pagesheet"/>
  <!-- Other scripts -->
  <script type="text/javascript">
  document.documentElement.className += ' js';
  </script>
</head>
<body>
  <?php
  include("../php/base.php");

  $id_paciente = $_GET['id_paciente'];
  ?>
  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu366"><!-- group -->
     <div class="browser_width grpelem" id="u366"><!-- group -->
      <div class="clearfix" id="u366_align_to_page">
       <div class="clip_frame grpelem" id="u513"><!-- image -->
        <img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/>
      </div>
      <div class="grpelem" id="u516"><!-- simple frame --></div>
      <div class="clearfix grpelem" id="u518-5"><!-- content -->
      </div>
    </div>
  </div>
  <a href="../panel.php">
    <img class="grpelem" id="u372" alt="servicios" src="../images/blank.gif"/><!-- state-based BG images -->
  </a>
</div>
<div class="clearfix colelem" id="pu375"><!-- group -->
 <div class="browser_width grpelem" id="u375"><!-- simple frame --><br>
  <?php
  echo' <a href="ficha-paciente.php?id=',$id_paciente,'"><p style="color:white; margin-left: 15%;  size-text:`10px"> << REGRESAR</p><!-- state-based BG images --></a>'
  ?>
</div>
</div>
<div class="clearfix colelem" id="u553-4"><!-- content -->
</div>
<!--frame de historial de compras paciente-->
<?php
include("../php/base.php");
$result = $conn->query("SELECT * from historial_compras where id_paciente = '$id_paciente'");

echo "
<table style='margin-top:200px'>";
echo "<tr>";

echo "  <th>Producto    </th>   
<th>Descripci&oacute;n    </th> 
<th>Cantidad    </th>   
<th>Precio Unitario </th>   
<th>Total     </th>   
<th>Vendido por   </th>   
<th>Fecha y Hora  </th>";

echo "</tr>";

while ($row = $result->fetch_row()){
  echo "<tr>";
  $producto = $row[3];
  $SELECT = 'SELECT * from inventario where id_producto="'.$producto.'";';
  $resul = $conn->query($select) or die ("problema con la solicitud");
  $renglon = $resul->fetch_assoc();

  echo "<td>".$renglon['nombre']."</td>";
  echo "<td>".$renglon['descripcion']."</td>";
  echo "<td>".$row[4]."</td>";
  echo "<td>".$row[5]."</td>";
  echo "<td>".$row[6]."</td>";

  $usuario = $row[2];
  $SELECT = 'SELECT * from usuarios where id_usuario="'.$usuario.'";';
  $resul = $conn->query($select) or die ("problema con la solicitud");
  $renglon = $resul->fetch_assoc();

  echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
  echo "<td>".$row[7]."</td>";
  echo "</tr>";   
}
echo "</table>";
?>
<!--  ..............   -->
</div>
<div class="verticalspacer"></div>
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="" width="62" height="20"/></a>
</div>
</div>
<div class="preload_images">
 <img class="preload" src="../images/u372-r.png" alt=""/>
 <img class="preload" src="../images/u376-r.png" alt=""/>
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
window.jQuery || document.write('\x3Cscript src="../scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script src="../scripts/museutils.js?3840766194" type="text/javascript"></script>
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