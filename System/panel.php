<?php

	@session_start();

	if($_SESSION['u']=='')
		header('location: ../log.php');
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

       <a class="nonblock nontext clip_frame grpelem" id="u513" href="index.php"><!-- image --><img class="block" id="u513_img" src="images/logo-endoperio-dental-center.jpg" alt="" width="134" height="38"/></a>

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

      echo '<div style="background: #FFFFFF; width:96%; min-height: 90px; margin-bottom:3%; " id="txt2">
          <img src="images/alert.png" width="20px" alt="" style="float:left; margin-right:10px">
          <p>Inventario:</p> ';


					
$sql = "SELECT * FROM inventario where reabastesible='1'";

if($result = $conn->query($sql)) {
   while ($row2 = $result->fetch_assoc()) {
					  //$result2 = mysqli_query($conn,"SELECT * FROM inventario where reabastesible='1'");
					  //while ($row2 = mysqli_fetch_array($result2, MYSQL_NUM)) {
						  if($row2["cantidad_minima"] > $row2["cantidad"]){
  							echo "<br><div style='float:left; position:relative'>", $row2["nombre"], " necesita ser abastecido. <br>";
  							echo "Canditad mínima que debe exisitir en el inventario: ", $row2["cantidad_minima"];
  							echo "<br>Canditad de existencia en el inventario: ", $row2["cantidad"];
  							echo "</div>
  								  <div id='botn3' style='margin-left:80%; width:100px; background: #FFFFFF; border:1px solid #848484;'>
  								  <a href='inventario/inventario_editar.php?id=",$row2["id"],"'>Abastecer</a></div>";
						  }
					  //}
  } //nw
} //nw

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
                $result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='g' order by fecha desc limit 10");

              while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
                echo "<h3>", $row1[1], "</h3><br><br><h13>";
                echo "", $row1[2];
                echo "<br>", $row1[4],"<br><br></h13>";
              }

                echo "<h13>Dentistas<hr></h13>";
                $result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='d' order by fecha desc limit 10");
             
              while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
                echo "<h3>", $row1[1], "</h3><br><br><h13>";
                echo "", $row1[2];
                echo "<br>", $row1[4],"<br><br></h13>";

              }

                echo "<h13>Administrativo<hr></h13>";

                $result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='ad' order by fecha desc limit 10");

              while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {

                echo "<h3>", $row1[1], "</h3><br><br><h13>";

                echo "", $row1[2];

                echo "<br>", $row1[4],"<br><br></h13>";

              }

                echo "<h13>Almacen<hr></h13>";

$sql = "SELECT * FROM avisos where id_persona='$a' order by fecha desc limit 10";

