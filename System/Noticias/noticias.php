<!DOCTYPE html>

<html>
<head>
      <!--meta http-equiv="Content-type" content="text/html;charset=UTF-8"/-->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Noticias</title>
                  <link rel="shortcut icon" type="x-icon" href="../images/icon.png" /><!--para logo en barra-->
       <link rel="stylesheet" type="text/css" href="../../css/s1.css"/>
       <link rel="stylesheet" type="text/css" href="../../css/texto.css"/>
</head>

<body>
 
<?php

	session_start();
	//if($_SESSION['u']!='alfredo')
	//	header('location: http://cucitec.org/');
?>

      <?php
      /*$host="localhost";
      $usuario="root";
      $contrasena="";
      $bdd="Endoperio";*/

	  include('../php/base2.php');

      $tabla="Noticias";
      mysql_connect($host,$usuario,$contrasena);
      mysql_select_db($bdd);
      //Consultamos a la base de datos para sacar las columnas de la tabla
      $result = mysql_query("SHOW COLUMNS FROM $tabla");
      ?>

      <?php
      $i = 0;
      //ahora consultamos a la base de datos para sacar los registros contenidos
      $result2 = mysql_query("SELECT * FROM $tabla order by fecha desc limit 4");
      while ($row2 = mysql_fetch_array($result2, MYSQL_NUM)) {
				

                              echo '<div style="width:50%; margin-left:20%; margin-top:40px; margin-bottom:10px">';
                              echo "      <h10>",$row2[3], "</h10>
                                    </div> ";

                              echo "<div style='width:37%; border: 1px solid #58D3F7; float:left; margin-left:20%; font-weight: lighter;'>
					       "     ,substr($row2[2], 0, 510),"...

                                    </div>";

					echo "<div style='margin-bottom:50px;  ''>
                                          <img src='",$row2[1],"'   style=' margin-left:5px; float:left; width:220px; height:150px;  border: 1px solid #58D3F7; '>
                                    </div>

                              <br><br><br><br><br><br>
                                    <div style='margin-left:60%'>".$row2[4],"
                                    </div><br><br><br>";

      }
      ?>

</body>
</html>