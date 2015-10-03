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
  include("../php/base2.php");
  
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
<!--frame de compras paciente-->
<form action="generar_compra.php" method="post" style="margin-top:200px">
  <table>
    <tr>
      <th>Concepto</th>
      <th>Cantidad</th>
      <th></th>
    </tr><tr>
    <td><br>
      <?php
      include("../php/base.php");
      $result2 = $conn->query("select * from inventario where venta='1'");
      echo "<center><select name='producto' class='campoT'>";
      while ($row2 = $result2->fetch_array()){
        echo "<option value='",$row2[0],"'>",$row2[1]," ",$row2[3],". Precio : " ,$row2[10],"</option>";
      }
      echo "</select></center>";
      ?>
    </td><td>
    <center>
      <br><br>
      <input type="number" name="cantidad" min="0" class="campoT" />
    </center><br><br>
    <select name="id_tipo">
      <option value="1">Efectivo</option>
      <option value="2">Cheque</option>
      <option value="3">Tarjeta</option>
      <option value="4">Transferencia</option>
    </select><br><br>
    <!--label>Descripci&oacute;n de pago</label><br--><br>
    <textarea name="descripcion"  placeholder="Escribe la descripción de la compra"></textarea>
  </td><td>
  <input type="hidden" value="<?php echo $id_paciente; ?>" name="id_paciente">
  <input type="submit" value="Generar">
</td></tr>
</table>
</form>
<!--  ..............   -->
</div>
<div class="verticalspacer"></div>
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="" width="62" height="20"/></a>
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
