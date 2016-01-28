<?php
@session_start();
if($_SESSION['u']=='')
  header('location: ../index.php');
date_default_timezone_set("Mexico/General");
//echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
$usuario = $_SESSION['u'];
//include('php/base3.php');
include('php/base.php');
?>
<!DOCTYPE html>
<html class="html">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="generator" content="7.0.314.244"/>
  <title>Panel</title>
  <link rel="shortcut icon" type="x-icon" href="images/icon.png" /><!--para logo en barra-->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/texto.css"/>
  <link rel="stylesheet" type="text/css" href="css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="css/site_global.css?417434784"/>
  <link rel="stylesheet" type="text/css" href="css/master_panel-master.css?3855693814"/>
  <link rel="stylesheet" type="text/css" href="css/panel.css?3775447103" id="pagesheet"/>
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
       <a class="nonblock nontext clip_frame grpelem" id="u513" ><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>
       <div class="grpelem" id="u516"><!-- simple frame --></div>
       <div class="clearfix grpelem" id="u518-5"><!-- content -->
        <p><?php echo $_SESSION['nombres'];?>&nbsp; | <span id="u518-2"> <a href="php/logout.php"><h12> cerrar sesion</h12></a> | <a href="php/lista_usuarios.php"> <h12> Cuenta </h12> </a></span></p>
      </div>
    </div>
  </div>
  <a href="panel.php">
    <img class="grpelem" id="u372" alt="servicios" src="images/blank.gif"/><!-- state-based BG images -->
  </a>
</div>
<div class="clearfix colelem" id="pu375"><!-- group -->
 <div class="browser_width grpelem" id="u375"><!-- simple frame --></div>
 <?php
 if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u376" href="agenda.php"> <img id="u376_states" alt="Registro de consultas" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista' || $_SESSION['rol']=='becario')
  echo '<a class="nonblock nontext grpelem" id="u377" href="buscar-paciente.php"> <img id="u377_states" alt="Buscar paciente" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
  echo '<a class="nonblock nontext grpelem" id="u378" href="add-paciente.php"> <img id="u378_states" alt="Agregar pacientes" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin')
  echo '<a class="nonblock nontext grpelem" id="u480" href="add-usuario.php"> <img id="u480_states" alt="Agregar usuarios" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen' || $_SESSION['rol']=='becario' || $_SESSION['rol']=='secretaria')
  echo '<a class="nonblock nontext grpelem" id="u550" href="almacen.php"> <img id="u550_states" alt="Almacen" src="images/blank.gif"/></a>';
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria')
  echo '<a class="nonblock nontext grpelem" id="u552" href="contabilidad.php"> <img id="u552_states" alt="Contabilidad" src="images/blank.gif"/></a>';
?>
</div>
<div class="clearfix colelem" id="pu1090-4"><!-- group -->
 <img class="grpelem" id="u1090-4" src="images/u1090-4.png" alt="Avisos" width="237" height="29"/><!-- rasterized frame -->
 <div class="clearfix grpelem" id="u1091-4"><!-- content -->
 </div>
</div>
<div class="colelem" style="min-height:90px">
</div>
</div>
<div class="verticalspacer"></div>
<!--div avisos-->
<?php
/*if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='almacen'){*/
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen'){
    echo '<div style="background: #FFFFFF; width:96%; min-height: 90px; margin-bottom:70px; " id="txt2">
    <img src="images/alert.png" width="20px" alt="" style="float:left; margin-right:10px">
    <p>Inventario:</p> ';
    
    $sql = "SELECT * FROM inventario where reabastesible='1'";
    if($result = $conn->query($sql)) {
     while ($row2 = $result->fetch_assoc()) {
      if($row2["cantidad_minima"] > $row2["cantidad"]){
        ?>

       <br><div style='float:left; position:relative'><?php echo $row2["nombre"]?> necesita ser abastecido. <br>
       Canditad mínima que debe exisitir en el inventario: <?php echo $row2["cantidad_minima"] ?>
       <br>Canditad de existencia en el inventario: <?php echo $row2["cantidad"] ?>
       </div>
       <div id='botn3' style='margin-left:80%; width:100px; background: #FFFFFF; border:1px solid #848484;'>
       <a href='inventario/inventario_editar.php?id=<?php echo $row2["id_producto"]?>'>Abastecer</a></div>
       <?php
     }
  } 
} 
else
  print "error en consulta inventario\n";
