<?php
@session_start();
error_reporting(0);
if($_SESSION['rol']!='admin'){
  if($_SESSION['rol']!='almacen')
    header('location: ../panel.php');
}
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
$sucursal = $_SESSION['sucursal'];
include('../php/base.php');
//include('../php/base2.php');
//include('../php/base3.php');
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
  <title>Historia de pagos</title>
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
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
  <script>
  lightbox= function ()
  {   
    /*en el body agregamos un div con id popup_bg que nos servirá para colocar una capa bloque toda la pagina y con un background oscuro transparente*/
    $("body").append("<div id='popup_bg'></div>");
    /*le damos unos atributos y aqui uno de los mas importantes es ser posicion absoluto ,obtener el ancho, alto del navegador y zindex que le ponemos un numero alto para sobre ponerlo a todos */
    $("#popup_bg").css({
      width : $(window).width() + "px",
      height : $(window).height() + "px",
      opacity : "0.4",
      filter : "alpha(opacity=40)",
      position : "absolute",
      background : "#000",
      left : "0px",
      top : "680px",
      zIndex : "100000"
    });
    /*ahora agremamos un div contenedor del contenido y la capa donde carag todo el contenido y le creamos un boton para cerrar*/              
    $("body").append("<div id='popup'><div class='cerrar'><a href='javascript:void(0)'><img src='https://cdn1.iconfinder.com/data/icons/officeicons/PNG/24/Close.png' /></a></div><div id='popup_contenido'>luisrodriguez.pe</div></div>");
    /*si presionan cerrar hacemos que se oculte suavemente y al termino borramos los elementos que son del lightbox*/
    $("#popup div.cerrar,#popup_bg").click(function(){
      $("#popup, #popup_bg").fadeOut(1000,function(){
       $("#popup, #popup_bg").remove(); 
     })
    })
    /*centramos la capa 700 de ancho en el 50% del left pero con un margin left -350 y por que ? seria la mitad del ancho asi obtenemos un centrado perfecto*/
    $("#popup").css({
      width : "700px",
      height : "400px", 
      position : "absolute",
      left : "50%",
      top : "1250px",
      zIndex : "100001",
      marginLeft : "-350px",
      marginTop : "-200px",
      background:"#F2F2F2",
      overflow:"auto", 
      paddingRight:"20px"
    });  
    /*colocamos el boton cerrar a la derecha*/
    $("#popup div.cerrar").css({
      width : "27px",
      height : "25px", 
      position : "absolute",
      marginLeft: "677px",
      marginTop: "14px"
    });   
    
    /*la capa donde estara todo el texto o imagen*/        
    $("#popup div#popup_contenido").css({
      width : "675px",
      height : "330px", 
      marginLeft: "25px",
      marginTop: "46px",
      overflow:"auto",
      color:"#424242"
    }); 
  }
  $(document).ready(function(){
    /*por ejemplo aqui cargamos el lightbox cuando termina de cargar la pagina sin necesidad de un click*/
    /*al clickear una etiqueta a unos cargara el lightbox con el contenido que agregamos al momento de crear la capa contenido*/      
    $("a.prueba1").click(function(){
     lightbox(); 
     return false
   })
    /*pero el ejemplo de arriba funciona nada bien en un caso practico*/
    /*entonces lo mejoramos y hacemos que al clikear un link obtenemos el href y lo cargamos por ajax y lo mostramos en la capa del contenido*/
    $("a.prueba2").click(function(){
      $.get($(this).attr("href"),function(data){
        lightbox();
        $('#popup div#popup_contenido').html(data); 
      });
      return false
    })   
  })
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
    <h9> Historial pagos</h9>
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
//include("php/base2.php");
//include("php/base3.php");
  $dia_seleccionable = $_GET['dia'];
    //print "$dia_seleccionable $mes $ano";
  if($dia_seleccionable==1) $dia_seleccionable='01';
  if($dia_seleccionable==2)  $dia_seleccionable='02';
  if($dia_seleccionable==3) $dia_seleccionable='03';     
  if($dia_seleccionable==4) $dia_seleccionable='04';   
  if($dia_seleccionable==5) $dia_seleccionable='05';   
  if($dia_seleccionable==6) $dia_seleccionable='06';                     
  if($dia_seleccionable==7) $dia_seleccionable='07';   
  if($dia_seleccionable==8) $dia_seleccionable='08';   
  if($dia_seleccionable==9) $dia_seleccionable='09'; 
  if($mes2==1) $mes2='01';
  if($mes2==2) $mes2='02';
  if($mes2==3) $mes2='03';      
  if($mes2==4) $mes2='04';   
  if($mes2==5) $mes2='05';   
  if($mes2==6) $mes2='06';                    
  if($mes2==7) $mes2='07';   
  if($mes2==8) $mes2='08';   
  if($mes2==9) $mes2='09'; 
  $fechab = $ano."-".$mes2."-".$dia_seleccionable;
  if($mes2=='') $fechab = $ano;
  echo "<div style='width:730px; background: #F2F2F2; min-height:130px; margin-left:-20px; position: absolute; padding:20px; margin-bottom:40px'>
  <center>
  <label>";
  if($mes2!='') echo " Historial de  ", $dia_seleccionable," de ",$MESCOMPLETO[$mes]," del ",$ano ,"</label><br><br>";
  else          echo "Historial del año: ",$ano ," </label><br><br>";
  echo "<br> <a href='?ano=",$ano,"&S=0'> <div id='botnH' style=''> Ver historial de este año </div> </a>";  
  echo "<a href='?mes=",$mes,"&S=0'> <div id='botnH' style='width:170px'> Ver historial de este mes </div> </a>";
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
  echo "<a href='?semana_b=",$semana,"&ano=",$ano,"&S=1'> <div id='botnH' style=''> Ver hist. por semana </div> </a><br><br><br>";
  if($S == 1){
    echo "<a href='?semana_b=",$semana_anterior,"&ano=",$ano_s,"&S=1'>  <div id='botnH' style='margin-left:180px; border:0px #888 solid; width:140px; border-top-left-radius:30px; border-bottom-left-radius:30px;'>  semana anterior  </div></a>";
    echo "<a href='?semana_b=",$semana_siguiente,"&ano=",$ano_s,"&S=1'> <div id='botnH' style='border:0px #888 solid; width:140px; border-top-right-radius:30px; border-bottom-right-radius:30px;'> semana siguiente </div> </a><br><br><br>";
  }
  if($semana_b=='') $result2 = $conn->query(($sucursal==0) ? "SELECT * from pago_adeudo where fecha like '%$fechab%'" : "SELECT * from pago_adeudo where fecha like '%$fechab%' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=pago_adeudo.id_usuario)" );
  //$result2 = $conn->query("select * from pago_adeudo where fecha like '%$fechab%'");

  else              $result2 = $conn->query(($sucursal==0) ? "SELECT * from pago_adeudo " : "SELECT * from pago_adeudo and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=pago_adeudo.id_usuario)");
  //$result2 = $conn->query("select * from pago_adeudo");
  //
  echo "<table border=1 style='margin-top:100px; '>
  <tr style='color:#58ACFA'><td >No. </td><td>Sucursal </td><td>Generado por  </td> <td>Paciente    </td><td>Descripción   </td> <td>Costo       </td> <td>Pagado      </td> <td>Saldo      </td> <td>Detalles   </td> </tr>";
