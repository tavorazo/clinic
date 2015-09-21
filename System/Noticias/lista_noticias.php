<?php
	@session_start();
		if($_SESSION['u']=='')
			header('location: ../index.php');
	if($_SESSION['rol']!='admin')
			header('location: ../panel.php');
	$usuario = $_SESSION['u'];
?>
<!DOCTYPE html>
<html>
<head>
   <!--meta charset="utf-8"-->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Noticias_modo_admin</title>
      <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
   <link rel="stylesheet" href="">
  <link rel="stylesheet" type="text/css" href="../css/s1.css"/>

</head>
<body>

         <?php
         	@session_start();
         	//if($_SESSION['u']!='alfredo')
         	//	header('location: http://cucitec.org/');
         ?>

               <?php
 /*              $host="localhost";
               $usuario="root";
               $contrasena="";
               $bdd="Endoperio";*/
			   include('../php/base2.php');
               $tabla="noticias";
               mysql_connect($host,$usuario,$contrasena);
               mysql_select_db($bdd);
               //Consultamos a la base de datos para sacar las columnas de la tabla
               $result = mysql_query("SHOW COLUMNS FROM $tabla");
               ?>
<div style="width:1020px; margin: auto auto; min-height:100px; ">
         <table style='width:100%x; margin-top:30px; '>
    
         <tr style="background:#E0F8F1; font-weight: lighter; font-size: 24px; color: #506DBD; text-align: center;"> 
            <td>ID</td>
            <td>imagen_noticia</td>
            <td>noticia</td>
            <td></td>
            <td></td>
            <td></td>
         </tr>

               <?php
               //ahora consultamos a la base de datos para sacar los registros contenidos
               $result2 = mysql_query("SELECT * FROM $tabla");
               while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
               	echo "<tr>";
                        echo "<td style='width: 70px; color:#4457AA' ><center>",$row2[0],"</td>";
         				
         					echo "<td style='width: 70px; border:1px solid #EAEAF8;'><img src='",$row2[1],"' width='150px' height='150px'></td>";
                        echo "<td style='max-width: 400px; background:#FAFFFE; padding:10px' >".$row2[3],"<br>",$row2[2],"<br><br><br></td>";
                        echo "<td style='width: 70px; padding:10px; color:#4457AA ' >",$row2[4],"<br><br><br></td>";
               
         			echo '<td>
                        <div style=" float:left; padding:9px;  margin-right:10px; border:1px solid #6FCCE3; height:18px; width:90px; margin-top:12px; text-align:center ">
                           <a href="editar.php?id=',$row2[0],'">Editar</a></div>
                        </td>
                        <td>
                        <div style=" float:left; padding:9px; margin-right:10px; border:1px solid #6FCCE3; height:18px; width:90px; margin-top:12px; text-align:center ">
                           <a href="eliminar_noticia.php?id=',$row2[0],'">Eliminar</a></div>
                        </td>';
               	echo "</tr>";
               }
               ?>
      </table>
</div>

</body>
</html>