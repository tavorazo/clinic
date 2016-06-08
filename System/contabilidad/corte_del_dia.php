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
    <h9> Corte del día</h9>
    <br><br>
    <h1>Ingresos</h1>
  </div>
  <div style="width: 500px;">
    <?php

 if($sucursal==0)
  echo "<br><br><p>Sucursal: <u>Todas</u></p>";
 else{
  $result2=$conn->query("SELECT sucursal from sucursales where id_sucursal = '$sucursal' ");
  if(!$result2)
    die('Error de consulta 2: '.mysqli_error($conn));
  $nombre_suc = $result2->fetch_assoc();
  echo "<br><br><p>Sucursal: <u>".$nombre_suc['sucursal']."</u></p>";

 }

    ?>
    <table style='margin-top:100px; min-width:99%; border:0; width:100%;'>
    <th>Tipo</th><th style="width: 300px;">Cantidad total:</th>

    <tr style='background:#F5F6CE;'><td>Pago de pacientes en efectivo</td>
    <!-- PAGOS DE PACIENTES -->

    <?php 
    $total_ingresos=0;

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='1' " : "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='1' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=pagos_historia.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
     </tr>

     <tr style='background:#F5F6CE;'><td>Pago de pacientes con cheque</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='2' " : "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='2' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=pagos_historia.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago de pacientes con tarjeta</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='3' " : "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='3' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=pagos_historia.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago de pacientes por tranferencia</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='4' " : "SELECT * FROM pagos_historia WHERE DATE(fecha) = CURDATE() AND id_tipo='4' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=pagos_historia.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <!-- PRODUCTOS -->

       <tr style='background:#F5F6CE;'><td>Pago Productos Efectivo</td>
    <?php 

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='1' " : "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='1' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_compras.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['6'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
     </tr>


    <tr style='background:#F5F6CE;'><td>Pago Productos Cheque</td>
    <?php 

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='2' " : "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='2' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_compras.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['6'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
     </tr>


    <tr style='background:#F5F6CE;'><td>Pago Productos Tarjeta</td>
    <?php 

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='3' " : "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='3' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_compras.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['6'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
     </tr>

     <tr style='background:#F5F6CE;'><td>Pago Productos Transferencia</td>
    <?php 

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='4' " : "SELECT * FROM historial_compras WHERE DATE(fecha) = CURDATE() AND id_tipo='4' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_compras.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['6'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
     </tr>

     <!-- DIPLOMADO -->

     <tr style='background:#F5F6CE;'><td>Pago Diplomado Efectivo</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='1' " : "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='1' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_diplomados.id_usuario)");
    if(!$result_pagos)
      die('<td>: '.mysqli_error($conn).'</td>');
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago Diplomado Cheque</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='2' " : "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='2' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_diplomados.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago Diplomado Tarjeta</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='3' " : "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='3' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_diplomados.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago Diplomado Transferencia</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='4' " : "SELECT * FROM historial_diplomados WHERE DATE(fecha) = CURDATE() AND tipo_pago='4' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_diplomados.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <!-- INSTRUMENTAL -->

      <tr style='background:#F5F6CE;'><td>Pago Instrumental Efectivo</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='1' " : "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='1' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_instrumental.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago Instrumental Cheque</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='2' " : "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='2' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_instrumental.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago Instrumental Tarjeta</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='3' " : "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='3' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_instrumental.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Pago Instrumental Transferencia</td>
      <?php 
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='4' " : "SELECT * FROM historial_instrumental WHERE DATE(fecha) = CURDATE() AND tipo_pago='4' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=historial_instrumental.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['4'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_ingresos+=$total_efectivo;
     ?>
      </tr>

     </table>
  <div style="width: 500px; text-align: right;"><hr><p>Total de ingresos: <b><?php echo money_format('%(#10n',$total_ingresos); ?></b></p></div>


  <!-- EGRESOS -->
  <br><br><br><br>
  <h1>Egresos</h1>
  <!--Proveedores-->
  <table style='margin-top:100px; min-width:99%; border:0; width:100%;'>
    <th>Tipo</th><th style="width: 300px;">Cantidad total:</th>

    <tr style='background:#F5F6CE;'><td>Proveedores</td>
  <?php
    $total_egresos=0;
    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Proveedores' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Proveedores' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Gastos administrativos-->
      <tr style='background:#F5F6CE;'><td>Gastos administrativos</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Gastos Administrativos' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Gastos Administrativos' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Egresos Laboratorio-->
      <tr style='background:#F5F6CE;'><td>Egresos Laboratorio</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Egresos Laboratorio' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Egresos Laboratorio' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <tr style='background:#F5F6CE;'><td>Gastos de Remodelacion</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Gastos de Remodelacion' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Gastos de Remodelacion' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Mantenimiento y Mano de Obra-->
      <tr style='background:#F5F6CE;'><td>Mantenimiento y Mano de Obra</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Mantenimiento y Mano de Obra' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Mantenimiento y Mano de Obra' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Personales-->
      <tr style='background:#F5F6CE;'><td>Personales</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Personales' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Personales' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Gastos Medicos-->
      <tr style='background:#F5F6CE;'><td>Inbursa</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Inbursa' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Inbursa' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Pagos de Tarjeta de Credito-->
      <tr style='background:#F5F6CE;'><td>Pagos de Tarjeta de Credito</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Pagos de Tarjeta de Credito' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Pagos de Tarjeta de Credito' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Rentas-->
      <tr style='background:#F5F6CE;'><td>Rentas</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Rentas' " : "SELECT * FROM egresos_otros WHERE DATE(fecha) = CURDATE() AND tipo='Rentas' and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=egresos_otros.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo)  ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Entrada de productos-->
      <tr style='background:#F5F6CE;'><td>Entrada de productos</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM inventario_historial_entradas WHERE DATE(fecha) = CURDATE() " : "SELECT * FROM inventario_historial_entradas WHERE DATE(fecha) = CURDATE() and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=inventario_historial_entradas.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['3'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo) ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      <!--Gastos de nómina-->
      <tr style='background:#F5F6CE;'><td>Gastos de nómina</td>
  <?php

    $result_pagos = $conn->query(($sucursal==0) ? "SELECT * FROM nomina_historial WHERE DATE(fecha) = CURDATE() " : "SELECT * FROM nomina_historial WHERE DATE(fecha) = CURDATE() and exists (select id_sucursal from usuarios where  id_sucursal='$sucursal' and id_usuario=nomina_historial.id_usuario)");
    $total_efectivo=0;
    while ($fila_pagos = $result_pagos->fetch_row()){
      $total_efectivo = $total_efectivo + $fila_pagos['5'];
    }
    echo "<td>".  money_format('%(#10n',$total_efectivo) ."</td>";

    $total_egresos+=$total_efectivo;
     ?>
      </tr>

      </table>

      <div style="width: 500px; text-align: right;"><hr><p>Total de egresos: <b><?php echo money_format('%(#10n',$total_egresos); ?></b></p></div><br><br>

      <h1>Balance del día:</h1>
      <div style="width: 500px; text-align: right;">
        <hr>
        <p>Ingresos: <?php echo money_format('%(#10n',$total_ingresos); ?></p>
        <p> - </p>
        <p>Egresos: <?php echo money_format('%(#10n',$total_egresos); ?></p><br>
        <hr> 
        <p>TOTAL: 
        <?php
          $total_dia = $total_ingresos - $total_egresos;
          if($total_dia<0) echo "<b style='color:red'> - ".money_format('%(#10n',$total_dia )."</b>";
          else echo "<b>".money_format('%(#10n',$total_dia )."</b>";
        ?>
        </p>

      </div>
  </div>
  <div class="clearfix grpelem" id="u1079-4"><!-- content -->
    <!--p>*Esto es un ejemplo</p-->
  </div>
</div>
<div class="verticalspacer"></div>

  

        
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