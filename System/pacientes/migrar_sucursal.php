<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');

include('../php/base.php');
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d");

$usuario = $_SESSION['u'];
$sucursal = $_SESSION['sucursal'];

if($_SESSION['rol']!='admin' && $_SESSION['rol']!='recepcionista' )
  header('location: ../panel.php');

$id_paciente   = $_GET['id_paciente'];
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>

  <title>Endoperio | Migrar paciente de sucursal</title>
  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  
  <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="../css/master_modif-master.css?3789319557"/>
  <link rel="stylesheet" type="text/css" href="../css/agregar_receta.css?4008918636" id="pagesheet"/>
  <style>
      tr:nth-child(even){background: #f2f2f2; }
      th{color: #A0ABAB; background-color: #585A5A;  padding: 10px;}
      td{ padding: 10px;}
  </style>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
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

     <a   href="ficha-paciente.php?id=<?php echo $id_paciente; ?>" style="float:left; margin-right:10px"> << Regresar </a> <h3  style="margin-right:5px">| Migrar paciente a sucursal </h3>
    <br>
<?php  
//$sucursal_paciente = $result->fetch_row();


$result_paciente  =   $conn->query("SELECT CONCAT(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno),s.sucursal,p.id_sucursal FROM paciente as p, sucursales as s WHERE p.id_paciente=$id_paciente AND p.id_sucursal=s.id_sucursal");
if(!$result_paciente)
  die('Error de consulta: '.mysqli_error($conn));

$paciente = $result_paciente->fetch_row();
?>
    <div style="padding:30px 30px 30px 50px">
    <p>El paciente <u><?php echo $paciente[0]; ?></u> pertenece a la sucursal <u><?php echo $paciente[1]; ?></u></p>

<?php  

$result=$conn->query("SELECT * from sucursales WHERE id_sucursal!=0");
if(!$result)
  die('Error de consulta 4: '.mysqli_error($conn));

?>
      <br><br>
      <hr>
      <p>Cambiar a sucursal: </p>
      <form method="post" action="procesar_migrar_sucursal.php" accept-charset="utf-8" style="position: relative;">
        <select name="sucursal" class="campoT">
          <?php  
            while($sucs = $result->fetch_assoc()){
              echo "<option value='".$sucs['id_sucursal']."'> ".$sucs['id_sucursal'].".- ".$sucs['sucursal']." </option> ";
            }
          ?>
        </select>
        <input type="hidden" value="<?php echo $id_paciente; ?>" name="paciente"></input>
        <input type="hidden" value="<?php echo $paciente[2]; ?>" name="sucursal_anterior"></input>
        <br><br>
        <p style="font-size:10px; color: red;">NOTA: Tenga en cuenta que el usuario ya no podrá ser visto en la sucursal actual. ¿Desea continuar?</p>
        <input type="submit" value="Migrar" class="campoT"></input>
      </form>

    </div>
</div>
    <div class="verticalspacer"></div>
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