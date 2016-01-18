<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>editar_en_almacen</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="../css/agendatabla.css"/>
  
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="../css/agregar_receta.css?4008918636" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
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
   <!-- formulario editar en almacen -->  
   <?php
   $id = $_GET['id'];
include('../php/base.php');

$sql = 'SELECT * from inventario where id_producto="'.$id.'";';
//$resul = $conn->query($sql) or die ("problema con la solicitud");
//$renglon = mysql_fetch_assoc($resul);
$result = $conn->query($sql);
$renglon = $result->fetch_assoc(); 
?>
<form action="inventario_procesar_editar.php" method="POST">
  <h3>Editar en almacen</h3> <br><hr>
  <table>
    <tr >
      <td>Nombre</td><td>No serie</td><td>Cantidad actual</td><td>Cantidad despues de surtir</td>
    </tr>
    <tr></tr>
    
    <tbody>
      <tr>
        <td><?php echo $renglon['nombre'];        ?></td>
        <td><?php echo $renglon['numero_serial']; ?></td>
        <td><?php echo $renglon['cantidad'];      
        $cant_ant = $renglon['cantidad'];     ?></td>
        <td><center />
          <?php echo '<input type="hidden" name="cantidad" value="',$cant_ant,'">'; ?>
          <input class="campoT" type="number" style="width:50px; margin-left:10px" name="nueva_cantidad" required></td>
        </tr>
      </tbody>
    </table>
    <!--label style="margin-right:70px">Nombre -</label><h10> <?php echo $renglon['nombre']; ?></h10><hr><br>
    <label style="margin-right:80px">NoSerie -</label><h10><?php echo $renglon['numero_serial']; ?></h10><hr><br>
    <!--label><?php echo $renglon['descripcion']; ?></label><br->
    <label style="margin-right:70px">Cantidad -</label> <h10><?php echo $renglon['cantidad']; ?></h10><hr><br>
    <!--<label>Es Reabastecible</label><select name="abastecer"><option value="1">Si</option><option value="0">No</option></select><br>
    <label>Cantidad Mínima que debe existir</label><input type="text" name="minima"><br>->
    <label style="float:left;">Cantidad a agregar</label>
    <input class="campoT" type="number" style="width:50px; margin-left:10px" name="nueva_cantidad"><br-->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type='submit' value='editar' style="float:left; margin-left:500px; margin-top:-1px " >
    <div id="botn3" style="margin-left:650px; width:70px; ">
     <a  href="../panel.php">Cancelar</a>
   </div>
 </form>
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