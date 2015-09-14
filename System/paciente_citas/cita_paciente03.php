<?php
session_start();

?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Paciente:</title>
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
       <a class="nonblock nontext clip_frame grpelem" id="u1147" href="../index.php"><!-- image --><img class="block" id="u1147_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u1149"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u1150-5"><!-- content -->
       </div>
      </div>
     </div>
     <img class="grpelem" id="u1154" alt="Agregar " src="../images/blank.gif"/><!-- state-based BG images -->
    </div>
    <div class="clearfix colelem" id="pu1132-5"><!-- group -->
     <div class="clearfix grpelem" id="u1132-5"><!-- content -->
     </div>
     <div class="clearfix grpelem" id="u1134-4">
     <!-- formulario cita 3-->

	<div style="margin-left:10%; background:#FFFDFD; padding:18px " >
<?php
  $paciente = $_GET['paciente'];
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
    $tipo_semana = 1;
    $tipo_mes = 1;
       
    echo '<a href="../pacientes.php" style="float:left"><<  | </a>  <h3>  Elije la fecha</h3><br><hr>';

    $MESCOMPLETO[1] = 'Enero';
    $MESCOMPLETO[2] = 'Febrero';
    $MESCOMPLETO[3] = 'Marzo';
    $MESCOMPLETO[4] = 'Abril';
    $MESCOMPLETO[5] = 'Mayo';
    $MESCOMPLETO[6] = 'Junio';
    $MESCOMPLETO[7] = 'Julio';
    $MESCOMPLETO[8] = 'Agosto';
    $MESCOMPLETO[9] = 'Septiembre';
    $MESCOMPLETO[10] = 'Octubre';
    $MESCOMPLETO[11] = 'Noviembre';
    $MESCOMPLETO[12] = 'Diciembre';

    $MESABREVIADO[1] = 'Ene';
    $MESABREVIADO[2] = 'Feb';
    $MESABREVIADO[3] = 'Mar';
    $MESABREVIADO[4] = 'Abr';
    $MESABREVIADO[5] = 'May';
    $MESABREVIADO[6] = 'Jun';
    $MESABREVIADO[7] = 'Jul';
    $MESABREVIADO[8] = 'Ago';
    $MESABREVIADO[9] = 'Sep';
    $MESABREVIADO[10] = 'Oct';
    $MESABREVIADO[11] = 'Nov';
    $MESABREVIADO[12] = 'Dic';

    $SEMANACOMPLETA[0] = 'Domingo';
    $SEMANACOMPLETA[1] = 'Lunes';
    $SEMANACOMPLETA[2] = 'Martes';
    $SEMANACOMPLETA[3] = 'Miércoles';
    $SEMANACOMPLETA[4] = 'Jueves';
    $SEMANACOMPLETA[5] = 'Viernes';
    $SEMANACOMPLETA[6] = 'Sábado';

    $SEMANAABREVIADA[0] = 'Dom';
    $SEMANAABREVIADA[1] = 'Lun';
    $SEMANAABREVIADA[2] = 'Mar';
    $SEMANAABREVIADA[3] = 'Mie';
    $SEMANAABREVIADA[4] = 'Jue';
    $SEMANAABREVIADA[5] = 'Vie';
    $SEMANAABREVIADA[6] = 'Sáb';

    ////////////////////////////////////
    if($tipo_semana == 1){
    $ARRDIASSEMANA = $SEMANACOMPLETA;
    }elseif($tipo_semana == 0){
    $ARRDIASSEMANA = $SEMANAABREVIADA;
    }
    if($tipo_mes == 0){
    $ARRMES = $MESCOMPLETO;
    }elseif($tipo_mes == 1){
    $ARRMES = $MESABREVIADO;
    }

    if(!$dia) $dia = date(d);
    if(!$mes) $mes = date(n);
    if(!$ano) $ano = date(Y);

    $TotalDiasMes = date(t,mktime(0,0,0,$mes,$dia,$ano));
    $DiaSemanaEmpiezaMes = date(w,mktime(0,0,0,$mes,1,$ano));
    $DiaSemanaTerminaMes = date(w,mktime(0,0,0,$mes,$TotalDiasMes,$ano));
    $EmpiezaMesCalOffset = $DiaSemanaEmpiezaMes;
    $TerminaMesCalOffset = 6 - $DiaSemanaTerminaMes;
    $TotalDeCeldas = $TotalDiasMes + $DiaSemanaEmpiezaMes + $TerminaMesCalOffset;


    if($mes == 1){
    $MesAnterior = 12;
    $MesSiguiente = $mes + 1;
    $AnoAnterior = $ano - 1;
    $AnoSiguiente = $ano;
    }elseif($mes == 12){
    $MesAnterior = $mes - 1;
    $MesSiguiente = 1;
    $AnoAnterior = $ano;
    $AnoSiguiente = $ano + 1;
    }else{
    $MesAnterior = $mes - 1;
    $MesSiguiente = $mes + 1;
    $AnoAnterior = $ano;
    $AnoSiguiente = $ano;
    $AnoAnteriorAno = $ano - 1;
    $AnoSiguienteAno = $ano + 1;
    }

      print " <table float>";
      print " <tr id='t'>";
      print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno\">año anterior</a></td>";
      print " <td ><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior\">Mes anterior</a></td>";
      print " <td  colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>";
      print " <td ><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente&paciente=$paciente\">Mes siguiente</a></td>";
      print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno&paciente=$paciente\">año siguiente</a></td>";
      print " </tr>";
      print " </table>";

      print "<table style='border:none'>";
      foreach($ARRDIASSEMANA AS $key){
      print "<th >$key</th>";
      }

      $contador_dia=0;
      for($a=1;$a <= $TotalDeCeldas;$a++){ 
        if(!$b) $b = 0;
        if($b == 7) $b = 0;
        if($b == 0) print '<tr>';
        if(!$c) $c = 1;
        if($a > $EmpiezaMesCalOffset AND $c <= $TotalDiasMes){
          
          if($c == date(d) && $mes == date(m) && $ano == date(Y)){
               print "<td bgcolor=\"#FEEE7A\"><a href='cita_paciente04.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&paciente=$paciente'>$c</a><br></td>";
          }else if($c < date(d) && $mes == date(m) && $ano == date(Y) ||
                   $mes < date(m) && $ano == date(Y) ||
                   $ano < date(Y)){
               print "<td bgcolor=\"#F2F2F2\">$c<br></td>";
          }elseif($b == 6){
            print "<td bgcolor=#fff><a href='cita_paciente04.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&paciente=$paciente'>$c</a></td>";
          }elseif($b == 0){
            print "<td bgcolor=#D6E2F7>$c</td>";
          }else{
            print "<td bgcolor=\"#7AFE97\"><a href='cita_paciente04.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&paciente=$paciente'>$c</a></td>";
          }
        $c++;
        }else{
          print "<td> </td>";
        }
        if($b == 6) print '</tr>';
        $b++;
        $contador_dia++;
        if($contador_dia==7)  $contador_dia=0;
        //print $SEMANAABREVIADA[$contador_dia];
        }
        print "<tr><td align=center colspan=10></a></td></tr>";
        print "</table>";
      ?>
        <div id="botn2" style="margin-top:-70px; margin-left:auto; margin-right:auto; height:15px"> <a href="../pacientes.php">Cancelar</a></div> 
        <br><br>
     </div>


	 </div>
    </div>
    <div class="verticalspacer"></div>
   </div>

      <!--Publicidad--> 
      <div style="width:100%; min-height:50px; position:relative; " >
<?php
  include('../php/base.php');
  include('../php/base3.php');
  include('../php/base2.php');

          $select = 'select * from publicidad where lugar="2";';
          $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);

          echo "<img src='../publicidad/images/".$renglon['imagen']."' width='900px'>";

          mysql_close($conexion);
?>
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