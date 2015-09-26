<?php
@session_start();
if($_SESSION['u']=='')
 header('location: ../index.php');
  //if($_SESSION['rol']!='admin')
  //    header('location: ../panel.php');
  //$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html class="html">
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="7.0.314.244"/>
  <title>IMPRIMIR. </title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>
  <link rel="stylesheet" type="text/css" href="../css/texto.css"/>
  
</head>
<body>
  <style type="text/css" media="screen">
    p{  font-size:  14px;  font-weight: lighter;}  
  </style>
  <div class="wrapper">
    <?php
    include("base.php");
    $id_receta = $_GET['id'];
    $select = 'SELECT * from recetas where id_receta="'.$id_receta.'";';
    $result = $conn->query($select);
    $renglon = $result->fetch_assoc();
    //$resul = $conn->query($select, $dbh) or die ("problema con la solicitud");
    //$renglon = mysql_fetch_assoc($resul);
    $doctor = $renglon['id_usuario'];
    $paciente = $renglon['id_paciente'];
    
    $select_medico = 'SELECT * from usuarios where id_usuario="'.$doctor.'";';
    $result = $conn->query($select_medico);
    $renglon_doc = $result->fetch_assoc();
    //$resul_doc = $conn->query($select_medico, $dbh) or die ("problema con la solicitud");
    //$renglon_doc = mysql_fetch_assoc($resul_doc);
    
    $select_paciente = 'SELECT * from paciente where id_paciente="'.$paciente.'";';
    $result = $conn->query($select);
    $renglon_paciente = $result->fetch_assoc();
    //$resul_paciente = $conn->query($select_paciente, $dbh) or die ("problema con la solicitud");
    //$renglon_paciente = mysql_fetch_assoc($resul_paciente);
    
    echo"<div style='margin-left:5%'>";
    echo "<br><br><br><br><p style='left:100px; float:left; position:absolute'> ",$renglon_paciente['nombres']," ",$renglon_paciente['apellido_paterno']," ",$renglon_paciente['apellido_materno'];
    $FECHA = $renglon['fecha'];
    $FECHA =explode(' ', $FECHA);
    echo "</p><p style='right:50px; float:right; position:absolute;'> ", $FECHA[0] ,"</p>";
    $medicament = nl2br($renglon['medicamento']);
    $observac   = nl2br($renglon['observaciones']);
    echo "  <div style='border:1px solid back; margin-top:30px;  min-height:200px; padding-left:50px'>
    <br><p>",$medicament,"</h><br><br>
    <p>",$observac,"</h3><p>";
    echo "  </div>";
?>
</body>
</html>