//while ($dato_pagos = mysql_fetch_array($result2, MYSQL_NUM)){
  while ($dato_pagos = $result2->fetch_row()) {
    if($semana_b==''){
      echo "<tr>";
      echo "<td>",$dato_pagos[0],"</td>";
      $usuario = $dato_pagos[6];
      $sql = 'SELECT nombres, apellido_paterno, apellido_materno,id_sucursal FROM usuarios WHERE id_usuario = "'.$usuario.'"';
      $result = $conn->query($sql);
      $user = $result->fetch_assoc();

      $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$user['id_sucursal']);
      $renglon_sucursal  =   $result_sucursal->fetch_assoc();
      echo "<td>".utf8_encode($renglon_sucursal['sucursal'])."</td>";

      echo "<td> ".utf8_encode($user["nombres"])." ".utf8_encode($user["apellido_paterno"])." ".utf8_encode($user["apellido_materno"])."</td>";

      $paciente = $dato_pagos[7];
      $sql = 'SELECT * FROM paciente where id_paciente="'.$paciente.'"';
      if ($result = $conn->query($sql)) 
        $pacient = $result->fetch_assoc();
        $nombre_paciente =$pacient['nombres']." ".$pacient['apellido_paterno']." ".$pacient['apellido_materno']; 
          
        echo "<td>".$nombre_paciente."</td>";
        echo "<td>", htmlentities($dato_pagos[4]),"</td>";
        echo "<td>",$dato_pagos[2],"</td>"; 
        echo " <td>", htmlentities($dato_pagos[3]),"</td>
            <td>",money_format('%(#10n',$dato_pagos[2]-$dato_pagos[3])," </td>";
        $deuda = $dato_pagos[0];
              
        echo '<td><a href="abonos.php?id_adeudo=',$deuda,'&fecha=',$fechab,'&nombre_paciente=',$nombre_paciente,'" class="prueba2">Ver >></a></td></tr>';
      }else{
        $id_deuda = $dato_pagos[0];
        $ano = date(Y);
              
    //$resul2 = $conn->query($sql, $conn) or die ("problema con la solicitud");
    //$renglon2 = mysql_fetch_assoc($resul2);  
              $sql = 'SELECT * from pagos_historia WHERE semana="'.$semana_b.'" AND id_adeudo="'.$id_deuda.'" AND y="'.$ano.'";';
    //echo $sql;
              $result = $conn->query($sql);
              while ($renglon2 = $result->fetch_assoc()){

                if($renglon2['id_historia']!= '') {
                  echo "<tr>";
                  echo "<td>",$id_deuda,"</td>";
                 
                  $usuario = $dato_pagos[6];

         //$resul = $conn->query($select) or die ("problema con la solicitud");
         //$renglon = mysql_fetch_assoc($resul);
                  $sql = 'SELECT * from usuarios where id_usuario="'.$usuario.'";';
                  $result = $conn->query($sql);
                  $renglon = $result->fetch_assoc();

                  $result_sucursal    =   mysqli_query($conn, "SELECT sucursal from sucursales WHERE id_sucursal=".$renglon['id_sucursal']);
                  $renglon_sucursal  =   $result_sucursal->fetch_assoc();
                  echo "<td>".utf8_encode($renglon_sucursal['sucursal'])."</td>";

                  echo "<td> ".$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']."</td>";
                 
                  $paciente = $dato_pagos[7];
         //$resul = $conn->query($select) or die ("problema con la solicitud");
         //$renglon = mysql_fetch_assoc($resul);
                  $sql = 'SELECT * from paciente where id_paciente="'.$paciente.'";';
                  $result = $conn->query($sql);
                  while ($renglon = $result->fetch_assoc())
                    $nombre_paciente =$renglon['nombres']." ".$renglon['apellido_paterno']." ".$renglon['apellido_materno']; 
                
                  echo "<td> ".$nombre_paciente."</td>";
                  echo "<td> ", $dato_pagos['4'],"</td>";
                  echo "<td> ", $dato_pagos['2'],"</td>";  
                
                  echo " <td>", htmlentities($dato_pagos['3']),"</td>
                  <td>",$dato_pagos['2']-$dato_pagos['3']," </td>";
                  $deuda = $dato_pagos[0];
                
                  echo '<td><a href="abonos.php?id_adeudo=',$deuda,'&semana_b=',$semana_b,'&y=',$ano_s,'&nombre_paciente=',$nombre_paciente,'" class="prueba2">Ver >></a></td></tr>';      
                }
              }  
      }
  }
          echo "</table>";
          echo "<hr>";
          ?>
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