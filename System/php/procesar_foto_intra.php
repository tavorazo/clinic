<html>
<head>
  <title>Panel Administrador</title>
</head>
<body>
  <?php
  date_default_timezone_set("Mexico/General");
  $a = $_POST['id'];
  $c = $_POST['nombre_foto'];
  $b = $c;

  if($_POST['val']!=""){
    $imagen=$_POST['ruta'];
    $val=$_POST['val'];

    file_put_contents("../pacientes/intra/".$imagen, base64_decode($val));
    chmod("../pacientes/intra/".$imagen, 0777);
  
    include('base.php');
  //include('base3.php');
    $insertar = "insert into fotografias_intra (id_paciente, fecha_foto, descripcion, nombre_foto) values ('$a', now(),'$b', '$c')";
    if(!$conn->query($insertar))
      die('Error de consulta: '.mysqli_error($conn));
    /****************************************/
    mysqli_close($conn);
    /****************************************/
    $a = '../pacientes/ficha-paciente.php?id='.$a;
    echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
    echo "Foto subida con exito<br><br><br>";
    echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
    //header('location: ../ficha-paciente.php?id='.$ficha);
    echo "<a href='",$a,"' > <font color='white'>Regresar </a></center></div>";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=',$a,'">';
  }
  else{
    $a = '../pacientes/ficha-paciente.php?id='.$a;
    echo '<br><br><br><center><img src="../images/endoperio2.png" width="100px" alt=""> <br> ';
    echo "Error: No ha capturado ninguna imagen, por favor regrese<br><br><br>";
    echo '<div style="  padding:9px; border:1px solid #E6E6E6; height:18px; width:120px; margin-top:12px; text-align:center; margin-right:10px ">';
  }
  ?>
</body>
</html>