echo ' </div>';
}
?>

<div>
  <div style=" background: #FFFFFF; width:50%; min-height: 480px; float:left;" id="txt">
    <img src="images/avisos.png" width="20px"  style="float:left; margin-right:10px; "/>
    <p>Avisos</p><br>
    
    <?php
    $a = $_SESSION['u'];  
    echo "<h13>Generales<hr></h13>";
    //$result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='g' order by fecha desc limit 10");
    $sql = "SELECT * FROM avisos where id_persona='g' order by fecha desc limit 10";
    $result1 = $conn->query($sql);
    //while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
    while ($row1 = $result1->fetch_assoc()) {
      echo "<h3>", $row1["titulo"], "</h3><br><br><h13>";
      echo "", $row1["contenido"];
      echo "<br>", $row1["fecha"],"<br><br></h13>";
    }
    echo "<h13>Dentistas<hr></h13>";
    //$result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='d' order by fecha desc limit 10");
    $sql = "SELECT * FROM avisos where id_persona='d' order by fecha desc limit 10";
    $result1 = $conn->query($sql);
    //while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
    while ($row1 = $result1->fetch_assoc()) {
      echo "<h3>", $row1["titulo"], "</h3><br><br><h13>";
      echo "", $row1["contenido"];
      echo "<br>", $row1["fecha"],"<br><br></h13>";
    }
    echo "<h13>Administrativo<hr></h13>";
    //$result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='ad' order by fecha desc limit 10");
    //while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
    $sql = "SELECT * FROM avisos where id_persona='ad' order by fecha desc limit 10";
    $result1 = $conn->query($sql);
    while ($row1 = $result1->fetch_assoc()) {
      echo "<h3>", $row1["titulo"], "</h3><br><br><h13>";
      echo "", $row1["contenido"];
      echo "<br>", $row1["fecha"],"<br><br></h13>";
    }
    echo "<h13>Almacen<hr></h13>";
    //$result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='$a' order by fecha desc limit 10");
    $sql = "SELECT * FROM avisos where id_persona='$a' order by fecha desc limit 10";
    $result1 = $conn->query($sql);
    // while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
    while ($row1 = $result1->fetch_assoc()) {
        echo "<h3>", $row1["titulo"], "</h3><br><br><h13>";
        echo "", $row1["contenido"];
        echo "<br>", $row1["fecha"],"<br><br></h13>";
    }
    $sql = "SELECT * FROM avisos where id_persona='$usuario' order by fecha desc limit 10";
    $result = $conn->query($sql);
    //$result = mysqli_query($conn,"SELECT * FROM avisos where id_persona='$usuario' order by fecha desc limit 10");
    echo "<h13>Avisos para ", $_SESSION['nombres'],"</h13>";
    //while ($row2 = mysqli_fetch_array($result, MYSQL_NUM)) {
    while ($row2 = $result->fetch_assoc()) {
      echo "<br><h12>", $row2["titulo"], "<br><br>";
      echo "", $row2["contenido"];
      echo "<br>", $row2["fecha"],"<br><br></h12>";
    }
    ?>
  </div>
