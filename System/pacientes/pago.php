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

  <!--meta http-equiv="Content-type" content="text/html;charset=UTF-8"/-->
  <meta name="generator" content="7.0.314.244"/>
  <title>Pagos paciente</title>
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
<!--frame de pagos paciente-->

	

		<form action="generar_pago.php" method="post">
			<label> Seleccionar Deuda: </label><br>
			
			<?php
				$deuda_total = 0;
				$result = $conn->query("SELECT * FROM pago_adeudo where id_paciente='$id_paciente'");
				echo "<table >
                <tr><th> - </th> 
                    <th> Concepto </th> 
                    <th> Fecha del adeudo </th>
                    <th> Fecha del ultimo pago</th>
                    <th> Adeudo </th>
                    <th> Saldado </th>
                <tr>";
        while ($row2 = $result->fetch_array()) {

          echo" <tr>";
                    if($row2[2] > $row2[3])
                      echo "<td><input type='radio' name='adeudo' class='check' value='",$row2['0'],"' required></th>";
                    else
                      echo "<td><p style='color:#04B431;'>Saldada</p></th>";
                  echo "
                    <td>", $row2['4']," </td>
                    <td> ",$row2[8],"</td>
                    <td> ", $row2['5'], " </td>
                    <td> ",$row2['2'],  " </td>
                    <td> ",$row2['3'],  " </td>
                </tr>";
            $a = ($row2['2']-$row2['3']);
            $total = $total + $row2['2'];
            $abonado = $abonado + $row2['3'];
            $deuda_total = $deuda_total + $a;

        }
                
        echo "<tr>
                <td id='td'></td>
                <td id='td'></td>
                <td id='td'></td>
                <td id='td1'>  Total:  </td>
                <td id='td2'>",$total,"</td> 
                <td id='td2'>",$abonado,"</td> 
              </tr>
              <tr>
                <td id='td'></td>
                <td id='td'></td>
                <td id='td'></td>
                <td id='td'></td>
                <td id='td1'> Restante:
                <td id='td2'>",$deuda_total,"</td>
              <tr>";
          echo "</table>";      
			?>
			<label style="float:left; margin-right:30px">Cantidad a abonar:</label>
			<input type="number" min="0"  name="pago" class="campoT" required/><br>
		    <label>Tipo de pago</label><br>
			<?php
				$result = $conn->query("SELECT * FROM pagos_tipo");
				
          echo "<table style=''>
                  <tr>";
				
        $contador = 0;
        while ($row2 = $result->fetch_array()) {
          echo "<td style='width:80px'>
                  <input type='radio' name='pagos_tipo'  class='check' value='",$row2['0'],"' style='float:left; margin-left:30px'>
                  <h2>",$row2['1'],"
                </td>";
          $contador++;
          /*if($contador==3){
            $contador = 0;
            echo "</tr><tr>";
          }*/
        }
          echo "</tr></table>"
			?>

		    <br><label>Detalles del pago</label><br>
		    <textarea name="detalles" style="width:100%; height:50px;  padding:10px; margin-top:5px"></textarea><br>
		    <input type="hidden" value="<?php echo $id_paciente;?>" name="id_paciente">
		  
		    <input type="submit" value="Generar pago">

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
