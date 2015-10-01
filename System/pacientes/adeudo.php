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
  <title>Adeudos paciente</title>
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
  <script type="text/javascript">
  function optionCheck(){
    var option = document.getElementById("options").value;
    if(option == "otro"){
      document.getElementById("o").style.visibility = "visible";
    }
    
  }
  </script>
</head>
<body>
  <?php
  include("../php/base.php");
  
  $id_paciente = $_GET['id_paciente'];
  $concepto = $_GET['concepto1'];
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
<!--frame de adeudos paciente-->
<form action="" method="get" >
  <table style='margin-top:300px; width:140% ' >
  <tr>
    <th> Concepto </th>
    <th> Seleccionar precio </th>
    <th></th>
  </tr><tr>
  <td>
    <?php
    include("../php/base.php");
    $varibale_chingona = 0;
    function id($id){
      return $id;
    }
    $result =$conn->query("select * from tratamiento_dental");
    echo "<center><select name='concepto1' class='campoT'>";
    while ($row2 = $result->fetch_array()){
      echo "<option value='",$row2[0],"'>",$row2[1],"</option>";
    }
    echo "</select></center>";
    echo "<input type='hidden' name='id_paciente' value='".$id_paciente."'>";
    ?>
    <input type="submit" value="Revisar precio">
  </form></td><td>
  <form action="generar_adeudo.php" method="post" >
    <center>
      <?php
      if($concepto!=''){
        $select = 'select * from tratamiento_dental where id_tratamiento="'.$concepto.'";';
        $resul = $conn->query($select) or die ("problema con la solicitud");
        $renglon = $resul->fetch_assoc();
        echo '<select id="options"  onchange="optionCheck()" name="precio" class="campoT"  >';
        echo '  <option value="p1">Precio 1 - '.$renglon['precio_1'].'</option>';
        echo '    <option value="p2">Precio 2 - '.$renglon['precio_2'].'</option>';
        echo '    <option value="p3">Precio 3 - '.$renglon['precio_3'].'</option>';
        echo '    <option value="p4">Precio 4 - '.$renglon['precio_4'].'</option>';
        echo '    <option value="p5">Precio 5 - '.$renglon['precio_5'].'</option>';
        //echo '    <option value="otro">Otro</option>';
        echo '</select>';
        echo '<input type="hidden" name="concepto" value="'.$concepto.' ";';
        echo '<div id="o" style="visibility:hidden" >';
        //echo '  <input type="number" name="precio2" value="otro" class="campoT" >';
        echo '</div>';
        echo '</td><td>';
        echo '<input type="hidden" value="'.$id_paciente.'" name="id_paciente">';
        echo '<input type="submit" value="Generar">';
      }
      ?>
    </td></tr></table>
  </form>
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