</div>
<!--div cumpleanos-->
<div id="txt2" style=" margin-right:20px;  width:42%; min-height: 200px; float:right; background: #FFFFFF;">
  <img src="images/HppyBD.png" width="20px" alt="" style="float:left; margin-right:10px">
  <p> Hoy es cumpleaños de:</p><hr> 
  <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista') {
    echo '<a href="felicitacion_personalizada.php"  alt="personalizar" style="float:right; position:relative; font-size:12px; color:#2d455f;">  . Dias especiales | </a> ' ;
    echo '<a href="enviar_felicitacion_editar.php" alt="personalizar" style="float:right; position:relative; font-size:12px; color:#2d455f;"> | Personalizar felicitación .| </a>';
  }?>
  <div> 
    <?php
    $a = date("d");
    $b = date("m");
    $c = date("Y");
    $fecha_cumplea = "-$b-$a";

    $pacientes = $conn->query("SELECT * FROM paciente WHERE fecha_nacimiento like '%$fecha_cumplea%' ORDER BY id_paciente DESC limit 10;");
    echo "<br> <h3> Pacientes </h3><br>";
    $count = 0;
    //while ($r_p = mysqli_fetch_array($pacientes, MYSQL_NUM)){
    while ($r_p = $pacientes->fetch_assoc()) {
      if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista') 
        echo "<a href='felicitacion_personalizada.php?id_paciente=",$r_p["id_paciente"],"&correo=",$r_p["correo"],"'>",$r_p["nombres"]." ".$r_p["apellido_paterno"],"</a>, ";
      else
        echo $r_p["nombres"]." ".$r_p["apellido_paterno"] .", ";
    }
    echo '<a href="cumpleaneros.php">...</a>';
    $trabajadores = $conn->query("SELECT fecha_nacimiento, nombres, apellido_paterno, apellido_materno from usuarios;");
    echo "<br><br><hr> <h3> Trabajadores </h3><br>";
    $count = 0;
    //while ($r_t = mysqli_fetch_array($trabajadores, MYSQL_NUM)){
    while ($r_t = $trabajadores->fetch_assoc()) {
      $arr = explode("-", $r_t["fecha_nacimiento"]);
      $fecha_t = "-$arr[2]-$arr[1]";
      if($fecha_cumplea == $fecha_t && $count < 5)
        echo $r_t["nombres"]." ".$r_t["apellido_paterno"]." ".$r_t["apellido_materno"].", ";
      $count++;
    }
    ?>
  </div>
  <br>
  <div id='botn5' style='position:relative; width:200px; margin-top:15px; margin-left:190px; background:none' >
    <?php 
    if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
     echo "<a href='enviar_felicitacion.php' > <img src='images/send_mail.png' alt='' width='100%'> </a>"; 
   ?>
 </div>
 <br><br>
</div>
<!--div noticias | avisos-->
<div style="margin-left:53%; margin-top:400px;   width:40%; height: 170px; float:top">
  <?php
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='dentista' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='secretaria'){
   echo "<div id='botn' style='margin-left: 100px; width:220px; background:#FA5858; margin-top:30px; color:white; position:relative'>";
   echo ' <a href="doctores.php">   ¿Citas para hoy?     </a>';
   echo " </div>";
 }
 if($_SESSION['rol']=='admin' || $_SESSION['rol']=='publicista'){
  echo "<div id='botn' style='margin-left: 100px;; width:220px; margin-top:30px; '>";
  echo '<a href="Noticias/crear_noticia.php">Generar Noticia nueva</a>';
  echo " </div>";
}
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='publicista'){
  echo " <div id='botn' style='margin-left: 100px;; width:220px; margin-top:1px; position:relative'>";
  echo '<a href="avisos/aviso.php">Aviso nuevo        </a>';
  echo " </div>";
}
?>
</div>

