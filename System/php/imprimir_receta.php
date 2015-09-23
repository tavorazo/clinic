<?php
	@session_start();
		if($_SESSION['u']=='')
			header('location: ../index.php');
	//if($_SESSION['rol']!='admin')
	//		header('location: ../panel.php');
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
  p{
    font-size:  14px;
    
    font-weight: lighter;
  }  
</style>

<div class="wrapper">


<?php
      include("base.php");

          $id_receta = $_GET['id'];
          $select = 'select * from recetas where id_receta="'.$id_receta.'";';
          $resul = mysql_query($select, $dbh) or die ("problema con la solicitud");
          $renglon = mysql_fetch_assoc($resul);
          $doctor = $renglon['id_usuario'];
          $paciente = $renglon['id_paciente'];
          
          $select_medico = 'select * from usuarios where id_usuario="'.$doctor.'";';
          $resul_doc = mysql_query($select_medico, $dbh) or die ("problema con la solicitud");
          $renglon_doc = mysql_fetch_assoc($resul_doc);
          
          $select_paciente = 'select * from paciente where id_paciente="'.$paciente.'";';
          $resul_paciente = mysql_query($select_paciente, $dbh) or die ("problema con la solicitud");
          $renglon_paciente = mysql_fetch_assoc($resul_paciente);
          
          echo"<div style='margin-left:5%'>";
          /*echo '<div style="width:45%; min-height:70px;  float:left;">
                <img src="../images/endoperio-logo.png" alt="" width="224" />
              </div>
              <div style="  margin-top:-8px; margin-left:40%; position:absolute; padding:5px; text-align: center; width:52%; min-height:70px; background:#1F70C6; float:left;">
                <h14>Dr. Alejandro Gonzales Merlo</h14>
                <br><h15>Cirujano Dentista - Endoperiodoncista</h15>
                <br><h14>U N A M</h14>
                <br><h15>Cedula: 4831055 - Cedula Especialidad: 2630146</h15><br>
              </div><br><br><br><br><br><hr>
              ';*/

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
        /*  echo "  <div style='width:99%; margin-top:10px; min-height:20px; background:#D4F2F8; padding:5px; '>
                  <h16>Planta infiernillo Nº 101 Col Electrisistas Citas (443) 324 8008 Urgencias 044 443 114 4047 </h16>
                  </div>";
          echo "  <div style='width:99%; margin-top:10px; min-height:20px; background:#10BEE5; padding:5px'>
                  <h17>www.endoperio.com.mx</h17>
                  </div>";
          echo "</div>"; */

          //echo "  <br><br>R E C E T A - No [ ] - <label style='margin-left:50%'> Dr </label>", $renglon_doc['nombres']," ", $renglon_doc['apellido_paterno']," ",$renglon_doc['apellido_materno'],"";

      ?>

   </body>
</html>