if($result = $conn->query($sql)) {
    foreach($result as $row) {
            //$result1 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='$a' order by fecha desc limit 10");
            // while ($row1 = mysqli_fetch_array($result1, MYSQL_NUM)) {
                echo "<h3>", $row1[1], "</h3><br><br><h13>";
                echo "", $row1[2];
                echo "<br>", $row1[4],"<br><br></h13>";
            //}
    }
}


                $result2 = mysqli_query($conn,"SELECT * FROM avisos where id_persona='$usuario' order by fecha desc limit 10");

                echo "<h13>Avisos para ", $_SESSION['nombres'],"</h13>";

              while ($row2 = mysqli_fetch_array($result2, MYSQL_NUM)) {

                echo "<br><h12>", $row2[1], "<br><br>";

                echo "", $row2[2];

                echo "<br>", $row2[4],"<br><br></h12>";

              }

          ?>
      </div>

  </div>
      <!--div cumplea腰os-->
      <div id="txt2" style=" margin-right:20px;  width:42%; min-height: 200px; float:right; background: #FFFFFF;">
          <img src="images/HppyBD.png" width="20px" alt="" style="float:left; margin-right:10px">
          <p> Hoy es cumpleaños de:</p><hr> 
            <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista') 
            echo '<a href="felicitacion_personalizada.php" alt="personalizar" style="float:right; position:relative; font-size:12px; color:#1295C8;"> Personalizar felicitación</a>';
            ?>
          <div> 
      <?php

          $a = date("d");
          $b = date("m");
          $c = date("Y");

          $fecha_cumplea = "-$b-$a";
          $pacientes = mysqli_query($conn,"SELECT * FROM paciente WHERE fecha_nacimiento like '%$fecha_cumplea%' ORDER BY id_paciente DESC limit 10;");
            echo "<br> <h3> Pacientes </h3><br>";
            $count = 0;
          while ($r_p = mysqli_fetch_array($pacientes, MYSQL_NUM)){
            if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista') 
              echo "<a href='felicitacion_personalizada.php?id_paciente=",$r_p[0],"&correo=",$r_p[13],"'>",$r_p[1]." ".$r_p[2],"</a>, ";
            else
              echo $r_p[1]." ".$r_p[2] .", ";
          }
              echo '<a href="cumpleaneros.php">...</a>';

          $trabajadores = mysqli_query($conn,"select fecha_nacimiento, nombres, apellido_paterno, apellido_materno from usuarios;");

            echo "<br><br><hr> <h3> Trabajadores </h3><br>";

            $count = 0;

          while ($r_t = mysqli_fetch_array($trabajadores, MYSQL_NUM)){

            $arr = explode("-", $r_t[0]);
            $fecha_t = "-$arr[2]-$arr[1]";
            if($fecha_cumplea == $fecha_t && $count < 5)
              echo $r_t[1]." ".$r_t[2]." ".$r_t[3].", ";
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

      <div style="margin-left:53%; margin-top:360px;   width:40%; height: 170px; float:top">

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

  <!--/div-->

      <!--div confirmar citas-->

            <?php

      	if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){
          echo ' <br><br><br><div style="background: #FFFFFF; width:96%; min-height: 90px; margin-bottom:70px; float:left; postition:relative; margin-top:20px" id="txt2">';
          echo '<img src="images/citas.png" width="20px" alt="" style="float:left; margin-right:10px">';
          echo '<p> Citas a confirmar en la semana: (personal)</p><hr>';
        }

          ?>
          <form action="" method="get">
          	<label>Busca por ID</label> <input type="number" placeholder="clic aquí para escribir ID" name="buscar_paciente" style="border:1px solid #C3C5C5; width:250px; padding:4px" min="0"><br><br>
          </form>
        <form action="confirmar_cita.php" method="POST">

          <?php

          $contador = 0;

            $n_mes = date("m");
            $hoy = date("d");
            $consulta_anio =  date("Y");
            $consulta_hora = date("H");
            $doctor = $row2[0];
            if (isset($_GET['buscar_paciente'])){

             $buscar_paciente = $_GET['buscar_paciente'];
             echo "nada";
            }
            else{
             $buscar_paciente = 0; 
            }
            $desde = $hoy - 1; $hasta = $hoy + 5;
            if($buscar_paciente=='')
            	//$result2 = mysqli_query($conn,"select * from agenda where confirmacion='0' and mes='$n_mes' and ano='$consulta_anio' and web='0' and dia>='$hoy' order by hora, fecha, minuto; ");
              $result2 = mysqli_query($conn,"select * from agenda where confirmacion='0' and mes='$n_mes' and ano='$consulta_anio' and web='0' and dia>'$desde' and dia<'$hasta' order by ano, mes, dia, hora, minuto");
            else 
            	$result2 = mysqli_query($conn,"select * from agenda where confirmacion='0' and mes='$n_mes' and ano='$consulta_anio' and web='0' and dia>='$hoy' and id_paciente='$buscar_paciente' order by hora, fecha, minuto; ");

			if($_SESSION['rol']=='admin' || $_SESSION['rol']=='secretaria' || $_SESSION['rol']=='recepcionista'){

				while ($row3 = mysqli_fetch_array($result2, MYSQL_NUM)){
				  $d = $row3[1];
				  $p = $row3[2];
				  $doctor = mysqli_query($conn,"select * from usuarios where id_usuario='$d'; ");
				  $paciente = mysqli_query($conn,"select * from paciente where id_paciente='$p';");

					while ($row_doctor = mysqli_fetch_array($doctor, MYSQL_NUM)){
					  $doctor_nombre = $row_doctor[1];
					  $doctor_apellido = $row_doctor[2];
					  $doctor_apellido2 = $row_doctor[3];
					}

					while ($row_paciente = mysqli_fetch_array($paciente, MYSQL_NUM)){
					  $paciente_ficha = $row_paciente[0];
					  $paciente_nombre = $row_paciente[1];
					  $paciente_apellido = $row_paciente[2];
					  $paciente_apellido2 = $row_paciente[3];
			            $tel = $row_paciente[11];
			            $cel = $row_paciente[12];
			            $p = $row_paciente[0];
					}

					  

				  echo "<div style='float:left; width:600px'> 
						  Doctor: ",$doctor_nombre," ", $doctor_apellido," ", $doctor_apellido2;

				  echo "<br>Paciente: ",$paciente_ficha," - ",$paciente_nombre," ", $paciente_apellido," ", $paciente_apellido2;
              echo "<BR><a href='pacientes/ficha-paciente.php?id=",$p,"'> VER FICHA";
              echo "</a>";
          echo "<br>Tel: ", $tel;
          echo "<br>Cel: ", $cel;
				  echo "<br>Fecha  ",$row3[5],"/",$row3[4],"/", $row3[3]," a las ", $row3[6],":", $row3[7];
				  echo "<br><br></div>
						<br>

						  <div id='botn5' style='margin-left:20px; ' >

						   <a href='conf_citas/confirmar.php?id=",$row3[0],"'>Confirmar cita</a>

						  </div>

						  <div id='botn5' style='background: #FE2E2E' position: absolute'>

						   <a href='conf_citas/cancelar.php?id=",$row3[0],"'>Cancelar cita</a>

						  </div>";

				  echo "  <br><br><br><br><br><hr>";
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

			$result2 = mysqli_query($conn,"select * from agenda where confirmacion='0' and web='1' and dia>='$hoy';");

			while ($cita = mysqli_fetch_array($result2, MYSQL_NUM)){

				$a = $cita[2];
				$select = 'select * from paciente where id_paciente="'.$a.'";';
				$resul = mysqli_query($conn,$select, $dbh) or die ("problema con la solicitud");
				$renglon_paciente = mysql_fetch_assoc($resul);

				echo "<br>Paciente: ",$renglon_paciente['nombres']," ", $renglon_paciente['apellido_paterno']," ", $$renglon_paciente['apellido_materno'];
				echo "<br>Telefono: ",$renglon_paciente['telefono'];
				echo "<br>Celular: ", $renglon_paciente['celular'];
				echo "<br>Fecha (aaaa/mm/dd): ", $cita[3],"/",$cita[4],"/",$cita[5]," a las ", $cita[6],":", $cita[7];
				echo "<br>Observaci&oacute;n del paciente: ",  $cita[8];


				$anio = $cita[3];
				$mes = $cita[4];
				$dia = $cita[5];
				$hora = $cita[6];
				$minuto = $cita[7];

				

				/*Buscar doctores*/


				$doctores = mysqli_query($conn,"select * from usuarios where rol='dentista';");
				$contador_doctores=0;
				echo '<form action="conf_citas/web/confirmar.php" method="POST" >';
				echo "<input type='hidden' name='id' value='".$cita[0]."'>";
				echo "<input type='hidden' name='doctor' value='".$cita[2]."'>";
				echo "<select name='doctor'>";

				while ($verificar = mysqli_fetch_array($doctores, MYSQL_NUM)){

					$doctor = $verificar[0];

					$seccion1 = 'select * from agenda where id_usuario="'.$doctor.'" and ano="'.$anio.'" and mes="'.$mes.'" and dia="'.$dia.'" and hora="'.$hora.'" and minuto="'.$minuto.'";';

					$minuto2 = $minuto + 15;

					if($minuto2=='60')

						$minuto2 = '00';

					$seccion2 = 'select * from agenda where id_usuario="'.$doctor.'" and ano="'.$anio.'" and mes="'.$mes.'" and dia="'.$dia.'" and hora="'.$hora.'" and minuto="'.$minuto2.'";';

				
					$resul_s = mysqli_query($conn,$seccion1, $dbh) or die ("problema con la solicitud");
          $resultado_sec1 = $conn->query($resul_s);
					//$resultado_sec1 = mysql_fetch_assoc($resul_s);

					

					$resul_s2 = mysqli_query($conn,$seccion2, $dbh) or die ("problema con la solicitud");
					$resultado_se2 = mysql_fetch_assoc($resul_s2);
					

					//echo "<option>".$resultado_sec1['id_usuario']. $resultado_se2['id_usuario']. "</option>";

					if($resultado_sec1['id_usuario']=='' && $resultado_se2['id_usuario']==''){
						echo "<option value='",$verificar[0],"'>",$verificar[1]," ",$verificar[2]," ",$verificar[3]," </option>";
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

						<a href='conf_citas/web/cancelar.php?id=",$cita[0],"'>Cancelar cita</a>

						</div><br><br><br>";

				echo "<hr>";

				echo "</form>
        ";

      }

        ?>
    </div>
    <a class="nonblock nontext clip_frame colelem" id="u405" href="http://www.webox.org.mx"><!-- image --><img class="block" id="u405_img" src="images/completo7.png" alt="" width="62" height="19"/></a>


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