<?php 
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){ 
  $sql = "SELECT id_paciente, nombres, apellido_paterno, apellido_materno FROM paciente WHERE etiqueta_laboratorio = '1' ";
  $result1 = $conn->query($sql);
?>
    <div style=" background: #FFFFFF; width:96%; min-height:80px; float:left; margin-top:80px" id="txt">
        <img src="https://cdn0.iconfinder.com/data/icons/entypo/100/user3-20.png" width="20px"  style="float:left; margin-right:10px; "/>
        <p>Lista de pacientes con trabajos de laboratorio</p><br> <br>
        <form action="php/trabajos_laboratorio.php" method="GET" style="float:left; max-width:50%">
        Lista de pacientes con trabajo actualmente en laboratorio
           <select name='id_paciente' class='campoT' style='float:left; margin:15px 5px 10px 0'>
           <option></option>
        <?php 
            while ($row2 = $result1->fetch_array()){
              echo "<option value='",$row2[0],"'>",$row2[1]," ",$row2[2]," ",$row2[3],"</option>";
            }
        ?>
          </select>
          <input type="submit" name="action" value="Quitar de lista" style="font-size:14px; margin-top:12px; height:28px">
        </form>
        
        <form action="php/trabajos_laboratorio.php" method="GET" style="float:left; max-width:50%">
          Agregar ID de paciente para trabajo en laboratorio
          <input type="number" value="id_paciente" name="id_paciente" min="0" placeholder="ID paciente" class="campoT" style="float:left; margin:15px 5px 10px 0; height:20px ">
          <input type="submit" name="action" value="Agregar a lista" style="font-size:14px; margin-top:12px; height:28px">
        </form>
    </div>
<?php } ?>

<!--Acceso directo a citas de dentista-->
<?php 
if($_SESSION['rol']=='dentista' ){ 
?>
    <div style=" background: #FFFFFF; width:96%; min-height:80px; float:left; margin:20px 0" id="txt">
        <img src="https://cdn4.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/clipboard_past.png" width="20px"  style="float:left; margin-right:10px; "/>
        <p>Ver y/o cancelar  citas para hoy</p><br>
        <form action="ver_citas_doctores.php" method="GET" TARGET = "_blank">
          <input type="submit" style="font-size:14px; height:30px; width:80%; margin:2% 10%" value="Ver citas">
        </form>

    </div>
<?php } ?>


<!--Radiografias acceso directo-->
<?php 
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){ 
?>
    <div style=" background: #FFFFFF; width:96%; min-height:80px; float:left; margin:20px 0" id="txt">
        <img src="https://cdn4.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/clipboard_past.png" width="20px"  style="float:left; margin-right:10px; "/>
        <p>Agregar radiografía externa a paciente</p><br>
        <form action="agregar_radiografia.php" method="GET" TARGET = "_blank">
          <input type="number" value="id" name="id"  min="0" class="campoT" placeholder="ID paciente" style="float:left; margin:15px; height:20px ">
          <input type="submit" style="font-size:14px; height:30px">
        </form>

    </div>
<?php } ?>

<!--Control de asistencias-->
<?php 
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){ 
    $sql = "SELECT id_paciente FROM paciente WHERE inasistencia = 1";
    $sql2 = "SELECT id_paciente FROM paciente WHERE inasistencia = 2";
    $sql3 = "SELECT id_paciente FROM paciente WHERE inasistencia >= 3";
    $falta_1 = mysqli_num_rows($conn->query($sql));
    $falta_2 = mysqli_num_rows($conn->query($sql2));
    $falta_3 = mysqli_num_rows($conn->query($sql3));
    $sql4 = "SELECT id_paciente FROM pago_adeudo WHERE adeudo > pagado  ";
    $resul = $conn->query($sql);
    $row = $resul->fetch_row();
      $tmp = $row[0]; 
      $n_adeudos = 0;
    while ($row = $resul->fetch_row()) 
      if ($row[0] != $tmp) 
        $n_adeudos = $n_adeudos + 1; 
?>
    <div style=" background: #FFFFFF; width:96%; min-height:80px; float:left; margin:0px 0 60px 0" id="txt">
        <img src="https://cdn4.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/checkmark.png" width="20px"  style="float:left; margin-right:10px; "/>
        <p>Control de asistencias de pacientes</p><br><br>
        <h5 style="float:left; margin:0 10px; font-size:14px"><img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2/128/face-happy-yellow-20.png" style="margin:0 10px; "> <?php echo $falta_1; ?> pacientes faltaron 1 vez </h5>
        <h5 style="float:left; margin:0 10px; font-size:14px"><img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2/128/face-sad-blue-20.png" style="margin:0 10px; "> <?php echo $falta_2; ?> faltaron 2 veces </h5>
        <h5 style="float:left; margin:0 10px; font-size:14px"><img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2/128/face-sad-red-20.png" style="margin:0 10px; "> <?php echo $falta_3; ?> faltaron más de 3 veces </h5>
        <h5 style="float:left; margin:0 10px; font-size:14px"><img src="https://cdn1.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2/128/death2-circle-red-20.png" style="margin:0 10px; "> <?php echo $n_adeudos; ?> pacientes tienen adeudos </h5>
        <br><br><br><br> <center><a href="php/control_asistencias_pacientes.php"><label>Click aqui para ver la lista con nombres</label></a></center>  
    </div>
<?php } ?>

