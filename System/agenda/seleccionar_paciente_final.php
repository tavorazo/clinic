<?php
	@session_start();
	if($_SESSION['u']=='')
		header('location: ../index.php');
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
  
  ?>
<!DOCTYPE html>
<html class="html">
 <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  
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
       <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="../images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesi&oacute;n</h12></a></span></p>
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
     </div>
    </div>
    <div class="verticalspacer"></div>
    <br><br><br>

<?php
@session_start();

  $dia = $_POST['dia'];
  $mes_n = $_POST['mes'];
  $ano = $_POST['ano'];
  $hora = $_POST['hora'];
  $minuto = $_POST['minuto'];
  $doctor = $_POST['doctor'];

/*  $link = mysql_connect('localhost', 'root', '')
      or die('No se pudo conectar: ' . mysql_error());
  mysql_select_db('Endoperio') or die('No se pudo seleccionar la base de datos');*/
  include('../php/base.php');
	/*include('../php/base3.php');
	include('../php/base2.php');*/


  $a = $_POST['n_registro'];
  $e = $_POST['nombre'];
  $b = $_POST['a_pat'];
  $c = $_POST['a_mat'];
  $d = $_POST['telefono'];

  $vacio = 0;
  if($a=='' and $b=='' and $c=='' and $d=='' and $e=='')
  $vacio = 1;
  if($a=='' and $b=='' and $c=='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%';");
  if($a=='' and $b=='' and $c=='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where telefono like '%$d%' or celular like '%$d%'");
  if($a=='' and $b=='' and $c=='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%';");
  if($a=='' and $b=='' and $c!='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_materno like '%$c%'");
  if($a=='' and $b=='' and $c!='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%';");
  if($a=='' and $b=='' and $c!='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");
  if($a=='' and $b=='' and $c!='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");
  if($a=='' and $b!='' and $c=='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_paterno like '%$b%';");
  if($a=='' and $b!='' and $c=='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%';");
  if($a=='' and $b!='' and $c=='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%';");
  if($a=='' and $b!='' and $c=='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%';");
  if($a=='' and $b!='' and $c!='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_paterno like '%$b%' or apellido_materno like '%$c%';");
  if($a=='' and $b!='' and $c!='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%';");
  if($a=='' and $b!='' and $c!='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");
  if($a=='' and $b!='' and $c!='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%';");

  if($a!='' and $b=='' and $c=='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c=='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c=='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c=='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c!='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_materno like '%$c%' or id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c!='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%' or id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c!='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b=='' and $c!='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c=='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c=='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c=='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c=='' and $d!='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c!='' and $d=='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_paterno like '%$b%' or apellido_materno like '%$c%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c!='' and $d=='' and $e!='')
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c!='' and $d!='' and $e=='')
  $result = $conn->query("select * from paciente where apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");
  if($a!='' and $b!='' and $c!='' and $d!='' and $e!='')    
  $result = $conn->query("select * from paciente where nombres like '%$e%' or apellido_paterno like '%$b%' or apellido_materno like '%$c%' or telefono like '%$d%' or celular like '%$d%' or id_paciente like '%$a%';");

  echo '<form action="duracion.php" method="POST" >
              <input type="hidden" value="',$dia,'" name="dia">
              <input type="hidden" value="',$n_dia,'" name="n_dia">
              <input type="hidden" value="',$mes_n,'" name="mes">
              <input type="hidden" value="',$ano,'" name="ano">
              <input type="hidden" value="',$hora,'" name="hora">
              <input type="hidden" value="',$minuto,'" name="minuto">
              <input type="hidden" value="',$doctor,'" name="doctor">
              <input type="submit" value="< Buscar otro paciente" 
                    style="width:200px; border-right:gray 1px solid; background:none; float:left;  color: gray">
            </form>';
  echo'<h3 style="margin-top:25px; margin-left:10px">Resultados para: ',$a,' ',$e,' ',$b,' ',$c,' ',$d,'</h3>
  <br><br>';

  if($vacio!=1){
      $a = 0;
      while ($row2 = $result->fetch_row()) {
          $a = 1;
echo ' <br><br><fieldset><legend style="width:90%; background:#585A5A; padding:6px; padding-left:24px;">
              <h10 style="color:#F9FAE9">Datos Personales</legend></h10>';

      echo "<div style='width:90%; background:#F9FAE9; padding:15px;  '>
          <div  style='width:25%; height:220px; float:left; '>";
      echo "<br><br>";
        if($row2[21] == "")
      echo "<img src='../pacientes/images_pacientes/predeterminado.png' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;'> </div>";
        else
      echo "<img src='../pacientes/images_pacientes/",$row2[21],"' width='130px' height='130px' style='border-radius:50%;  border: 1px solid #D8D8D8;'> </div>";

      echo "<div  style='width:50%; height:220px; float:left; margin-left:-5%; ' ><br><br><br>";
      echo "<label style='width:200px; float:left; margin-left:15px; '>Numero de ficha:</label> ", $row2[0], "<br>";
      echo "<label style='width:200px; float:left; margin-left:15px; '>Nombre: </label>", $row2[1]," ", $row2[2]," ",$row2[3],"<br>";
      echo "<label style='width:200px; float:left; margin-left:15px; '>Fecha de nacimiento: </label>", $row2[4];
      echo "<br><label style='width:200px; float:left; margin-left:15px;'>Sexo: </label>", $row2[23];
      echo "<br><label style='width:200px; float:left; margin-left:15px;'>Referencia: </label>", $row2[16];
      echo "</div>
            <div  style='width:25%; height:220px; floar:right; margin-left:70%'> ";
      echo "<br><br><br><br><br>
            <div id='botn'>
            <a href='duracion.php?dia=",$dia,"&mes=",$mes_n,"&ano=",$ano,"&hora=",$hora,"&minuto=",$minuto,"&doctor=",$doctor,"&paciente=",$row2[0],"'>Generar</a>
            </div><br>";

      echo "</div></div></fieldset>";
      }
      
    if($a==0)
        echo "<br><br>no hay resultados";
    }else
      print "Campos Vacios";
?>


    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="../images/completo7.png" alt="Octavio Razo" /></a>
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