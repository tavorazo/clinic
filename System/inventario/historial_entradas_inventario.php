<?php
	@session_start();
	if($_SESSION['rol']!='admin'){
		if($_SESSION['rol']!='almacen')
		header('location: ../panel.php');
	}
		//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
	$usuario = $_SESSION['u'];
	include('../php/base.php');
	include('../php/base2.php');
	include('../php/base3.php');
   date_default_timezone_set("Mexico/General");
   
   #variable con la hora con formato am, pm
  
   //echo que imprime la hora.
   //echo "Hola, mundo! La hora actual es : $currentTime"; 
?>

<!DOCTYPE html>
<html class="html">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>Inventario</title>
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
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="../php/logout.php"><h12> cerrar sesion</h12></a></span></p>

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
	 if($_SESSION['rol']=='admin'){
     echo '
     <a class="nonblock nontext grpelem" id="u376" href="../agenda.php"><!-- state-based BG images --><img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u377" href="../buscar-paciente.php"><!-- state-based BG ../images --><img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"><!-- state-based BG images --><img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>
     <a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"><!-- state-based BG images --><img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
	 }
     echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"><!-- state-based BG images --><img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
     if($_SESSION['rol']=='admin'){
	 echo '
	 <a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"><!-- state-based BG images --><img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';
	 }
	 ?>
    </div>
    <div class="clearfix colelem" id="pu1078-4"><!-- group -->
    <div style="width:200px; ">
		<h9> Historial de Entradas</h9>
     </div>
     <div class="clearfix grpelem" id="u1079-4"><!-- content -->
      <!--p>*Esto es un ejemplo</p-->
     </div>
    </div>
    <div class="verticalspacer"></div>
    <br><br><br>

<div style="margin-left:10%; background:#FFFDFD; padding:18px; width:98% " >
    <h3>Elije la fecha</h3>

<?php 
$mes = $_GET['mes'];
$mes2 = $_GET['mes'];
$dia2 = $_GET['dia'];
$ano = $_GET['ano'];
$tipo_semana = 1;
$tipo_mes = 1;

$doctor = $_POST['doctor'];

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
  print " <td ><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente\">Mes siguiente</a></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno\">año siguiente</a></td>";
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
           print "<td bgcolor=\"#FA5858\"><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a><br></td>";
      }else if($c < date(d) && $mes == date(m) && $ano == date(Y) ||
               $mes < date(m) && $ano == date(Y) ||
               $ano < date(Y)){
           print "<td bgcolor=\"#A9F5BC\"><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a><br></td>";
      }elseif($b == 6){
        print "<td bgcolor=#fff><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
      }elseif($b == 0){
        print "<td bgcolor=#D6E2F7>$c</td>";
      }else{
        print "<td bgcolor=\"#fff\"><a href='$PHP_SELF?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
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
    
    
    $dia_seleccionable = $_GET['dia'];
    //print "$dia_seleccionable $mes $ano";
    if($dia_seleccionable==1)
    	$dia_seleccionable='01';
    if($dia_seleccionable==2)
    	$dia_seleccionable='02';
    if($dia_seleccionable==3)
    	$dia_seleccionable='03';    	
    if($dia_seleccionable==4)
    	$dia_seleccionable='04';   
    if($dia_seleccionable==5)
    	$dia_seleccionable='05';   
    if($dia_seleccionable==6)
    	$dia_seleccionable='06';       	    	    	
     if($dia_seleccionable==7)
    	$dia_seleccionable='07';   
    if($dia_seleccionable==8)
    	$dia_seleccionable='08';   
     if($dia_seleccionable==9)
    	$dia_seleccionable='09';  
    	
    if($mes2==1)
    	$mes2='01';
    if($mes2==2)
    	$mes2='02';
    if($mes2==3)
    	$mes2='03';    	
    if($mes2==4)
    	$mes2='04';   
    if($mes2==5)
    	$mes2='05';   
    if($mes2==6)
    	$mes2='06';       	    	    	
     if($mes2==7)
    	$mes2='07';   
    if($mes2==8)
    	$mes2='08';   
     if($mes2==9)
    	$mes2='09';    	
    	    	    	
    	
    $fechab = $ano."-".$mes2."-".$dia_seleccionable;
    
    if($mes2=='')
    	$fechab = $ano;
    //echo date('l jS \of F Y h:i:s A');
    
    echo "<div style='width:730px; background: #F2F2F2; min-height:130px; margin-left:-20px; position: absolute; padding:20px; margin-bottom:40px'>
    	<center>
    	<label>";
    if($mes2!='')    
  echo " Historial de  ", $dia_seleccionable," de ",$MESCOMPLETO[$mes]," del ",$ano ,"</label><br><br>";
    else
    	echo "Historial del año: ",$ano ," </label><br><br>";
    	
    echo "<br>
    	<a href='?ano=",$ano,"'>
    	<div id='botnH' style=''>
    		Ver historial de este año
    	</div>
    	</a>";
    echo "<a href='?mes=",$mes,"'>
    	<div id='botnH' style=' '>
    		Ver historial de este mes
    	</div>
    	</a>";
    //echo $mes;
    echo "<a href='imprime_inventario.php?fecha=",$fechab,"&ano=",$ano,"&mes=",$mes,"&dia=",$dia2,"' target='_blank'>
    <div id='botnH' style=' width:160px '>
    Imprimir
    </div></a>";
echo "</div><br>";
    $result = mysql_query("SHOW COLUMNS FROM inventario_historial");
echo "<table border=1 style='margin-top:160px;'>
<tr>";
if (mysql_num_rows($result)> 0) {
   /*while ($row = mysql_fetch_assoc($result)) {
       echo "<td>",$row['Field'],"</td>";
   }*/
   echo "<td style='color:#58ACFA'>No.</td>";
   echo "<td style='color:#58ACFA'>Producto</td>";
   echo "<td style='color:#58ACFA'>Cantidad</td>";
   echo "<td style='color:#58ACFA'>Total Compra</td>";
   echo "<td style='color:#58ACFA'>Responsable de Movimiento</td>";
   echo "<td style='color:#58ACFA'>Fecha de Movimiento</td>";
}
   echo "</tr>";
          $result2 = mysql_query("SELECT * FROM inventario_historial_entradas where fecha like '%$fechab%' order by fecha");
      while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
      	echo "<tr>";


					echo "<td>",$row2[0],"</td>";
					
					$u = $row2[4];
					$p = $row2[1];
					
					$select = 'select * from inventario where id_producto="'.$p.'";';
					$resul = mysqli_query($conn,) or die ("problema con la solicitud");
					$renglon = mysql_fetch_assoc($resul);

					echo "<td>",$renglon['nombre'],"</td>";

					echo "<td>".$row2[2]."</td>";
					echo "<td>".($row2[2])*$renglon['precio_compra']."</td>";

					$select = 'select * from usuarios where id_usuario="'.$u.'";';
					
					$resul = mysqli_query($conn,) or die ("problema con la solicitud");
					$renglon = mysql_fetch_assoc($resul);

					echo "<td>",$renglon['nombres']," ",$renglon['apellido_paterno']," ",$renglon['apellido_materno'],"</td>";


					
					echo "<td>",$row2[5],"</td>";

              
				//}

      	echo "</tr></div>";
      }
    
  ?>
 <br><br>
    



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