<?php 
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){ 

  echo ' <br><br><br>
      <div style="background: #FFFFFF; width:96%; min-height: 90px; margin:30px 0 20px 0; float:left; postition:relative; margin-top:20px" id="txt2">';
  echo '<img src="images/citas.png" width="20px" alt="" style="float:left; margin-right:10px">';
  echo '<p> Citas a confirmar en la semana: (personal)</p><hr>';

?>
<!--div confirmar citas-->
<?php
echo '<form action="" method="get">
 <label>Busca por ID</label> <input type="number" placeholder="clic aquí para escribir ID" name="buscar_paciente" style="border:1px solid #C3C5C5; width:250px; padding:4px" min="0"><br><br>
</form>
<form action="confirmar_cita.php" method="POST">';
}
 


  $contador = 0;
  $n_mes = date(m);
  $hoy = date(d);
  $consulta_anio =  date(y);
  $consulta_hora = date(h);
  $doctor = $row2["id_usuario"]; //este row no se de donde coños sale // es por esto que nunca encontrara un match para los select... :/
  

if (isset($_GET['buscar_paciente']))
   $buscar_paciente = $_GET['buscar_paciente'];
else
   $buscar_paciente = 0; 

 
$desde = $hoy - 1;
$hasta = $hoy + 5;

$semana = strftime("%V", strtotime(date("m.d.y")));

  //$result2 = mysqli_query($conn,"select * from agenda where confirmacion='0' and mes='$n_mes' and ano='$consulta_anio' and web='0' and dia>='$hoy' order by hora, fecha, minuto; ");
if($buscar_paciente==0)
  $result2 = $conn->query("SELECT * from agenda where confirmacion='0' and n_semana ='$semana' order by ano, mes, dia, hora, minuto");
else 
  $result2 = $conn->query("SELECT * from agenda where confirmacion='0'  and id_paciente='$buscar_paciente' order by hora, fecha, minuto; ");

