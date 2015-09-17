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
  print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno&doctor=".$doctor."\">año anterior</a></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior&doctor=".$doctor."\">Mes anterior</a></td>";
  print " <td  colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente&doctor=".$doctor."\">Mes siguiente</a></td>";
  print " <td ><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno&doctor=".$doctor."\">año siguiente</a></td>";
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
           print "<td bgcolor=\"#FA5858\"><a href='seleccionar_hora.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&doctor=$doctor'>$c</a><br></td>";
      }else if($c < date(d) && $mes == date(m) && $ano == date(Y) ||
               $mes < date(m) && $ano == date(Y) ||
               $ano < date(Y)){
           print "<td bgcolor=\"#F2F2F2\">$c<br></td>";
      }elseif($b == 6){
        print "<td bgcolor=#fff><a href='seleccionar_hora.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&doctor=$doctor'>$c</a></td>";
      }elseif($b == 0){
        print "<td bgcolor=#D6E2F7>$c</td>";
      }else{
        print "<td bgcolor=\"#fff\"><a href='seleccionar_hora.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]&doctor=$doctor'>$c</a></td>";
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

 <?php

$mes = $_GET['mes'];
$ano = $_GET['ano'];
$mes2 = $_GET['mes'];
$dia2 = $_GET['dia'];

$tipo_semana = 1;
$tipo_mes = 1;

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


print "<table float>";
print " <tr id='t'>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$mes&ano=$AnoAnteriorAno\">ano anterior</a></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$MesAnterior&ano=$AnoAnterior\">Mes anterior</a></td>";
print " <td width=\"1%\" colspan=\"1\" align=\"center\" nowrap><b>".$ARRMES[$mes]." - $ano</b></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$MesSiguiente&ano=$AnoSiguiente\">Mes siguiente</a></td>";
print " <td width=\"1%\"><a href=\"$PHP_SELF?mes=$mes&ano=$AnoSiguienteAno\">ano siguiente</a></td>";
print " </tr>";
print " </table>";

//print " </td>";
//print "</tr>";
//print "<tr>";

print "<table style='border:none'>";

foreach($ARRDIASSEMANA AS $key){
  print "<th >$key</th>";
}
print "</tr>";

$contador_dia=0;
for($a=1;$a <= $TotalDeCeldas;$a++){ 
  if(!$b) $b = 0;
  if($b == 7) $b = 0;
  if($b == 0) print '<tr>';
  if(!$c) $c = 1;
  if($a > $EmpiezaMesCalOffset AND $c <= $TotalDiasMes){
    if($c == date(d) && $mes == date(m) && $ano == date(Y)){
      print "<td bgcolor=\"#ffcc99\"><a href='nomina.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a><br></td>";
    }elseif($b == 6){
      print "<td bgcolor=#fff><a href='nomina.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
    }elseif($b == 0){
      print "<td bgcolor=#7f7f7f>$c</td>";
    }else{
      print "<td bgcolor=\"#fff\"><a href='nomina.php?ano=$ano&mes=$mes&dia=$c&n_dia=$SEMANACOMPLETA[$contador_dia]'>$c</a></td>";
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

    include("php/base.php");
    include("php/base2.php");
    include("php/base3.php");
    
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

 echo "<div style='width:730px; background: #F2F2F2; min-height:130px; margin-left:-20px; position: absolute; padding:20px; margin-bottom:40px'>
        <center>
        <label>";
    if($mes2!='')    
  echo " Historial de  ", $dia_seleccionable," de ",$MESCOMPLETO[$mes]," del ",$ano ,"</label><br><br>";
    else
      echo "Historial del año: ",$ano ,"</label>";
      
    echo "<br>
      <a href='?ano=",$ano,"&S=0'>
        <div id='botnH' style=''>
        Ver historial de este año
        </div>
      </a>";
    echo "<a href='?mes=",$mes,"&S=0'>
        <div id='botnH' style='width:170px'>
        Ver historial de este mes
        </div>
        </a>";
    

    $semana = date(W);
    $ano_s = $ano;

    $S = $_GET['S'];
    $semana_b = $_GET['semana_b'];
        $semana_anterior = $semana_b-1;
        $semana_siguiente = $semana_b+1;

    if($semana_anterior=='-1'){
        $semana_anterior = 51;
        $ano_s = $ano-1;
    }
    if($semana_siguiente=='51'){
        $semana_siguiente = 0;
        $ano_s = $ano+1;
    }

    echo "<a href='?semana_b=",$semana,"&ano=",$ano,"&S=1'>
        <div id='botnH' style=''>
        Ver hist. por Semana 
        </div>

      </a><br><br><br><br><br><br>";
if($S == 1){

    echo "<a href='?semana_b=",$semana_anterior,"&ano=",$ano_s,"&S=1'>
        <div id='botnH' style='margin-left:180px; border:0px #888 solid; width:140px; border-top-left-radius:30px; border-bottom-left-radius:30px;'>
    
        Semana anterior
        </div>
      </a>";

    echo "<a href='?semana_b=",$semana_siguiente,"&ano=",$ano_s,"&S=1'>
        <div id='botnH' style='border:0px #888 solid; width:140px; border-top-right-radius:30px; border-bottom-right-radius:30px;'>
        Semana siguiente
        </div>
      </a><br><br><br>";
}

    //echo $fechab;
    if($semana_b=='')
     $result2 = mysql_query("select * from nomina_historial where fecha like '%$fechab%'");
    else
        $result2 = mysql_query("select * from nomina_historial where semana='$semana_b' and y='$ano_s'");
    

    echo "<table border=1 style='margin-top:100px; '>
    <tr>
          <td style='color:#58ACFA'>No.         </td>
          <td style='color:#58ACFA'>Usuario     </td>
          <td style='color:#58ACFA'>Sueldo      </td>
          <td style='color:#58ACFA'>Vacaciones  </td>
          <td style='color:#58ACFA'>Aguinaldo   </td>
          <td style='color:#58ACFA'>Total       </td>
          <td style='color:#58ACFA'>Fecha       </td>
          <td style='color:#58ACFA'>Aprobada    </td>

    </tr>";
    $total_semanal = 0;
  while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
      echo "<tr>";
            echo "<td>",$row2[0],"</td>";
        
        $usuario = $row2[1];
        $select = 'select * from usuarios where id_usuario="'.$usuario.'";';
        $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
        $renglon = mysql_fetch_assoc($resul);
        //vendido por
        echo "<td>".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
                echo "<td>".money_format('%(#10n',$row2[2])."</td>";//sueldo
                echo "<td>".money_format('%(#10n',$row2[3])."</td>";//vacaciones
                echo "<td>".money_format('%(#10n',$row2[4])."</td>";//aginaldo
                echo "<td>".money_format('%(#10n',$row2[5])."</td>"; //total
                $total_semanal = $total_semanal + $row2[5];
                echo "<td>".$row2[6]."</td>";
                echo "<td>";
                  if($row2[7]=='0')
                      echo "No";
                  else
                      echo "Si";
                echo "</td>"; 
          
      echo "</tr>";   
    }
echo "</table>";

    if($_SESSION['u']=='admin' && $S=='1'){
      $a_y = date(Y);
      echo "<label>Total: ".$total_semanal."</label>";
      echo "<form action='../php/aprobar_nomina.php' method='POST'>";
        echo "<input type='hidden' name='semana' value='".$semana_b."'>";
        echo "<input type='hidden' name='y' value='".$a_y."'>";
        echo "<input type='submit' value='Aprobar'>";
      echo "</form>";
    }

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