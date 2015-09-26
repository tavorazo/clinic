

<?php 
	$title = "Cumpleañeros";
	include("+/head.php");
	include('php/base3.php');
    include('php/base.php');

          $a = date(d);
          $b = date(m);
          $c = date(Y);

          $fecha_cumplea = "-$b-$a";
          $pacientes = $conn->query("SELECT * FROM paciente WHERE fecha_nacimiento like '%$fecha_cumplea%' ORDER BY id_paciente;");
            echo "<br> <h3 style='width:800px'> Pacientes </h3><br><br><br>";
            $count = 0;
          while ($r_p = mysql_fetch_array($pacientes, MYSQL_NUM)){
          	echo '<hr><img src="images/HppyBD.png" width="20px" alt="" style="float:left; margin-right:10px">';

            echo "<a href='felicitacion_personalizada.php?id_paciente=",$r_p[0],"&correo=",$r_p[13],"'>",$r_p[1]." ".$r_p[2]." ".$r_p[3],"</a> <p style='float:right; '>Tel: ".$r_p[11]."</p><br> ";
          }

          $trabajadores = $conn->query("select fecha_nacimiento, nombres, apellido_paterno, apellido_materno from usuarios;");

            echo "<br><br> <h3> Trabajadores </h3><br>";

            $count = 0;

          while ($r_t = mysql_fetch_array($trabajadores, MYSQL_NUM)){

            $arr = explode("-", $r_t[0]);
            $fecha_t = "-$arr[2]-$arr[1]";
            if($fecha_cumplea == $fecha_t && $count < 5)
              echo $r_t[1]." ".$r_t[2]." ".$r_t[3].", ";
              $count++;
          }

 	include("+/footer2.php"); 
 ?>