if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){
  //while ($row3 = mysqli_fetch_array($result2, MYSQL_NUM)){  
  while ($queryCita1 = $result2->fetch_array()) {
    $d = $queryCita1["id_usuario"];
    $p = $queryCita1["id_paciente"];
    $doctor = mysqli_query($conn,"SELECT * from usuarios where id_usuario='$d'; ");
    $paciente = mysqli_query($conn,"SELECT * from paciente where id_paciente='$p';");
    //while ($row_doctor = mysqli_fetch_array($doctor, MYSQL_NUM)){
    while ($row_doctor = $doctor->fetch_assoc()) {
     $doctor_nombre = $row_doctor["nombres"];
     $doctor_apellido = $row_doctor["apellido_paterno"];
     $doctor_apellido2 = $row_doctor["apellido_materno"];
   }
   //<while ($row_paciente = mysqli_fetch_array($paciente, MYSQL_NUM)){
   while ($row_paciente = $paciente->fetch_assoc()) {
     $paciente_ficha = $row_paciente["id_paciente"];
     $paciente_nombre = $row_paciente["nombres"];
     $paciente_apellido = $row_paciente["apellido_paterno"];
     $paciente_apellido2 = $row_paciente["apellido_materno"];
     $tel = $row_paciente["telefono"];
     $cel = $row_paciente["celular"];
     $p = $row_paciente["id_paciente"];
   }
   
   echo "<div style='float:left; width:600px'> 
   Doctor: ",$doctor_nombre," ", $doctor_apellido," ", $doctor_apellido2;
   echo "<br>Paciente: ",$paciente_ficha," - ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
   echo "<BR><a href='pacientes/ficha-paciente.php?id=",$p,"'> VER FICHA";
   echo "</a>";
   echo "<br>Tel: ", $tel;
   echo "<br>Cel: ", $cel;
   echo "<br>Fecha  ",$queryCita1["dia"],"/",$queryCita1["mes"],"/", $queryCita1["ano"]," a las ", $queryCita1["hora"],":", $queryCita1["minuto"],
   "<br><br></div>
   <br>
   <div id='botn5' style='margin-left:20px; ' >
    <a href='conf_citas/confirmar.php?id=",$queryCita1["id_cita"],"'>Confirmar cita</a>
   </div>
   <div id='botn5' style='background: #FE2E2E' position: absolute'>
    <a href='conf_citas/cancelar.php?id=",$queryCita1["id_cita"],"&paciente=",$paciente_ficha,"'>Cancelar cita</a>
   </div>
   <br><br><br><br><br><hr>";
 }
}
echo '    </div>';
?>
</form>
<?php
if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){
 echo ' <div style="background: #FFFFFF; width:96%; min-height: 90px; margin-bottom:10px; float:left " id="txt2">';
 echo '<img src="images/citas.png" width="20px" alt="" style="float:left; margin-right:10px">
 <p> Citas a confirmar en la semana (WEB):</p><hr>';
}
?>
<?php
$hoy = date("d");
$result2 = mysqli_query($conn,"SELECT * from agenda where confirmacion='0' and web='1' and dia>='$hoy';");
//while ($cita = mysqli_fetch_array($result2, MYSQL_NUM)){
while ($cita = $result2->fetch_assoc()) {
  $a = $cita["id_paciente"];
  $slc = 'SELECT * from paciente where id_paciente="'.$a.'";';
  $resul = mysqli_query($conn,$slc, $dbh) or die ("problema con la solicitud");
  $renglon_paciente = mysqli_fetch_assoc($resul);
  echo "<br>Paciente: ",$renglon_paciente['nombres']," ", $renglon_paciente['apellido_paterno']," ", $$renglon_paciente['apellido_materno'];
  echo "<br>Telefono: ",$renglon_paciente['telefono'];
  echo "<br>Celular: ", $renglon_paciente['celular'];
  echo "<br>Fecha (aaaa/mm/dd): ", $cita["ano"],"/",$cita["mes"],"/",$cita["dia"]," a las ", $cita["hora"],":", $cita["minuto"];
  echo "<br>Observaci&oacute;n del paciente: ",  $cita["observacion"];
  $anio = $cita["ano"];
  $mes = $cita["mes"];
  $dia = $cita["dia"];
  $hora = $cita["hora"];
  $minuto = $cita["minuto"];
  
  /*Buscar doctores*/
  $doctores = mysqli_query($conn,"SELECT * from usuarios where rol='dentista';");
  $contador_doctores=0;
  echo '<form action="conf_citas/web/confirmar.php" method="POST" >';
  echo "<input type='hidden' name='id' value='".$cita["id_cita"]."'>";
  echo "<input type='hidden' name='doctor' value='".$cita["id_paciente"]."'>";
  echo "<select name='doctor'>";
  //while ($verificar = mysqli_fetch_array($doctores, MYSQL_NUM)){
  while ($verificar = $doctores->fetch_assoc()) {
   $doctor = $verificar["id_doctor"];
   $seccion1 = 'SELECT * from agenda where id_usuario="'.$doctor.'" and ano="'.$anio.'" and mes="'.$mes.'" and dia="'.$dia.'" and hora="'.$hora.'" and minuto="'.$minuto.'";';
   $minuto2 = $minuto + 15;
   if($minuto2=='60')
    $minuto2 = '00';
  $seccion2 = 'SELECT * from agenda where id_usuario="'.$doctor.'" and ano="'.$anio.'" and mes="'.$mes.'" and dia="'.$dia.'" and hora="'.$hora.'" and minuto="'.$minuto2.'";';
  
  $resul_s = mysqli_query($conn,$seccion1, $dbh) or die ("problema con la solicitud");
  $resultado_sec1 = $conn->query($resul_s);
  //$resultado_sec1 = mysql_fetch_assoc($resul_s);
  
  $resul_s2 = mysqli_query($conn,$seccion2, $dbh) or die ("problema con la solicitud");
  $resultado_se2 = mysql_fetch_assoc($resul_s2);
  
  //echo "<option>".$resultado_sec1['id_usuario']. $resultado_se2['id_usuario']. "</option>";
  if($resultado_sec1['id_usuario']=='' && $resultado_se2['id_usuario']==''){
    echo "<option value='",$verificar["id_usuario"],"'>",$verificar["nombres"]," ",$verificar["apellido_paterno"]," ",$verificar["apellido_materno"]," </option>";
    $contador_doctores++;
  }
}
echo "</select>";
if($contador_doctores>0){
 echo "<br><input type='submit' value='Confirmar cita' style='float:left'>";
} else
echo "<br>No hay doctores disponibles, contactar al paciente o esperar a que se cancele 1 cita que coincida en la hora<br>";
echo "<br>
<div id='botn5' style='background: #FE2E2E; margin-top:-6px; height:20px'>
<a href='conf_citas/web/cancelar.php?id=",$cita["id_cita"],"&paciente=",$a,"'>Cancelar cita</a>
</div><br><br><br>";
echo "<hr>";
echo "</form>
";
}
?>





