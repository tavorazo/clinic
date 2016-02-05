<html>
<head>
  <title>Panel Administrador</title>
</head>
<body>
  <?php
  date_default_timezone_set("Mexico/General");
  $a = $_GET['id'];
  $b = $_GET['descripcion'];
  $c = $_GET['nombre_foto'];
  include('../../php/base.php');
//include('../../php/base3.php');
  $insertar = "insert into fotografias_clinicas (id_paciente, fecha_foto, descripcion, nombre_foto) values ('$a', now(),'$b', '$c')";
  if(!$conn->query($insertar))
    die('Error de consulta: '.mysqli_error($conn));
  /****************************************/
  mysqli_close($conn);
  /****************************************/
  $a = '../ficha-paciente.php?id='.$a;
  echo '<br><br><br><center><img src="../../images/endoperio2.png" width="100px" alt=""> <br> ';
  echo "Foto subida con exito<br><br><br>";
  echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
  //header('location: ../ficha-paciente.php?id='.$ficha);
  echo "<a href='",$a,"' > <font color='white'>Regresar </a></center></div>";
  echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
  ?>
</body>
</html>