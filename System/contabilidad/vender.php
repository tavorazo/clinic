<?php
@session_start();
if($_SESSION['rol']!='admin'){
  if($_SESSION['rol']!='almacen')
    if($_SESSION['rol']!='secretaria')
      header('location: ../panel.php');
  }
    //echo'<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">';
  $usuario = $_SESSION['u'];
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
    <title>Ventas</title>
    <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/site_global.css?417434784"/>
    <link rel="stylesheet" type="text/css" href="../css/master_panel-master.css?3855693814"/>
    <link rel="stylesheet" type="text/css" href="../css/agenda.css?272506617" id="pagesheet"/>
    <link rel="stylesheet" type="text/css" href="../css/texto.css" />
    <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
    <link rel="stylesheet" type="text/css" href="../css/2.css"/>
    <!-- Other scripts -->
    <script type="text/javascript">
    document.documentElement.className += ' js';
    </script>
    <script type="text/javascript">
    function optionCheck(){
      var option = document.getElementById("options").value;
      if(option == "1"){
        document.getElementById("si_cliente").style.visibility = "visible";
        document.getElementById("b_cliente").style.visibility = "visible";
        document.getElementById("no_cliente").style.visibility = "hidden";
      }
      if(option == "0"){
        document.getElementById("no_cliente").style.visibility = "visible";
        document.getElementById("b_cliente").style.visibility = "hidden";
        document.getElementById("si_cliente").style.visibility = "hidden";
      }
    }
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
   if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
    echo '<a class="nonblock nontext grpelem" id="u376" href="../agenda.php"> <img id="u376_states" alt="Registro de consultas" src="../images/blank.gif"/></a>';
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista' || $_SESSION['rol']=='dentista')
    echo '<a class="nonblock nontext  grpelem" id="u377" href="../buscar-paciente.php"> <img id="u377_states" alt="Buscar paciente" src="../images/blank.gif"/></a>';
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista')
    echo '<a class="nonblock nontext grpelem" id="u378" href="../add-paciente.php"> <img id="u378_states" alt="Agregar pacientes" src="../images/blank.gif"/></a>';
  if($_SESSION['rol']=='admin')
    echo '<a class="nonblock nontext grpelem" id="u480" href="../add-usuario.php"> <img id="u480_states" alt="Agregar usuarios" src="../images/blank.gif"/></a>';
  if($_SESSION['rol']=='admin' || $_SESSION['rol']=='almacen')
    echo '<a class="nonblock nontext grpelem" id="u550" href="../almacen.php"> <img id="u550_states" alt="Almacen" src="../images/blank.gif"/></a>';
  if($_SESSION['rol']=='admin')
    echo '<a class="nonblock nontext grpelem" id="u552" href="../contabilidad.php"> <img id="u552_states" alt="Contabilidad" src="../images/blank.gif"/></a>';
  ?>
</div>
<div class="clearfix colelem" id="pu1078-4"><!-- group -->
  <div style="width:200px; ">
    <h9> Ventas</h9>
  </div>
  <div class="clearfix grpelem" id="u1079-4"><!-- content -->
    <!--p>*Esto es un ejemplo</p-->
  </div>
</div>
<!--frame de vender (contabilidad)-->
<form action="generar_venta.php" method="post" style="margin:200px 0px;">
  <table style="width:900px;">
    <tr>
      <th>Concepto</th>
      <th>Cantidad</th>
      <th>Cliente</th>
      <th></th>
    </tr><tr>
    <td>
      <?php
      include("../php/base.php");
      //include("../php/base2.php");
      //include("../php/base3.php");
      //$result2 = $conn->query("SELECT * from inventario where venta='1'");
      $result2  = $conn->query("SELECT * from inventario where venta='1'");
      echo "<center><select name='producto' class='campoT' style='width:150px; margin:auto auto' required>";
      setlocale(LC_MONETARY, 'en_US');
      //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
      echo "<option value=''></option>";
      while ($row2 = $result2->fetch_row()){
        echo "<option value='",$row2[0],"'>",$row2[1]," ",$row2[3],". Precio : " ,money_format('%(#10n',$row2[10]),"</option>";
      }
      echo "</select></center>";
      ?>
    </td><td>
    <center>
      <input type="number" name="cantidad" min="0" class="campoT"  style="width:90px; margin:auto auto" required>
    </center>
  </td><td>
  <br>
  <select name="tipo" class="campoT" required style="width:190px; margin:auto auto; " id="options"  onchange="optionCheck()">
    <option value=""></option>
    <option value="1">Si es paciente</option>
    <option value="0">No es paciente</option>
  </select>
            <!--//si NO es cliente, id= no:cliente, name= no_cliente
                //si SI es cliente id_ si_cliente, name= id_paciente value= $id_paciente -->
            
            <br>
            <input class="campoT" type="text" name="no_cliente" id="no_cliente" style="visibility:hidden; margin:auto auto;" placeholder='Escribe un nombre'>
            <?php
              echo '<input class="campoT" type="number" name="id_paciente2"  id="b_cliente" style="visibility:hidden; margin:auto auto;" placeholder="Escribe el id"><br>';
              //$result2 = $conn->query("SELECT id_paciente, nombres, apellido_paterno, apellido_materno from paciente");
              $result2  = $conn->query("SELECT id_paciente, nombres, apellido_paterno, apellido_materno from paciente");
              echo "<center><select name='id_paciente' class='campoT' style='visibility:hidden; margin:auto auto' id='si_cliente'>";
              echo "<option></option>";
              //while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)){
              while ($row2 = $result2->fetch_row()){
                echo "<option value='",$row2[0],"'>" ,$row2[0],"-",$row2[1]," ",$row2[2],"</option>";
              }
              echo "</select></center>";
            ?>
            <br>
            
            <select name="id_tipo">
              <option value="1">Efectivo</option>
              <option value="2">Cheque</option>
              <option value="3">Tarjeta</option>
              <option value="4">Transferencia</option>
            </select><br><br><br><br>
            <textarea name="descripcion" required style="width:90%; background:#fafafa; height:100px; margin:auto" placeholder="Descripci&oacute;n de pago"></textarea><br><br>
          </td><td>
          <input type="submit" value="Generar">
        </td>
      </tr>
    </table>
  </form>
  <!--  ..............   -->
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