</div>
<a class="nonblock nontext clip_frame colelem" id="u405" href="http://tavorazo.github.io"><!-- image --><img class="block" id="u405_img" src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-32.png"alt="Octavio Razo" /></a>
</div>
<div class="preload_images">
 <img class="preload" src="images/u372-r.png" alt=""/>
 <img class="preload" src="images/u376_states-r.png" alt=""/>
 <img class="preload" src="images/u376_states-a.png" alt=""/>
 <img class="preload" src="images/u377_states-r.png" alt=""/>
 <img class="preload" src="images/u377_states-a.png" alt=""/>
 <img class="preload" src="images/u378_states-r.png" alt=""/>
 <img class="preload" src="images/u378_states-a.png" alt=""/>
 <img class="preload" src="images/u480_states-r.png" alt=""/>
 <img class="preload" src="images/u480_states-a.png" alt=""/>
 <img class="preload" src="images/u550_states-r.png" alt=""/>
 <img class="preload" src="images/u550_states-a.png" alt=""/>
 <img class="preload" src="images/u552_states-r.png" alt=""/>
 <img class="preload" src="images/u552_states-a.png" alt=""/>
</div>
<!-- JS includes -->
<script type="text/javascript">
if (document.location.protocol != 'https:') document.write('\x3Cscript src="http://musecdn.businesscatalyst.com/scripts/4.0/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script type="text/javascript">
window.jQuery || document.write('\x3Cscript src="scripts/jquery-1.8.3.min.js" type="text/javascript">\x3C/script>');
</script>
<script src="scripts/museutils.js?3865766194" type="text/javascript"></script>
<script src="scripts/jquery.tobrowserwidth.js?3842421675" type="text/javascript"></script>
<script src="scripts/jquery.watch.js?4068933136" type="text/javascript"></script>
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