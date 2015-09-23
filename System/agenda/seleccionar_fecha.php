<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
date_default_timezone_set("Mexico/General");
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Agenda</title>
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
       <a class="nonblock nontext clip_frame grpelem" id="u513" href="../index.php"><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesión</h12></a></span></p>
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
 if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext MuseLinkActive grpelem" id="u376" href="../agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista')     
  echo '<a class="nonblock nontext grpelem" id="u377" href="../buscar-paciente.php"><!-- state-based BG ../images --><img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen')
  echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';
?>
</div>
<div class="clearfix colelem" id="pu1078-4"><!-- group -->
 <img class="grpelem" id="u1078-4" src="../images/u1078-4.png" alt="Agregar usuario" width="237" height="29"/><!-- rasterized frame -->
 <div class="clearfix grpelem" id="u1079-4"><!-- content -->
  <!--p>*Esto es un ejemplo</p-->
</div>
</div>
<div class="verticalspacer"></div>
<br><br><br>
<div style="margin-left:10%; background:#FFFDFD; padding:18px " >
<<<<<<< HEAD
    <a href="../agenda.php" style="float:left;margin-left:10px; color:#A4A4A4" title='Regresar'></a><h3 style="margin-left:20px">Elige la fecha</h3>

<?php 
$mes = $_GET["mes"];
$ano = $_GET["ano"];
$tipo_semana = 1;
$tipo_mes = 1;

$doctor = $_POST['doctor'];
if($doctor=='')
  $doctor = $_GET['doctor'];

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

=======
  <a href="../agenda.php" style="float:left;margin-left:10px; color:#A4A4A4" title='Regresar'><<<</a><h3 style="margin-left:20px">Elige la fecha</h3>
  <?php 
  $mes = isset($_GET['mes']) ? $_GET['mes'] : ''; 
  $ano = isset($_GET['ano']) ? $_GET['ano'] : '';
  $tipo_semana = 1;
  $tipo_mes = 1;
  $doctor = $_POST['doctor'];
  if($doctor=='')
   $doctor = $_GET['doctor'];
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
>>>>>>> 758a59467d6aa6bcb52ce011510f734e6c926a65
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
echo "<table float>
  <tr id='t'>
  <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno&doctor=".$doctor."\">año anterior</a></td>
  <td ><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior&doctor=".$doctor."\">Mes anterior</a></td>
  <td  colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>
  <td ><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente&doctor=".$doctor."\">Mes siguiente</a></td>
  <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno&doctor=".$doctor."\">año siguiente</a></td>
  </tr>
  </table>
  <table style='border:none'>";
foreach($ARRDIASSEMANA AS $key){
  echo "<th >$key</th>";
}
$contador_dia=0;
for($a=1;$a <= $TotalDeCeldas;$a++){ 
  if(!$b) $b = 0;
  if($b == 7) $b = 0;
  if($b == 0) echo '<tr>';
  if(!$c) $c = 1;
  if($a > $EmpiezaMesCalOffset AND $c <= $TotalDiasMes){
    
    if($c == date(d) && $mes == date(m) && $ano == date(Y)){
     echo "<td bgcolor=\"#FA5858\"><a href='seleccionar_hora.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&doctor=$doctor'>$c</a><br></td>";
   }else if($c < date(d) && $mes == date(m) && $ano == date(Y) ||
     $mes < date(m) && $ano == date(Y) ||
     $ano < date(Y)){
     echo "<td bgcolor=\"#F2F2F2\">$c<br></td>";
   }elseif($b == 6){
    echo "<td bgcolor=#fff><a href='seleccionar_hora.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&doctor=$doctor'>$c</a></td>";
  }elseif($b == 0){
    echo "<td bgcolor=#D6E2F7>$c</td>";
  }else{
    echo "<td bgcolor=\"#fff\"><a href='seleccionar_hora.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&doctor=$doctor'>$c</a></td>";
  }
  $c++;
}else{
  echo "<td> </td>";
}
if($b == 6) echo '</tr>';
$b++;
$contador_dia++;
if($contador_dia==7)  $contador_dia=0;
    //echo $SEMANAABREVIADA[$contador_dia];
}
echo "<tr><td align=center colspan=10></a></td></tr>";
echo "</table>";
?>
<!--div id="botn2" style="margin-top:-60px; float:left; margin-left:140px; height:14px"> <a href="../agenda.php">Regresar</a></div> <br><br-->

</div>
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="" width="62" height="19"/></a>
</div>
</div>
<div class="preload_images">
 <img class="preload" src="../images/u372-r.png" alt=""/>
 <img class="preload" src="../images/u376_states-r.png" alt=""/>
 <img class="preload" src="../images/u376_states-a.png" alt=""/>
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